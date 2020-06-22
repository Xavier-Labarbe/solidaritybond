<template>
    <div>
        <div class="row">
            <div :class="cls">
                <p>
                    <strong>{{ name  }}</strong><br>
                    {{ message.content }}
                </p>
            </div>
        </div>
        <hr>
    </div>
</template>

<script>
    export default {
        props: {
            message: Object,
            user: Number
        },
        computed: {
            isMe () {
                return this.message.from_id === this.user
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
