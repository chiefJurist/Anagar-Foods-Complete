<template>
    <div class="welcome-con">
        <!--Intro-->
        <div class="welcome-title transition duration-1000 ease-out" v-motion-slide-visible-top>
            <span>Welcome To </span>
            <span class=" text-orange-600"> Anagar-Foods</span>
        </div>
        <div class="welcome-body transition duration-1000 ease-out" v-motion-slide-visible-top>
            Savor authentic Nigerian cuisine, with free delivery nationwide and across borders. 
            Taste Nigeria, wherever you are!
        </div>


        <!--Cards-->
        <div class="my-20 text-center flex justify-between gap-3 flex-wrap">
            <div class=" bg-white rounded-lg w-72 shadow-lg p-6 transition duration-1000 ease-out" v-motion-pop-visible>
                <div class=" flex justify-center py-2">
                    <img src="/img/address.png" alt="">
                </div>
                
                <div class=" text-lg font-bold text-gray-900">INTERNATIONAL SERVICE</div>
                <div>Deliver Nigerian delicacies within and accross Africa</div>
            </div>

            <div class=" bg-white rounded-lg  w-72 shadow-lg p-6 transition duration-1000 ease-out" v-motion-pop-visible>
                <div class=" flex justify-center py-2">
                    <img src="/img/card-1.png" alt="">
                </div>
                
                <div class=" text-lg font-bold text-gray-900">FREE DELIVERY</div>
                <div>No delivery fee for all orders</div>
            </div>

            <div class=" bg-white rounded-lg  w-72 shadow-lg p-6 transition duration-1000 ease-out" v-motion-pop-visible>
                <div class=" flex justify-center py-2">
                    <img src="/img/card-2.png" alt="">
                </div>
                
                <div class=" text-lg font-bold text-gray-900">BULK DELIVERY</div>
                <div>Our expertise lies in delivering Nigerian cuisine in large quantities.</div>
            </div>

            <div class=" bg-white rounded-lg  w-72 shadow-lg p-6 transition duration-1000 ease-out" v-motion-pop-visible>
                <div class=" flex justify-center py-2">
                    <img src="/img/time.png" alt="">
                </div>
                
                <div class=" text-lg font-bold text-gray-900">FAST DELIVERY</div>
                <div>Local and International orders receive expedited shipping for speedy service.</div>
            </div>
        </div>
    </div>
</template>