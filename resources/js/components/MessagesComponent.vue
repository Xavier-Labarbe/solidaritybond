<template>
    <div class="card">
        <div class="car-header">Jhon</div>
        <div class="card-body">
            <Message :message="message" v-for="message in messages"/>
        </div>
    </div>
</template>

<script>
    import Message from "./MessageComponent";
    export default {
        components : {Message},
        computed: {
            messages: function () {
                return this.$store.getters.messages(this.$route.params.id)
            }
        },
        mounted() {
            this.$store.dispatch('loadMessages', this.$route.params.id)
        }
    }
</script>
