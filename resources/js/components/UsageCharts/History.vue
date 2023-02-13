<template>
    <div class="ui grid">
        <div class="sixteen wide column">
            <h2 class="ui header">
                Usage History
            </h2>
        </div>

        <div class="row">
            <div class="eight wide column">
                <vue-ctk-date-time-picker v-model="range" range-mode overlay-background color="purple" enable-button-validate format="YYYY-MM-DD" formatted="ddd D MMM YYYY" label="Select range"></vue-ctk-date-time-picker>
            </div>
        </div>

        <div class="sixteen wide column">
            <chart :consumptions-route="consumptionsRoute" :range="range" v-if="show"></chart>
        </div>
    </div>
</template>

<script>
    import moment from 'moment';

    import Chart from './Chart';
    import VueCtkDateTimePicker  from 'vue-ctk-date-time-picker';

    export default {
        name: "history",

        components: {
            Chart, VueCtkDateTimePicker ,
        },

        props: {
            consumptionsRoute: {
                type: String,
                required: true,
            },
        },

        data() {
            let start = moment().startOf('month').format('YYYY-MM-DD'),
                end = moment().format('YYYY-MM-DD');

            return {
                range: {start, end},
                show: false,
            };
        },

        watch: {
            range({ start, end }) {
                if (! start || ! end) {
                    return;
                }

                this.show = false;

                setTimeout(() => {
                    this.show = true;
                }, 200);
            }
        },
    }
</script>
