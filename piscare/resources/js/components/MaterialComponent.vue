<template>
    <div>
        <draggable v-model="texts" :options="options" hendle=".handle" @end="onSort">
            <div v-for="(text, index) in texts" :key="text.id">
                <div class="row justify-content-around mb-4">
                    <!-- <button type="button" class="btn btn-light col-1 handle">▲</button> -->
                    <i class="fas fa-heart fa-xs mr-1 col-1 handler" />
                    <input type="hidden" :value="postId" :name="'materials[' + index +'][postId]'">
                    <input type="text" class="form-control col-4" placeholder="材料・調味料" :name="'materials[' + index +'][materialName]'">
                    <input type="text" class="form-control col-4" placeholder="分量" :name="'materials[' + index +'][quantity]'">
                    <button type="button" class="btn btn-light col-1" @click="del(index)">×</button>
                </div>
            </div>
        </draggable>
        <button type="button" class="btn btn-primary col-auto mb-5" @click="add" v-if="!isTextMax">＋行を追加する</button>

    </div>
</template>

<script>
    import draggable from 'vuedraggable'
    export default {
        components: { draggable },
        props:['postId',],
        data() {
            return {
                texts: [{material: '', quantity: ''}],
                maxTextCount: 30,
                options: {
                    animation: 200
                },
            }
        },
        methods: {
            onSort (event) {
                console.log(event);
            },
            add() {
                this.texts.push({ material: '', quantity: ''})
            },
            del(index) {
                this.texts.splice(index, 1)
            },
            onSubmit() {
                const url = this.endpoint;
                const formData = new f
                formData.appned('texts', this.texts)
                const params = {
                    texts: this.texts
                };
                axios.patch(url, formData)
                    .then(response => {
                        location.href = this.endpoint;
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
