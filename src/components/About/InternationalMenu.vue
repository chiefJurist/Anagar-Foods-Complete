<template>
    <div class="about-con bg-bg-4 bg-no-repeat">
        <!--Image-->
        <div class=" flex-1 relative bg-bg-sm-1 bg-no-repeat bg-right-bottom transition duration-1000 ease-out" v-motion-slide-visible-left>
            <img src="/img/food-okpa.jpg" alt="okpa" class="  rounded-full border-8 border-yellow-400 h-96 w-96">
            <img src="/img/food-moimoi.jpg" alt="moimoi" class="absolute top-0 rounded-full border-8 border-gray-100 w-36">
        </div>


        <!--Menu-->
        <div class=" flex-1">
            <div class=" card-title ">International Menu</div>
            <ul class=" text-yellow-500">
                <li class="list-style" v-motion-pop-visible>Beans Pudding ( moi moi)</li>
                <li class="list-style" v-motion-pop-visible>Bambara pudding (okpa)</li>
                <li class="list-style" v-motion-pop-visible>Locale cornmeal (agidi)</li>
                <li class="list-style" v-motion-pop-visible>Corn Pudding ( moimoi-oka/ elili-oka)</li>
            </ul>
        </div>
    </div>
</template>