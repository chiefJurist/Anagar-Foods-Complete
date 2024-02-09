<script>
    import Empty from "../components/Session/History/Empty.vue";
    import Record from "../components/Session/History/Record.vue";
    import Title from "../components/Session/History/TItle.vue";

    export default{
        components: { Empty, Record, Title},

        props: [ 'id' ],

        data () {History
            return{
                history: false,
                result: ""
            }
        },

        mounted () {
            //Fetch data from the database
            fetch("http://localhost/Anagar-Foods-Complete/data/dashboard.php", {
                method: "POST",
                headers: {
                    "Content-Type" : "application/json"
                },
                body: JSON.stringify({
                    id: this.id
                })
            })
            //fetching the response
            .then((response) => response.json())
            //fetching the actual data and populating the result property
            .then((data) => {
                this.result = data;
                if (this.result.status  != "empty" &&  this.result.status  != "error") {
                    this.history = true;
                    console.log(this.result)
                } else {
                    this.history = false;
                }
            })
            //catching errors
            .catch((error) => console.error(error))
        }
    }
</script>

<template>
    <div class=" bg-bg-7">
        <Title v-if="history"></Title>
        <Empty v-if="!history"></Empty>
        <Record v-if="history" :result="result"></Record>
    </div>
</template>