<template>
    <div class="row">
        <div class="col-md-3">
            <div class="list-group">
               <a class="list-group-item d-flex justify-content-between align-items-center">
                   Pierre {{ user }}
                   <span class="badge badge-pill bad-primary">0</span>
                </a>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        props: {
            user: Number
        },
        mounted() {
            this.$store.dispatch('loadConversations')
        }
    }
</script>
