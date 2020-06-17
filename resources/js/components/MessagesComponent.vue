<template>
    <div class="card">
        <div class="car-header">Jhon</div>
        <div class="card-body">
            <Message :message="message" v-for="message in messages" :user = "user"/>
            <form action="" method="post">
                <div class="form-group">
                    <textarea name="content" placeholder="Ecrivez votre message" class="form-control"></textarea>
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
