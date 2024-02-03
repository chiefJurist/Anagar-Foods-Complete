<script>
    export default{
        methods: {
            logOutFunction(){
                this.$emit("logOut")
            }
        }
    }
</script>

<template>
    <div class=" py-20 flex justify-evenly items-center">
        <div>
            <router-link :to="{name: 'Edit'}" class="session-btn w-32 text-xl">Edit Profile</router-link>
        </div>
        <div>
            <button class="session-btn w-32 text-xl" @click="logOutFunction">Logout</button>
        </div>
    </div>
</template>