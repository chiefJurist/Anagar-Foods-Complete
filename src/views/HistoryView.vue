<script>
    import Empty from "../components/Session/History/Empty.vue";
    import Record from "../components/Session/History/Record.vue";
    import Title from "../components/Session/History/TItle.vue";

    export default{
        components: { Empty, Record, Title},

        data () {History
            return{
                history: true
            }
        }
    }
</script>

<template>
    <div class=" bg-bg-7">
        <Title v-if="history"></Title>
        <Empty v-if="!history"></Empty>
        <Record v-if="history"></Record>
    </div>
</template>