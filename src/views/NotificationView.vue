<script>
    import Empty from "../components/Session/Notification/Empty.vue";
    import Info from "../components/Session/Notification/Info.vue";
    import Title from "../components/Session/Notification/Title.vue";

    export default{
        components: { Empty, Info, Title},

        props: ['id', 'session'],

        data () {
            return{
                notify: false,
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
            fetch("http://localhost/Anagar-Foods-Complete/data/historyAndNotification.php", {
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
                    this.notify = true;
                } else {
                    this.notify = false;
                }
            })
            //catching errors
            .catch((error) => console.error(error))
        }
    }
</script>

<template>
    <div class=" bg-bg-7 mx-5">
        <Title v-if="notify"></Title>
        <Empty v-if="!notify"></Empty>
        <Info v-if="notify" :result="result"></Info>
    </div>
</template>