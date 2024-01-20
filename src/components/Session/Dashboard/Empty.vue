<script>
    export default{
        data () {
            return {
                dashboard: true
            }
        }
    }
</script>
<template>
    <div class="session-empty" v-if="!dashboard">You Have No Orders!</div>
</template>