<script>
    import Title from '../components/Session/Settings/Title.vue';
    import Body from '../components/Session/Settings/Body.vue';
    import Logout from '../components/Session/Settings/Logout.vue';

    export default {
        components:{ Title, Body, Logout }
    }
</script>

<template>
    <div class=" bg-bg-5">
        <Title></Title>
        <Body></Body>
        <Logout></Logout>
    </div>
</template>