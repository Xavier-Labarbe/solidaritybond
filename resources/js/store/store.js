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
    debugger
}
export default new Vuex.Store({
    strict: true,
    state: {
        conversations: {}
    },
    actions: {
        loadConversations: async function (context) {
           let response = await get('/api/conversations')
            console.log(response)
        }
    }
})
