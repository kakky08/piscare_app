<template>
    <button type="button" class="btn col-auto button-default" @click="add" v-if="!isTextMax">＋行を追加する</button>
</template>

<script>
    export default {
        props: {
            count: {
                type: Number,
                default: 0,
            },
        },
        data() {
            return {
                count : this.count
            }
        },
        methods: {
            add() {
                this.count += 1;
                return this.count
                console.log(this.count);
            },
        }
    }
</script>
