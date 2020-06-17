import Vuex from 'vuex'
import Vue from "vue";
Vue.use(Vuex)

const fetchApi = async function (url, options = {}) {
    let response = await fetch(url, {
    credentials: 'same-origin',
    headers: {
        'X-Requested-With': 'XMLHttpRequest',
        'X-CSRF-TOKEN':document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    },
        ...options
})
    if (response.ok) {
        return response.json()
    } else {
        let error = await response.json()
        throw new Error(error.message)
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
            state.user = userId
        },
        addConversations: function (state, {conversations}) {
            conversations.forEach((c) => {
                let conversation = state.conversations[c.id] || {}
                conversation = {...conversation, ...c}
                state.conversations = {...state.conversations, ...{[c.id]: conversation}}
            })
        },
        addMessages: function (state, {messages, id}) {
            let conversation = state.conversations[id] || {}
            conversation.messages = messages
            conversation.loaded = true
            state.conversations = {...state.conversations, ...{[id]: conversation}}
        }
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

        }

    }
})
