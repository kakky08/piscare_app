<template>
    <div class="material">
        <draggable v-model="texts" :options="options" hendle=".handle" @end="onSort">
            <div v-for="(text, index) in texts" :key="text.id">
                <div class="row cols-4 spacing-reset material-form">
                    <i class="fas fa-bars fa-xs col-1 handler material-form-icon" />
                    <input
                        type="text"
                        class="form-control col"
                        placeholder="材料・調味料"
                        :name="'materials[' + index +'][materialName]'"
                        :value="text.material_name"
                    >
                    <input
                        type="text"
                        class="form-control col"
                        placeholder="分量"
                        :name="'materials[' + index +'][quantity]'"
                        :value="text.quantity"
                    >
                    <button type="button" class="btn col-1 material-form-button" @click="del(index)">×</button>
                </div>
            </div>
        </draggable>
    </div>
</template>

<script>
    import draggable from 'vuedraggable'
    export default {
        components: { draggable },
        props:{
            postId: {
                type: Number
            },
            materials :{
                type: Object
            },
        },
        data() {
            return {
                postId: this.postId,
                texts: [...this.materials],
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
