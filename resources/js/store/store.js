import Vue from 'vue'
import Vuex from 'vuex'

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
        addConversations: function (state, {conversations}) {
            conversations.forEach(function (c) {
                let conversation = state.conversations[c.id] || {messages: {}}
                conversation = {...conversation, ...c}
                state.conversations = {...state.conversations, ...{[c.id]: conversation}}
            })
        },
        addMessages : function (state, {messages, id}) {
            let conversation = state.conversations[id] || {}
            conversation.messages = messages
            conversation.loaded = true
            state.conversations = {...state.conversations, ...{[id]: conversation}}
        },
        addMessage : function (state, {message, id}) {
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
                    context.commit('addMessages', {messages: response.messages, id: conversationId})
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
            }
        }

    }
)
