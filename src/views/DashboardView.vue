<script>
    import Welcome2 from "../components/Session/Dashboard/Welcome2.vue";
    import Empty from "../components/Session/Dashboard/Empty.vue";
    import Order from "../components/Session/Dashboard/Order.vue";

    export default{
        components: { Welcome2, Empty, Order },

        props: [ 'id', 'session' ],

        data () {
            return {
                dashboard: false,
                result: ""
            }
        },

        beforeMount (){
            if (this.session == false) {
                this.$router.push({name: "Home"})
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
                    this.dashboard = true;
                } else {
                    this.dashboard = false;
                }
            })
            //catching errors
            .catch((error) => console.error(error))
        }
    }
</script>

<template>
    <div class=" mx-5 md:mx-9 bg-bg-4">
        <Welcome2></Welcome2>
        <Empty  v-if="!dashboard"></Empty>
        <Order v-if="dashboard" :result="result"></Order>
    </div>
</template>