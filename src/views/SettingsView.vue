<script>
    import Title from '../components/Session/Settings/Title.vue';
    import Body from '../components/Session/Settings/Body.vue';
    import Logout from '../components/Session/Settings/Logout.vue';

    export default {
        components:{ Title, Body, Logout },

        props: [ 'email', 'username', 'type', 'session' ],

        beforeMount (){
            if (this.session == false) {
                this.$router.push({name: "Home"})
            }
        },

        methods: {
            logOutFunction(){
                this.$emit("logOut")
            }
        }
    }
</script>

<template>
    <div class=" bg-bg-5">
        <Title></Title>
        <Body :email="email" :username="username" :type="type"></Body>
        <Logout @logOut="logOutFunction"></Logout>
    </div>
</template>