<script>
    export default{
        methods: {
            handleSubmit() {
                //Validate input and redirect
            }
        }
    }
</script>

<template>
    <div class="form-con">
        <form @submit.prevent="handleSubmit" class="main-form">
            <div class="input-con">
                <label class="label">Username / Email:</label><br>
                <input type="text" placeholder="input username or email" class="main-input" required>
                <div></div>
            </div>

            <div class="input-con">
                <label class="label">Password:</label>
                <input type="password" placeholder="input password" class="main-input" required>
                <div></div>
            </div>

            <div class="submit-con">
                <input type="submit" value="Log In" class="main-submit" required>
            </div>
        </form>
    </div>
</template>