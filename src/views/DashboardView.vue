<script>
    import Welcome2 from "../components/Session/Dashboard/Welcome2.vue";
    import Empty from "../components/Session/Dashboard/Empty.vue";
    import Order from "../components/Session/Dashboard/Order.vue";

    export default{
        components: { Welcome2, Empty, Order },

        data () {
            return {
                dashboard: true
            }
        }
    }
</script>

<template>
    <div class=" mx-5 md:mx-9 bg-bg-4">
        <Welcome2></Welcome2>
        <Empty  v-if="!dashboard"></Empty>
        <Order v-if="dashboard"></Order>
    </div>
</template>