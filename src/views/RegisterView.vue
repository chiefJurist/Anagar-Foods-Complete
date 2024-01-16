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
                <label class="label"> New Email:</label><br>
                <input type="email" placeholder="input new email" class="main-input" required>
                <div></div>
            </div>

            <div class="input-con">
                <label class="label">New Username:</label><br>
                <input type="text" placeholder="input new username" class="main-input" required>
                <div></div>
            </div>

            <div class="input-con">
                <label class="label">New Password:</label>
                <input type="password" placeholder="input new password" class="main-input" required>
                <div></div>
            </div>

            <div class="input-con">
                <label class="label">Confirm Password:</label>
                <input type="password" placeholder="confirm new password" class="main-input" required>
                <div></div>
            </div>

            <div class="input-con">
                <label class="label">Usage: </label>
                <select class="sm:text-xl font-bold p-1 sm:p-3 rounded-lg w-4/5" required>
                    <option value="Consumer">Consumer</option>
                    <option value="Merchant">Merchant</option>
                </select>
            </div>

            <div class=" mt-10">
                <input type="checkbox" required>
                <label>Accept terms and conditions</label>
            </div>

            <div class="submit-con">
                <input type="submit" value="Register" class="main-submit">
            </div>
        </form>
    </div>
</template>