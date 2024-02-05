<script>
    import { RouterView } from 'vue-router'
    import Header from './components/Navigation/Header.vue';
    import Footer from './components/Navigation/Footer.vue';
    import Menu from './components/Navigation/Menu.vue';
    
    //FOR THE LOGIN PART
    import Header2 from './components/Session/Navigation/Header2.vue';
    import Menu2 from './components/Session/Navigation/Menu2.vue';

    export default{
        components: { Header, Footer, Menu, Header2, Menu2},

        data() {
            return{
                showMenu: false,
                showMenu2: false,
                session: false,
                //FOR THE DATABASE SESSION
                id: "5",
                email: "testemail",
                username: "testuser",
                type: "testtype"
            }
        },


        methods: {
            toggleShowMenu() {
                this.showMenu = !this.showMenu
            },

            toggleShowMenu2(){
                this.showMenu2 = !this.showMenu2
            },

            //For changing The Type Of Header And Menu to Display
            changeHeader() {
                this.session = !this.session
                console.log(this.id)
                // Save the session state to localStorage
                localStorage.setItem('session', JSON.stringify(this.session));
            },

            //For Populating The Database Session
            handleLoginSuccess(userData) {
                // Handle the data passed from the child component
                this.id = userData.id;
                this.email = userData.email;
                this.username = userData.username;
                this.type = userData.type;
                console.log(this.id)

                // Save user data to localStorage
                //For Making Sure The userdata Values Are Not Changed When Page Is Refreshed
                localStorage.setItem('user', JSON.stringify(userData));
            },

            loggingOut(){
                this.session = false;
                this.id = this.username = this.email = this.type = "";
                localStorage.clear();
                this.$router.push({ name: "Home" })
            }
        },

        
        mounted() {
            //For Making Sure The Session Value Is Not Changed When Page Is Refreshed
            // Retrieve session state from localStorage when the component is mounted
            const storedSession = localStorage.getItem('session');
            if (storedSession) {
                this.session = JSON.parse(storedSession);
            }

            //For Making Sure The userdata Values Are Not Changed When Page Is Refreshed
            const storedUser = localStorage.getItem('user');
            if (storedUser) {
                const userData = JSON.parse(storedUser);
                this.id = userData.id;
                this.email = userData.email;
                this.username = userData.username;
                this.type = userData.type;
            }
        },
    }
</script>


<template>
    <div class="app" v-if="!session">
        <Header @control ="toggleShowMenu" />
        <Menu :showMenu="showMenu" @control="toggleShowMenu" />
	    <RouterView v-if="!showMenu" @control3="changeHeader"/>
        <Footer v-if="!showMenu" />
    </div>

    <!--After The User Has Logged In-->
    <Teleport to="#session" v-if="session">
        <Header2 @control2="toggleShowMenu2"></Header2>
        <Menu2 :showMenu2="showMenu2" @control2="toggleShowMenu2"></Menu2>
        <RouterView @control3="changeHeader" @loginSuccess="handleLoginSuccess" @logOut="loggingOut" :id="id" :email="email" :username="username" :type="type"></RouterView>
        <Footer></Footer>
    </Teleport>
</template>