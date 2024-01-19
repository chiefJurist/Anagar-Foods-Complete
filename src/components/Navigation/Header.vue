<script>
    export default {
       methods: {
            toggle() {
                this.$emit('control')
            }
       }
    }
</script>

<template>
    <div class="header-container">
        <div class=" py-5 sm:py-0 sm:text-2xl">
            <span><img src="/img/anagar-logo.png" alt="logo" class=" w-1/4 sm:w-1/2 "></span>
            <span class=" text-2xl sm:text-3xl">Anagar Foods</span>
        </div>

        <!--Menu for bigger screens-->
        <div class="nav-container">
            <ul class="flex">
                <li><router-link to="/" class="header-router">Home</router-link></li>
                <li><router-link to="/about" class="header-router">About</router-link></li>
                <li><router-link to="/contact" class="header-router">Contact</router-link></li>
                <li><router-link to="/login" class="header-router">Login</router-link></li>
                <li><router-link :to="{name: 'Register'}" class="header-router">Register</router-link></li>
            </ul>
        </div>

        <!--Menu for small screens-->
        <div @click="toggle" class="burger sm:hidden">
            <ion-icon name="menu-outline" class="font-bold text-3xl"></ion-icon>
        </div>
    </div>
</template>
