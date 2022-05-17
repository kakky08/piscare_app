<template>
    <div class="material">
        <draggable v-model="texts" :options="options" hendle=".handle" @end="onSort">
            <div v-for="(text, index) in texts" :key="text.id">
                <p class="border-bottom boundary-line">{{index + 1}}</p>
                <div class="row cols-4 spacing-reset material-form">
                    <i class="fas fa-bars fa-xs col-1 handler material-form-icon" />
                    <image-update
                        :name="'procedures[' + index + '][path]'"
                        :path="`${path}/${text.photo}`"
                    >
                    </image-update>
                    <textarea
                        type="text"
                        class="form-control col"
                        placeholder="材料の分量を入力してください"
                        :name="'procedures[' + index + '][procedure]'"
                        :value="text.procedure"
                    >
                    </textarea>
                    <button type="button" class="btn col-1 material-form-button" @click="del(index)">×</button>
                </div>
            </div>
        </draggable>
    </div>
</template>

<script>
    import draggable from 'vuedraggable'
    import ImageUpdate from './ImageUpdate.vue';
    export default {
        components: {
            draggable,
            ImageUpdate
        },
        props:{
            postId: {
                type: Number
            },
            procedures :{
                type: Object
            },
            path :{
                type: String
            }

        },
        data() {
            return {
                postId: this.postId,
                texts: [...this.procedures],
                // texts:[],
                maxTextCount: 30,
                options: {
                    animation: 200
                },
            }
        },
        methods: {
            onInput(event){
                // console.log(this.texts[index].quantity);
                console.log(this.$ref.input.value);
            },
            onSort (event) {
                console.log(event);
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
