import Vuex from 'vuex'
import Vue from "vue";
Vue.use(Vuex)

const get = async function (url) {
    let response = await fetch(url, {
    credentials: 'same-origin',
    headers: {
        'X-Requested-With': 'XMLHttpRequest',
        'X-CSRF-TOKEN':document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    }
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
        conversations: {}
    },
    getters: {
        conversations: function (state) {
            return state.conversations
        }
    },
    mutations: {
        addConversations: function (state, {conversations}) {
            let obj = {}
            conversations.forEach((conversation) => {
                obj[conversation.id] = conversation
            })
            state.conversations = obj
        }
    },
    actions: {
        loadConversations: async function (context) {
           let response = await get('/api/conversations')
            context.commit('addConversations', {conversations: response.conversations})
        },
        loadMessages: async function (context, conversationId) {
            let reponse = await get('/api/conversations/' + conversationId)
            context.commit('addMessages', {messages: reponse.messages})
        }
    }
})
