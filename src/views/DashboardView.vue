<script>
    import Welcome2 from "../components/Session/Dashboard/Welcome2.vue";
    import Empty from "../components/Session/Dashboard/Empty.vue";
    import Order from "../components/Session/Dashboard/Order.vue";

    export default{
        components: { Welcome2, Empty, Order }
    }
</script>

<template>
    <div class=" mx-5 md:mx-9">
        <Welcome2></Welcome2>
        <Empty></Empty>
        <Order></Order>
    </div>
</template>