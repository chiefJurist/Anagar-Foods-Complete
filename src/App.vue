<script>
    import { RouterView } from 'vue-router'
    import Header from './components/Header.vue';
    import Footer from './components/Footer.vue';
    import Menu from './components/Menu.vue';
    
    //FOR THE LOGIN PART
    import Header2 from './components/Session/Header2.vue';
    import Menu2 from './components/Session/Menu2.vue';

    export default{
        components: { Header, Footer, Menu, Header2, Menu2},

        data() {
            return{
                showMenu: false,
                session:true
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
    <div class="app" v-if="!session">
        <Header :showMenu="showMenu" @control ="toggleShowMenu" />
        <Menu :showMenu="showMenu" @control="toggleShowMenu" />
	    <RouterView v-if="!showMenu" />
        <Footer v-if="!showMenu" />
    </div>

    <!--After The User Has Logged In-->
    <Teleport to="#session" v-if="session">
        <Header2></Header2>
        <RouterView></RouterView>
        <Footer></Footer>
    </Teleport>
</template>