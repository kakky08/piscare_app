<template>
    <div>
        <div v-for="(text, index) in texts" v-bind:key="text.id">
            <div class="row justify-content-around mb-4">
                <button type="button" class="btn btn-light col-1">▲</button>
                <input type="text" class="form-control col-4" placeholder="材料・調味料" v-model="text.name">
                <input type="text" class="form-control col-4" placeholder="分量" v-model="text.email">
                <button type="button" class="btn btn-light col-1" v-on:click="del(index)">×</button>
            </div>
        </div>
        <button type="button" class="btn btn-primary col-auto mb-5" v-on:click="add">＋行を追加する</button>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                texts: [{name: '', email: ''}],
            }
        },
        methods: {
            add: function() {
                this.texts.push({ name: '', email: ''})
            },
            del: function() {
                this.texts.splice(index, 1)
            }
        }
    }
</script>
