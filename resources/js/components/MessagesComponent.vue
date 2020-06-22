<template>
    <div class="card">
        <div class="card-header">Xavier</div>
        <div class="card-body">
            {{ messages }}
        </div>
    </div>
</template>

<script>
    export default {
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
