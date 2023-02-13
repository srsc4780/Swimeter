<template>
    <div class="meter consumption chart">
        <h2 class="ui header" v-if="meter">
            <span class="content">
                Meter #{{ meter.id }}
            </span>
        </h2>

        <chartjs-line :data="levels"
                      :labels="labels"
                      datalabel="Energy Usage"
                      :fill="true"
                      bordercolor="#efba4f"
                      backgroundcolor="rgba(255, 237, 178, 0.2)"
                      pointbordercolor="#ffedb2"
                      pointcolor="#efba4f"
                      pointhoverbackgroundcolor="#efba4f"
                      :option="chartOptions" v-if="levels.length"></chartjs-line>
    </div>
</template>

<script>
    import moment from 'moment';
    import api from '../../services/api';

    export default {
        name: "chart",

        props: {
            meter: {
                type: Object,
                required: false,
            },
            range: {
                type: Object,
                required: false,
            },
            consumptionsRoute: {
                type: String,
                required: false,
            },
        },

        data() {
            return {
                levels: [],
                labels: [],

                chartOptions: {
                    scales: {
                        xAxes: [{
                            type: "time",
                            time: {
                                parser: 'MM/DD/YYYY HH:mm',
                                tooltipFormat: 'll HH:mm'
                            },
                            scaleLabel: {
                                display: true,
                                labelString: 'Date'
                            }
                        }],
                        yAxes: [{
                            scaleLabel: {
                                display: true,
                                labelString: 'Energy Usage'
                            },
                            ticks: {
                                beginAtZero: true,
                                max: 100,
                            }
                        }],
                    },
                },
            };
        },

        created() {
            api.get(this.meter ? this.meter.consumptions : this.consumptionsRoute, this.range || {}).then(({ data }) => {
                data.data.forEach((v) => {
                    let m = moment(v.created_at);

                    this.levels.push({
                        x: m.format('MM/DD/YYYY HH:mm'),
                        y: v.usage,
                    });

                    this.labels.push(m.toDate());
                });


            }).catch(api.handlers.error);
        },
    }
</script>
