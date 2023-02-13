<script>
    import helper from '../services/helper';

    import UsageCharts from '../components/UsageCharts';
    import ItemList from '../components/ItemList';
    import UsageHistory from '../components/UsageCharts/History';

    export default {
        components: {
            UsageCharts, ItemList, UsageHistory,
        },

        mounted() {
            helper.activate(this.$el);
        },
    }
</script>
