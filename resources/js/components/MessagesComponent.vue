<template>
    <div class="card">
        <div class="card-header">{{ name }}</div>
        <div class="card-body messagerie__body">
            <Message :message="message" :key="message.id" v-for="message in messages" :user="user"/>
            <form action="" method="post">
                <div class="form-group">
                    <textarea name="content" v-model="content" placeholder="Ecrivez votre message" :class="{'form-control': true, 'is-invalid': errors['content']}" @keypress.enter="sendMessage"></textarea>
                    <div class="invalid-feedback" v-if="errors['content']">{{ errors['content'].join(', ') }}</div>
                </div>
                <button class="btn btn-primary" type="submit">Envoyer</button>
            </form>
            <div class="messagerie__loading" v-if="loading">
                <div class="loader"></div>
            </div>
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
                errors: {},
                loading: false
            }
        },
        computed: {
            ...mapGetters(['user']),
            messages: function () {
                return this.$store.getters.messages(this.$route.params.id)
            },
            name: function () {
                return this.$store.getters.conversation(this.$route.params.id).name
            },
            count: function () {
                return this.$store.getters.conversation(this.$route.params.id).count
            },
            lastMessage: function () {
                return this.messages[this.messages.length -1]
            }
        },
        mounted() {
            this.loadMessages()
            this.$messages = this.$el.querySelector('.messagerie__body')
        },
        watch: {
            '$route.params.id': function () {
                this.loadMessages()
            },
            lastMessage: function () {
                this.scrollBot()
            }
        },
        methods: {
            async loadMessages () {
                let response = await this.$store.dispatch('loadMessages', this.$route.params.id)
                if (this.messages.length < this.count) {
                    this.$messages.addEventListener('scroll', this.onScroll)
                }
            },
            async onScroll() {
                if (this.$messages.scrollTop === 0) {
                    this.loading = true
                    this.$messages.removeEventListener('scroll', this.onScroll)
                    let previousHeight = this.$messages.scrollHeight
                    await this.$store.dispatch('loadPreviousMessages', this.$route.params.id)
                    this.$nextTick(() => {
                        this.$messages.scrollTop = this.$messages.scrollHeight - previousHeight
                    })
                    if (this.messages.length < this.count) {
                        this.$messages.addEventListener('scroll', this.onScroll)
                    }
                    this.loading = false
                }
            },
            scrollBot() {
                this.$nextTick(() => {
                    this.$messages.scrollTop = this.$messages.scrollHeight
                })
            },
            async sendMessage (e) {
                if (e.shiftKey === false) {
                    this.loading = true
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
                    this.loading = false
                }
            }
        }
    }
</script>
