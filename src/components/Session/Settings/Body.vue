<script>
    export default{
        props : [ 'email', 'username', 'type' ]
    }
</script>

<template>
    <div class=" flex justify-center">
        <div class="text-center rounded-lg bg-white shadow-lg text-xl sm:text-4xl w-3/4 border-l-8 border-gray-300 py-16 font-semibold text-orange-600">
            <div class=" pb-7">
                <span class=" font-serif">Email: </span>
                <span> {{ email }} </span>
            </div>

            <div class=" pb-7">
                <span class=" font-serif">Username: </span>
                <span> {{ username }} </span>
            </div>

            <div class=" pb-7">
                <span class=" font-serif">Account Type: </span>
                <span> {{ type }} </span>
            </div>
        </div>
    </div>
</template>