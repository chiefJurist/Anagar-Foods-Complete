<script>
    export default{
        props: ['orderId'],
        
        //Storing the fetched data from mounted below in a property
        data(){
            return{
                order: "",
                deleteResponse: "",
                deleteDisplay: ""
            }
        },

        //Fetching the details of each order
        mounted(){
            fetch("http://localhost/Anagar-Foods-Complete/data/details.php", {
                method: "POST",
                headers: {
                    "Content-Type" : "application/json"
                },
                body: JSON.stringify({
                    orderId: this.orderId
                })
            })
            //fetching the response
            .then((res)=> res.json())
            //fetching the actual data and populating the "order" property
            .then((data)=> {
                this.order = data
                console.log(this.order)
            })
            //catching errors
            .catch(err => console.error(err.message))
        },

        methods: {
            handleDelete(){
                fetch("http://localhost/Anagar-Foods-Complete/data/deleteOrder.php", {
                    method: "POST",
                    headers: {
                        "Content-Type" : "application/json"
                    },
                    body: JSON.stringify({
                        deleteId: this.orderId
                    })
                })
                .then((response) => response.json())
                .then((data) => {
                    this.deleteResponse = data
                    if (this.deleteResponse.status != "failure" || this.deleteResponse.status != "error") {
                        this.$router.push({ name: "Dashboard" })
                    } else {
                        this.deleteDisplay = "Can't Delete Order At This Point"
                    }
                })
                .catch(err => console.error(err.message))
            }
        }
    }
</script>

<template>
    <div class=" pt-28 pb-64 text-center bg-bg-5 font-extrabold">
        <div class=" text-2xl sm:text-4xl py-7 font-serif">
            <span class=" text-orange-600">MAIN ORDER: </span>
            <span class=" capitalize text-yellow-400"> {{ order.main_order }} </span>
        </div>

        <div class="session-order-cont">
            <span class="session-order-title">OTHER ORDERS: </span>
            <span class="session-order-main"> {{ order.additional_order }} </span>
        </div>

        <div class="session-order-cont">
            <span class="session-order-title">CREATED AT: </span>
            <span class="session-order-main"> {{ order.created_at }} </span>
        </div>

        <div class="session-order-cont">
            <span class="session-order-title">TYPE: </span>
            <span class="session-order-main"> {{ order.location }} Order</span>
        </div>

        <div class="session-order-cont">
            <span class="session-order-title">DELIVERY POINT: </span>
            <span class="session-order-main italic font-light"> {{ order.street_address }}, {{ order.city }}, {{ order.state }}, {{ order.country }}. </span>
        </div>

        <div class="session-order-cont">
            <span class="session-order-title">ARRIVAL: </span>
            <span class="session-order-main"> {{ order.arrival }} </span>
        </div>

        <form @submit.prevent="handleDelete">
            <button class=" mt-7 session-btn">Cancel Order</button>
        </form>

        <div v-if="deleteDisplay" class=" text-red-500 text-lg font-semibold mt-10"> {{ deleteDisplay }} </div>
    </div>
</template>