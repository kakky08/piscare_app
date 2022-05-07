<template>
    <datepicker
        :value="defaultdate"
        :format="this.DatePickerFormat"
        :name="name"
        :language="ja"
        input-class="form-control bg-white"
        :highlighted="highlighted"
        @selected='change'
    >
    </datepicker>
</template>

<script>
import datepicker from "vuejs-datepicker";
import { ja } from "vuejs-datepicker/dist/locale";
import moment from "moment";

export default {
    components: {
        datepicker
    },
    props: {
        name: {
            type: String,
            required: true
        },
        defaultdate: {
            type: String,
            required: true
        }
    },
    methods: {
        change: function(date) {
            // 受け取ったデータを変換
            let select = moment(date).format('YYYY-MM-DD')
            console.log(select);
            // カレンダービューに移動
            location.href= '/home/select/' + select;
        }
    },
    data() {
        return {
            DatePickerFormat: "yyyy/MM/dd",
            ja: ja,
            highlighted: {
                days: [6, 0]
            },
            calendarDate: ''
        };
    }
};
</script>
