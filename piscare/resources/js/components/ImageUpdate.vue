<template>
        <div class="col-4 image-input-block" >
            <div class=" image-input-box">
                <div class="image-input-field">
                    <input type="file" :name="this.name" :value="this.path">
                    <input type="file" name="file" title ref="preview" @change="onChange">
                    <p>クリックでファイル選択</p>
                    <div class="preview-box" v-if="url">
                        <img class="preview-image" :src="url">
                    </div>
                    <div v-else class="preview-box">
                        <img class="preview-image" :src="this.path">
                    </div>
                </div>
            </div>
        </div>
       <!--  <div class="col-4 image-input-block" >
            <div class=" image-input-box">
                <div class="image-input-field">
                    <input v-if='url' type="hidden" :name="this.name" :value="this.url">
                    <input v-else type="hidden" :name="this.name" :value="this.path">
                    <input type="file" title ref="preview" @change="onChange">
                    <p>クリックでファイル選択</p>
                    <div class="preview-box" v-if="url">
                        <img class="preview-image" :src="url">
                    </div>
                    <div v-else class="preview-box">
                        <img class="preview-image" :src="this.path">
                    </div>
                </div>
            </div>
        </div> -->
</template>

<script>
export default {
    name: "ProfileImagePreviewComponent",
    props:{
        name: {
            type: String
        },
        path: {
            type: String
        }
    },
    data(){
        return {
            url: "",
            path : this.$refs.preview.files[0]
        }
    },
    methods: {
        onChange(){
            const file = this.$refs.preview.files[0];
            this.url = URL.createObjectURL(file);
        }
    }
}
</script>
