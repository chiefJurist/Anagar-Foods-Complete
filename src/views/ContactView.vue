<script>
    import ContactMap from '../components/Contact/ContactMap.vue';
    import ContactMessage from '../components/Contact/ContactMessage.vue';
    import ContactNav from '../components/Contact/ContactNav.vue';

    export default{
        components: { ContactMap, ContactMessage, ContactNav },
        
        props: ['session'],

        beforeMount (){
            if (this.session == true) {
                this.$router.push({name: "Dashboard"})
            }
        }
    }
</script>

<template>
    <ContactNav />
    <ContactMap class=" px-4 sm:px-0 " />
    <ContactMessage  class=" px-4 sm:px-0" />
</template>