<template>
    <div>
        <button
            type="button"
            class="btn m-0 p-1 shadow-none"
            name="breakfast"
            value="{ breakfast }"
            @click="click"
        >
        <i class="fa fa-fish col-md-1"
            :class="{'fish-color':this.breakfast}"
        />
        </button>
        <p>{{ endpoint }}</p>
        <p>{{isRecord}}</p>
    </div>
</template>

<script>
    export default{
        props:[
            "isRecord",
            "flagBreakfast",
            "endpoint",
        ],
        deta(){
            return{
                isRecord: this.initialIsRecord,
                breakfast: this.flagBreakfast,
            }
        },
        methods: {
            click() {
                this.isRecord
                ? this.update()
                : this.update()
            },
            async index() {
                await axios.get(this.endpoint);
            },
            async create(){
                const response = await axios.post(this.endpoint);
            },
            update(){
                axios.put(this.endpoint);

            },
        },
    }
</script>
