import Vue from 'vue'
import Messagerie from "./components/MessagerieComponent";
import store from './store/store';


new Vue({
    el: '#messagerie',
    components: { Messagerie },
    store
})

