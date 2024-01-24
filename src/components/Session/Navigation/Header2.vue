<script>
    export default {
        methods: {
            toggle2(){
                this.$emit('control2')
            }
        }
    }
</script>

<template>
    <div class=" flex justify-between px-8 py-2 border-b-4 border-orange-600 items-center bg-gray-200">
        <div>
            <ion-icon name="menu-outline" class=" text-4xl text-orange-600 cursor-pointer" @click="toggle2"></ion-icon>
        </div>

        <div>
            <img src="/anagar-logo.png" alt="Logo" class=" w-32">
        </div>

        <div>
            <router-link :to="{name: 'Edit'}">
                <ion-icon name="person-circle-outline" class=" text-4xl text-orange-600 cursor-pointer"></ion-icon>
            </router-link>
        </div>
    </div>
</template>