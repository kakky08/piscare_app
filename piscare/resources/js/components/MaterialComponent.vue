<template>
    <div>
        <div v-for="(text, index) in texts" v-bind:key="text.id">
            <div class="row justify-content-around mb-4">
                <button type="button" class="btn btn-light col-1">▲</button>
                <input type="text" class="form-control col-4" placeholder="材料・調味料" v-model="texts[material]">
                <input type="text" class="form-control col-4" placeholder="分量" v-model="texts[quantity]">
                <button type="button" class="btn btn-light col-1" @click="del(index)">×</button>
            </div>
        </div>
        <button type="button" class="btn btn-primary col-auto mb-5" @click="add" v-if="!isTextMax">＋行を追加する</button>
        <p class="border-bottom mb-4"></p>
        <div class="d-grid gap-2 col-6 mx-auto">
            <button type="button" class="btn btn-success col-auto" @click="onSubmit">保存して閉じる</button>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                texts: [{material: '', quantity: ''}],
                maxTextCount: 30,
            }
        },
        methods: {
            add() {
                this.texts.push({ material: '', quantity: ''})
            },
            del(index) {
                this.texts.splice(index, 1)
            },
            onSubmit() {
                const url = '/';
                const params = {
                    texts: this.texts
                };
                axios.post(url, params)
                    .then(response => {
                        //  成功時
                    })
                    .catch(error => {
                        //  失敗時
                    });
            }
        },
         computed: {
        isTextMax() {

            return (this.texts.length >= this.maxTextCount);

        }
    }
    }
</script>
