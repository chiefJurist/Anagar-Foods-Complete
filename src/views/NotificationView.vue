<script>
    import Empty from "../components/Session/Notification/Empty.vue";
    import Info from "../components/Session/Notification/Info.vue";
    import Title from "../components/Session/Notification/Title.vue";

    export default{
        components: { Empty, Info, Title},

        data () {
            return{
                notify: true
            }
        }
    }
</script>

<template>
    <div class=" bg-bg-7 mx-5">
        <Title v-if="notify"></Title>
        <Empty v-if="!notify"></Empty>
        <Info v-if="notify"></Info>
    </div>
</template>