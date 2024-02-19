<script>
    export default{
        props: [ 'result' ]
    }
</script>

<template>
    <div v-for="order in result" class=" text-center shadow-md border-l-4 border-orange-600 rounded-md bg-yellow-100 my-20 transition duration-1000 ease-out" v-motion-pop-visible>
        <div class=" flex justify-center">
            <img src="/img/img-4.jpg" alt="food image" class=" w-32 rounded-full relative -top-10">
        </div>
        <div class=" text-2xl sm:text-4xl text-yellow-400 font-serif pb-6"> {{ order.main_order }} </div>
        <ul class=" text-xl italic bg-clip-text text-transparent bg-gradient-to-tr from-orange-600 to-yellow-300">
            <li> {{ order.additional_order }} </li>
        </ul>
        <RouterLink :to="{name: 'Details', params: {orderId: order.id}}">
            <div class=" my-8 py-5 border-t-2 border-orange-600 text-yellow-400 font-bold text-lg cursor-pointer hover:text-yellow-700">
                More Info
            </div>
        </RouterLink>
    </div>
</template>