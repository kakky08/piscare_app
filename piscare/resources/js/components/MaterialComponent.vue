<template>
    <div class="material">
            <div v-if="materials" v-on="addMaterial()">
                <draggable v-model="materials" :options="options" hendle=".handle" @end="onSort">
                    <div v-for="(text, index) in materials" :key="text.id">
                        <div class="row cols-4 spacing-reset material-form">
                            <i class="fas fa-bars fa-xs col-1 handler material-form-icon" />
                            <input type="hidden" :value="postId" :name="'materials[' + index +'][postId]'">
                            <input type="text" class="form-control col" :value="text.material_name" :name="'materials[' + index +'][materialName]'">
                            <input type="text" class="form-control col" :value="text.quantity" :name="'materials[' + index +'][quantity]'">
                            <button type="button" class="btn col-1 material-form-button" @click="del(text.id)">×</button>
                        </div>
                    </div>

                <!-- <div v-for="(text, index) in texts" :key="text.id">
                    <div class="row cols-4 spacing-reset material-form">
                        <i class="fas fa-bars fa-xs col-1 handler material-form-icon" />
                        <input type="hidden" :value="postId" :name="'materials[' + index +'][postId]'">
                        <input type="text" class="form-control col" placeholder="材料・調味料" :name="'materials[' + index +'][materialName]'">
                        <input type="text" class="form-control col" placeholder="分量" :name="'materials[' + index +'][quantity]'">
                        <button type="button" class="btn col-1 material-form-button" @click="del(index)">×</button>
                    </div>
                </div> -->
            </draggable>
        </div>
        <button type="button" class="btn col-auto button-default" @click="add" v-if="!isTextMax">＋行を追加する</button>
    </div>
</template>

<script>
    import draggable from 'vuedraggable'
    export default {
        components: { draggable },
        props:[
            'postId',
            'materials'
                ],
        data() {
            return {
                texts: [...this.materials],
                maxTextCount: 30,
                options: {
                    animation: 200
                },
            }
        },
        methods: {
            function () {
                /* axios.get('/materialCreate/data/1')
                .then(response => {
                    console.log(response)})
                    .catch(error => {
                        //  失敗時
                    }); */

            },
            addMaterial(){
                axios.get('/materialCreate/data')
                .then(response => {
                    console.log(response)})
                    .catch(error => {
                        //  失敗時
                    });
                // axios.get('/materialCreate/data').then(response => console.log(response))
                //  axios.get('/materialCreate/data').then(response => console.log(response))
                this.materials.map(material => {
                    // this.texts[material] = material.material_name;
                    // this.texts.push(material.material_name)
                    // console.log(material.material_name);
                });
                    // console.log(this.texts);
                // this.texts.push({ material: this.materials['material_name'], quantity: ''});
               /*  this.materials.forEach(function(material){
                    texts['material'] = material.material_name;
                }) */
            },
            onSort (event) {
                console.log(event);
            },
            add() {
                console.log(this.materials);
                this.texts.push({ material: '', quantity: ''});
                this.materials.push({material_name: '', quantity: ''})
            },
            del(index) {
                this.materials.splice(index, 1);
                this.texts.splice(index, 1);
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
