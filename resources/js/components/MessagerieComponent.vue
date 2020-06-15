<template>
    <div class="row">
        <div class="col-md-3">
            <div class="list-group">
                <template v-for="conversation in conversations">
               <a class="list-group-item d-flex justify-content-between align-items-center">
                   {{ conversation.name }}
                   <span class="badge badge-pill bad-primary" v-if="conversation.unread">{{ conversations.unread }}</span>
                </a>
                </template>
            </div>
        </div>

    </div>
</template>

<script>
    import {mapGetters} from 'vuex'
    export default {
        props: {
            user: Number
        },
        computed: {
            ...mapGetters(['conversations'])
        },
        mounted() {
            this.$store.dispatch('loadConversations')
        }
    }
</script>
