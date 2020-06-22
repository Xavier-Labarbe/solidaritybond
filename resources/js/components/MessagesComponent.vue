<template>
    <div class="card">
        <div class="card-header">Xavier</div>
        <div class="card-body">
            <Message :message="message" v-for="message in messages" :user="user"/>
            <form action="" method="post">
                <div class="form-group">
                    <textarea name="content" v-model="content" placeholder="Ecrivez votre message" :class="{'form-control': true, 'is-invalid': errors['content']}" @keypress.enter="sendMessage"></textarea>
                    <div class="invalid-feedback" v-if="errors['content']">{{ errors['content'].join(', ') }}</div>
                </div>
                <button class="btn btn-primary" type="submit">Envoyer</button>
            </form>
        </div>
    </div>
</template>

<script>
    import Message from "./MessageComponent";
    import {mapGetters} from 'vuex';

    export default {
        components: {Message},
        data () {
            return {
                content : '',
                errors: {}
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
            async sendMessage (e) {
                if (e.shiftKey === false) {
                    this.errors = {}
                    e.preventDefault();
                    try {
                        await this.$store.dispatch('sendMessage', {
                            content: this.content,
                            userId: this.$route.params.id
                        })
                        this.content = ''
                    } catch (e) {
                        if (e.errors) {
                            this.errors = e.errors
                        } else {
                            console.error(e)
                        }
                    }
                }
            }
        }
    }
</script>
