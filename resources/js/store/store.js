import Vue from 'vue'
import Vuex from 'vuex'
import Echo from "laravel-echo";

Vue.use(Vuex)

const fetchApi = async function (url, options = {}) {
    let response = await fetch(url, {
        credentials: 'same-origin',
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        },
        ...options
    })
    if (response.ok) {
        return response.json()
    } else {
        throw await response.json()
    }
}

export default new Vuex.Store({
    strict: true,
    state: {
        user: null,
        conversations: {}
    },
    getters: {
        user: function (state) {
            return state.user
        },
        conversations: function (state) {
            return state.conversations
        },
        conversation: function (state) {
            return function (id) {
                return state.conversations[id] || {}
            }
        },
        messages: function (state) {
            return function (id) {
                let conversation = state.conversations[id]
                if (conversation && conversation.messages) {
                    return conversation.messages
                } else {
                    return []
                }
            }
        }
    },
    mutations: {
        setUser: function (state, userId) {
            return state.user = userId
        },
        markAsRead: function (state, id) {
           state.conversations[id].unread = 0
        },
        addConversations: function (state, {conversations}) {
            conversations.forEach(function (c) {
                let conversation = state.conversations[c.id] || {messages: {}, count: 0}
                conversation = {...conversation, ...c}
                state.conversations = {...state.conversations, ...{[c.id]: conversation}}
            })
        },
        addMessages : function (state, {messages, id, count}) {
            let conversation = state.conversations[id] || {}
            conversation.messages = messages
            conversation.count = count
            conversation.loaded = true
            state.conversations = {...state.conversations, ...{[id]: conversation}}
        },
        prependMessages : function (state, {messages, id}) {
            let conversation = state.conversations[id] || {}
            conversation.messages = [...messages, ...conversation.messages]
            state.conversations = {...state.conversations, ...{[id]: conversation}}
        },
        addMessage : function (state, {message, id}) {
            state.conversations[id].count++
            state.conversations[id].messages.push(message)
        },
    },
    actions: {
            loadConversations: async function (context) {
                let response = await fetchApi('/api/conversations')
                context.commit('addConversations', {conversations: response.conversations})
            },
            loadMessages: async function (context, conversationId) {
                if (!context.getters.conversation(conversationId).loaded) {
                    let response = await fetchApi('/api/conversations/' + conversationId)
                    context.commit('addMessages', {messages: response.messages, id: conversationId, count: response.count})
                    context.commit('markAsRead', conversationId)
                }
            },
            sendMessage: async function (context, {content, userId}) {
                let response = await fetchApi('/api/conversations/' + userId, {
                    method: 'POST',
                    body: JSON.stringify({
                        content: content
                    })
                })
                context.commit('addMessage', {message: response.message, id: userId})
            },
            loadPreviousMessages: async function (context, conversationId) {
                let message = context.getters.messages(conversationId)[0]
                if (message) {
                    let url = '/api/conversations/' + conversationId + '?before=' + message.created_at
                    let response = await fetchApi(url)
                    context.commit('prependMessages', {id: conversationId, messages: response.messages})
                }
            },
            setUser: function (context, userId) {
                context.commit('setUser', userId)
                let echo = new Echo({
                    broadcaster: 'socket.io',
                    host: window.location.hostname + ':6001'
                })

                echo.private(`App.User.${userId}`)
                    .listen('NewMessage', function (e) {
                        context.commit('addMessage', {message: e.message, id: e.message.from_id})
                    })
            }
        }

    }
)
