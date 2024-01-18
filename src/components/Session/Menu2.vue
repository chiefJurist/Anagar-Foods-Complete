<script>
    export default {
        props: [ "showMenu2" ],

        methods: {
            toggle2(){
                this.$emit('control2')
            }
        }
    }
</script>


<template>
    <div class="">
        <transition name="slide-fade" mode="in-out">
            <div v-if="showMenu2" class=" bg-orange-600 text-yellow-300 w-3/4 sm:w-1/4 fixed top-0 h-full">
                <div class=" flex justify-end text-4xl border-b-2 border-yellow-300 font-extralight p-5">
                    <button @click="toggle2">X</button>
                </div>

                <RouterLink to="" class="session-menu-links" @click="toggle2">
                    <span class=" basis-1/6"><ion-icon name="home-outline" class=" text-3xl basis-5/6"></ion-icon></span>
                    <span>Dashboard</span>
                </RouterLink>
            
                <RouterLink to="" class="session-menu-links" @click="toggle2">
                    <span class=" basis-1/6"><ion-icon name="fast-food-outline" class=" text-3xl basis-5/6"></ion-icon></span>
                    <span>Create order</span>
                </RouterLink>
            
                <RouterLink to="" class="session-menu-links" @click="toggle2">
                    <span class=" basis-1/6"><ion-icon name="settings-outline" class=" text-3xl basis-5/6"></ion-icon></span>
                    <span>Settings</span>
                </RouterLink>

                <RouterLink to="" class="session-menu-links" @click="toggle2">
                    <span class=" basis-1/6"><ion-icon name="notifications-outline" class=" text-3xl basis-5/6"></ion-icon></span>
                    <span>Notifications</span>
                </RouterLink>
            
                <RouterLink to="" class="session-menu-links" @click="toggle2">
                    <span class=" basis-1/6"><ion-icon name="reader-outline" class=" text-3xl basis-5/6"></ion-icon></span>
                    <span>Order History</span>
                </RouterLink>
            </div>
        </transition>
    </div>
</template>

<style>
    .slide-fade-enter-active{
    transition: opacity 0.5s, transform 0.5s;
    }
    .slide-fade-leave-active {
    transition: opacity 0.5s, transform 0.5s;
    }
    .slide-fade-leave-to {
    opacity: 0;
    transform: translateX(-100px);
    }
    .slide-fade-enter-from{
        opacity: 0.8;
        transform: translateX(-100px);
    }
</style>