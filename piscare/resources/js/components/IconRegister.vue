<template>
    <div class="image-input">
        <div
            class="image-input__field"
            :class="{'over': isDragOver}"
            @dragover.prevent="onDrag('over')"
            @dragleave="onDrag('leave')"
            @drop.stop="onDrop"
        >
            <input type="file" title @change="onChange" name="image">
                <p>画像をドラッグ＆ドロップ
                    <br>またはクリックでファイル選択
                </p>
        </div>
        <img :src="image.src">
        <button type="button" @click="onSubmit">送信</button>
        <p>{{image.name}}</p>
        <!-- <div v-for="image in images" :key="image.id">
            <p>{{ image.name }}</p>
            <p>{{ image.url }}</p>
        </div> -->
    </div>
</template>

<script>
export default {
    props:{
        endpoint:{
            type:String,
        }
    },
    data(){
        return{
            isDragOver: false,
            image: {},
            images:[],
        };
    },
    computed: {
        image: {
            set(value) {
                this.$emit("input", value);
            },
            get(){
                return this.value;
            }
        }
    },
    methods: {
        onDrag(type) {
            this.isDragOver = type === "over";
        },
        onDrop(event) {
            this.isDragOver = false;
            const files = event.dataTransfer.files;
            this.images = [...event.dataTransfer.files];
            if (files.length !== 1 || files[0].type.indexOf("image") !== 0){
                return;
            }
            this.readImage(files[0]);
            console.log(this.image);

            /* this.images.forEach(image => {
                let form = new FormData()
                form.append('file', image)
                axios.post(this.endpoint, form)
                    .then(response => {
                        console.log(response.data)
                    })
                    .catch(error => {
                        console.log(error)
                    })
            }) */
        },
        onChange(event){
            const files = event.target.files;
            if (files.length !== 1 || files[0].type.indexOf("image") !== 0){
                return;
            }
            this.readImage(files[0]);
            console.log(this.image.src);
        },
        readImage(file){
            let reader = new FileReader();
            reader.onload = this.loadImage;
            reader.readAsDataURL(file);
        },
        loadImage(e){
            let image = new Image();
            image.src = e.target.result;
            this.image = image;
        },
        onSubmit(){

            const config = {
                header: {
                    "Content-Type": "multipart/form-data"
                }
            };
            /* this.images.forEach(image => {
                let form = new FormData()
                form.append('file', image)
                axios.post('http://localhost/setting/icon', form, config)
                    .then(response => {
                        console.log('成功', response)
                    })
                    .catch(error => {
                        console.log(error)
                    })
            }) */
                let form = new FormData()
                form.append('file', this.image)
                axios.post('http://localhost/setting/icon', form, config)
                    .then(response => {
                        console.log('成功', response)
                    })
                    .catch(error => {
                        console.log(error)
                    })
        }
    }
}
</script>

<style>
.image-input {
  background-color: #eee;
  width: 300px;
  height: 300px;
}
.image-input__field {
  width: 100%;
  height: 100%;
  position: relative;
  display: flex;
  justify-content: center;
  align-items: center;
}
.image-input__field.over {
  background-color: #666;
}
.image-input__field > input {
  position: absolute;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  opacity: 0;
  cursor: pointer;
}
.image-input__field > p {
  color: #aaa;
  text-align: center;
}
</style>
