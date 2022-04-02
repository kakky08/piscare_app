<template>
    <div>
        <draggable v-model="texts" :options="options" hendle=".handle" @end="onSort">
            <div v-for="(text, index) in texts" :key="text.id" class="mb-5">

                <input type="hidden" :value="postId" :name="'procedures[' + index +'][postId]'">
                <input type="hidden" :value="index" :name="'procedures[' + index +'][order]'">
                <div class="row justify-content-around">
                    <p class="col-1">{{ index }}</p>
                    <i class="fas fa-heart fa-xs mr-1 col-1 handler" />
                    <div class="col-4">
                        <img src="https://placehold.jp/320x240.png" alt="">
                    </div>
                    <div class="col-4">
                        <label label for="exampleFormControlTextarea1" class="form-label">作り方の説明</label>
                        <textarea :name="'procedures[' + index +'][procedure]'" class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                    </div>
                    <button type="button" class="btn btn-light col-1" @click="del(index)">×</button>
                </div>
            </div>
        </draggable>
        <div class="d-grid gap-2 col-6 mx-auto mb-5">
                <button class="btn btn-success" type="button" @click="add" v-if="!isTextMax">＋行を追加する</button>
        </div>
    </div>
</template>

<script>
    import draggable from 'vuedraggable'
    export default {
        components: { draggable },
        props:['postId',],
        data() {
            return {
                texts: [{photo: '', procedure: ''}],
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
                this.texts.push({ photo: '', procedure: ''})
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
