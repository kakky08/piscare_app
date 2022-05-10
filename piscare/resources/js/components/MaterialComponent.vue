<template>
    <div class="material">
        <draggable v-model="texts" :options="options" hendle=".handle" @end="onSort">
            <div v-for="(text, index) in texts" :key="text.id">
                <div class="row cols-4 spacing-reset material-form">
                    <i class="fas fa-bars fa-xs col-1 handler material-form-icon" />
                    <input type="hidden" :value="postId" :name="'materials[' + index +'][postId]'">
                    <input type="text" class="form-control col" placeholder="材料・調味料" :name="'materials[' + index +'][materialName]'">
                    <input type="text" class="form-control col" placeholder="分量" :name="'materials[' + index +'][quantity]'">
                    <button type="button" class="btn col-1 material-form-button" @click="del(index)">×</button>
                </div>
            </div>
        </draggable>
        <button type="button" class="btn col-auto button-default" @click="add" v-if="!isTextMax">＋行を追加する</button>
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
