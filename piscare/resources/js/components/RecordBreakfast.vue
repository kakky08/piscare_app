<template>
    <div>
        <button
            type="button"
            class="btn m-0 p-1 shadow-none"
        >
        <i class="fa fa-fish"
            @click="clickBreakfast"/>
        </button>
    </div>
</template>

<script>
    export default{
        props:{
            // チェックしているかどうか
            flagBreakfast:{
                type: Boolean,
                    default: false,
            },
            // データが存在しているかどうか
            flagRecordDate:{
                type: Boolean,
                default: false,
            },
            // ルート先
            endpoint:{
                type:String
            },
            createpoint:{
                type:String
            },
        },
        data(){
            return{
                isBreakfast: this.flagBreakfast,
            }
        },
        methods:{
            clickBreakfast(){
                if(this.flagRecordDate === true && this.isBreakfast === true){
                    this.deleteRecord()
                    return
                }
                if(this.flagRecordDate === true && this.isBreakfast === false){
                    this.updateRecord()
                    return
                }
                if(this.flagRecordDate === false && this.isBreakfast === false){
                    this.createRecord()
                    return
                }
            },
            async deleteRecord(){
                const response = await axios.delete(this.endpoint)
                this.isBreakfast = false
            },
            async updateRecord(){
                const response = await axios.put(this.endpoint)
                this.isBreakfast = ture
            },
            async createRecord(){
                const response = await axios.post(this.createpoint)
                this.isBreakfast = ture
            }
        }
    }
</script>
