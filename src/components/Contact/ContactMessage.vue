 v-motion-slide-visible-right<template>
    <div class="my-20 lg:flex justify-between items-start text-gray-600 gap-20 text-center lg:text-start">


        <!--Commenting-->
        <div class="mb-20 lg:mb-0 flex-auto bg-bg-sm-4 bg-no-repeat bg-left-top">
            <div class="text-2xl md:text-4xl font-bold transition duration-1500 ease-out" v-motion-pop-visible>Add a Comment</div>

           <div class="lg:flex gap-6">
                <div class="flex-auto transition duration-1000 ease-out" v-motion-slide-visible-left>
                    <input type="text" placeholder="Name" class="input">
                </div>

                <div class="flex-auto transition duration-1000 ease-out" v-motion-slide-visible-left>
                    <input type="email" placeholder="Email" class="input">
                </div>
           </div>

            <div class="transition duration-1000 ease-out" v-motion-pop-visible>
                <textarea cols="30" rows="5" placeholder="Message" class="input"></textarea>
            </div>

            <div class="text-end mt-5 transition duration-1000 ease-out" v-motion-slide-visible-left>
                <div class="bg-orange-600 hover:bg-yellow-500 transition ease-out duration-700 p-1 w-48 rounded-3xl cursor-pointer flex justify-around items-center">
                    <div>
                        <ion-icon name="arrow-forward-circle-outline" class="text-white font-extrabold text-4xl"></ion-icon>
                    </div>
                    <div class="text-lg md:text-xl font-bold text-white">Send Now</div>
                </div>
            </div>
        </div>


        <!--Contact Details-->
        <div class="flex-auto bg-bg-7">
            <div class="text-2xl md:text-4xl font-bold transition duration-1500 ease-out" v-motion-pop-visible>Our Contacts</div>

            <div class="contact" v-motion-slide-visible-left>
                <div class="contact-image"><img src="/img/call.png" alt=""></div>
                <div>
                    <div class="contact-head">Call</div>
                    <div class=" text-gray-500">+2347010028679</div>
                </div>
            </div>

            <div class="contact" v-motion-slide-visible-left>
                <div class="contact-image"><img src="/img/time.png" alt=""></div>
                <div>
                    <div class="contact-head">Work Time</div>
                    <div class=" text-gray-500">Mon - Sat 8am -6pm</div>
                </div>
            </div>

            <div class="contact" v-motion-slide-visible-left>
                <div class="contact-image"><img src="/img/address.png" alt=""></div>
                <div>
                    <div class="contact-head">Address</div>
                    <div class=" text-gray-500">621 Old Ojo Rd, Satellite Town 102102, Lagos</div>
                </div>
            </div>
        </div>
    </div>
</template>