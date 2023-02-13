<template>
    <section id="usage-charts">
        <h1 class="ui header" style="margin-top: 50px;">Your usages for the last 30 days</h1>

        <chart v-for="(m, i) in meters" :key="i" :meter="m"></chart>
    </section>
</template>

<script>
    import api from '../../services/api';

    import Chart from './Chart';

    export default {
        name: "usage-charts",

        components: {
            Chart,
        },

        props: {
            metersRoute: {
                type: String,
                required: true,
            },
        },

        data() {
            return {
                meters: [],
            };
        },

        created() {
            api.get(this.metersRoute).then(({ data }) => {
                this.meters = data.data;
            }).catch(api.handlers.error);
        },
    }
</script>
