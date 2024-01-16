<script>
    import Welcome  from "../components/Home/Welcome.vue";
    import Images from "../components/Home/ImagesDisplay.vue";

    export default {
        components: { Welcome, Images }
    }
</script>

<template>
    <div class=" bg-bg-9 bg-no-repeat bg-right-top">
        <Welcome />
        <Images />
    </div>
</template>
