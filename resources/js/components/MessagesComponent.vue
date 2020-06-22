<template>
    <div class="card">
        <div class="card-header">Xavier</div>
        <div class="card-body">
            <Message :message="message" v-for="message in messages" :user="user"/>
        </div>
    </div>
</template>

<script>
    import Message from "./MessageComponent";
    import {mapGetters} from 'vuex';

    export default {
        components: {Message},
        computed: {
            ...mapGetters(['user']),
            messages: function () {
                return this.$store.getters.messages(this.$route.params.id)
            }
        },
        mounted() {
            this.loadMessages()
        },
        watch: {
            '$route.params.id': function () {
                this.loadMessages()
            }
        },
        methods: {
            loadMessages () {
                this.$store.dispatch('loadMessages', this.$route.params.id)
            }
        }
    }
</script>
