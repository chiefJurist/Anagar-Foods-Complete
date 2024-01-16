<script>
    import { RouterView } from 'vue-router'
    import Header from './components/Header.vue';
    import Footer from './components/Footer.vue';
    import Menu from './components/Menu.vue';

    export default{
        components: { Header, Footer, Menu },

        data() {
            return{
                showMenu: false
            }
        },

        methods: {
            toggleShowMenu() {
                this.showMenu = !this.showMenu
            }
        }
    }
</script>

<template>
    <div class="app">
        <Header :showMenu="showMenu" @control ="toggleShowMenu" />
        <Menu :showMenu="showMenu" @control="toggleShowMenu" />
	    <RouterView v-if="!showMenu" />
        <Footer v-if="!showMenu" />
    </div>
</template>