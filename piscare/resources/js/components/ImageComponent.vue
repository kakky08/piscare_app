<template>
    <div>
    // 画像が入ったら関数が発動して、imageに画像データが入る
        <input
            type="file"
            accept="image/jpeg, image/png"
            @change="onChangeImage"
        />
        <button @click="postImage">送信</button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            image: {}
        };
    },
    methods: {
      //画像データが入る
        onChangeImage: function(e) {
            this.image = e.target.files[0];
        },
      //Laravelにpostする
        postImage: function() {
          // 画像を送信する旨のheaders情報
            const config = {
                header: {
                    "Content-Type": "multipart/form-data"
                }
            };
            //画像を送信する時は、FormDataを使う。
            var formData = new FormData();
            //appendの第一引数がkey、第二引数がデータ
            formData.append("images", this.image);
            //textとか他の項目を入れたいとき
            // formData.append("text", this.text);

            axios.post("/setting/icon", formData, config).then(res => {
                  console.log(res);
              });
        }
    }
};
</script>
