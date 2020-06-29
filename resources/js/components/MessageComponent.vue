<template>
    <div>
        <div class="row">
            <div :class="cls">
                <p>
                    <strong>{{ name  }}</strong><span class="text-muted">, {{ ago }}</span><br>
                    {{ message.content }}
                </p>
            </div>
        </div>
        <hr>
    </div>
</template>

<script>
    import moment from 'moment'

    moment.locale('fr')
    export default {
        props: {
            message: Object,
            user: Number
        },
        computed: {
            isMe () {
                return this.message.from_id === this.user
            },
            ago () {
                return moment(this.message.created_at).fromNow()
            },
            cls () {
                let cls = ['col-md-10']
                if (this.isMe) {
                    cls.push('offset-md-2 text-right')
                }
                return cls
            },
            name () {
                return this.isMe ? 'Moi' : this.message.from.name
            }
        }
    }
</script>
