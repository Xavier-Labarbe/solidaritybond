<template>
    <div class="card">
        <div class="car-header">Jhon</div>
        <div class="card-body">
            <Message :message="message" v-for="message in messages" :user = "user"/>
            <form action="" method="post">
                <div class="form-group">
                    <textarea name="content" v-model="content" placeholder="Ecrivez votre message" class="form-control"
                              @keypress.enter="sendMessage"></textarea>
                    <div class="invalid-feedback">Une erreur</div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    import Message from "./MessageComponent";
    import {mapGetters} from 'vuex';

    export default {
        components : {Message},
        data () {
            return {
                content: ''
            }
        },
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
            },
            sendMessage (e) {
                if (e.shiftKey === false) {
                    this.$store.dispatch('sendMessage', {
                        content: this.content,
                        userId: this.$route.params.id
                    })
                }
            }
        }
    }
</script>
