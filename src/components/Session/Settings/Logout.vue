<template>
    <div class=" py-20 flex justify-evenly items-center">
        <div>
            <router-link :to="{name: 'Edit'}" class="session-btn w-32 text-xl">Edit Profile</router-link>
        </div>
        <div>
            <button class="session-btn w-32 text-xl">Logout</button>
        </div>
    </div>
</template>