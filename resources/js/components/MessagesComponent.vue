<template>
    <div class="card">
        <div class="car-header">Jhon</div>
        <div class="card-body">
            Mes messages
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            this.$store.dispatch('loadMessages', this.$route.params.id)
        }
    }
</script>
