<template>
    <div>
        <draggable v-model="texts" :options="options" hendle=".handle" @end="onSort">
            <div v-for="(text, index) in texts" :key="text.id" class="mb-5">

                <input type="hidden" :value="postId" :name="'procedures[' + index +'][postId]'">
                <input type="hidden" :value="index" :name="'procedures[' + index +'][order]'">
                <div class="row justify-content-around">
                    <p class="col-1">{{ index }}</p>
                    <i class="fas fa-heart fa-xs mr-1 col-1 handler" />
                    <div class="col-4 ">

                        <div class="drop_area"
                        @dragenter="dragEnter"
                        @dragleave="dragLeave"
                        @dragover.prevent
                        @drop.prevent="dropFile"
                        :class="{enter: isEnter}">
                            ドロップエリア
                            <div v-if="url">
                                <img :src="url">
                            </div>
                            <input class="image-input" type="file" title @change="uploadFile" ref="preview"/>
                            <!-- <img src="https://placehold.jp/320x240.png" alt=""> -->
                        </div>
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
<div>
        <ul>
            <li v-for="image in images" :key="image.id">
                {{ image.name }}
                {{ url}}
            </li>
        </ul>
    </div>
    <div v-if="url">
        <img :src="url">
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
                isEnter: false,
                url:'',
                maxTextCount: 30,
                options: {
                    animation: 200
                },
                images: [],
            }
        },
        methods: {
            dragEnter() {
                this.isEnter = true;
            },
            dragLeave() {
                this.isEnter = false;
            },
            dropFile() {
                console.log(event.dataTransfer.files[0]);
                const image = event.dataTransfer.files[0];
                this.url = URL.createObjectURL(image);
                this.images = [...event.dataTransfer.files]

                this.images.forEach(image => {
                    let form = new FormData()
                    form.append('image', image)
                    axios.post('url', form).then(response => {
                        console.log(response.data)
                    }).catch(error => {
                        console.log(error)
                    })
                })
                this.isEnter = false;
            },
            uploadFile(event){
                const files = event.target.files;
                if (files.length !== 1 || files[0].type.indexOf("image") !== 0) {
                    return;
                }
                this.readImage(files[0]);
            },
            readImage(file) {
                let reader = new FileReader();
                reader.onload = this.loadImage;
                reader.readAsDataURL(file);
            },
            loadImage(e) {
                let image = new Image();
                image.src = e.target.result;
                this.image = image;
            },
            onChange(event){
                const images = event.target.files;
                if (images[0].type.indexOf("image") !== 0) {
                return;
                }
                this.readImage(images[0]);
            },
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
