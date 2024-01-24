<script>
    export default{
        return: {
            email: "",
            username: "",
            password: "",
            password2: "",
            usage: "",
            terms: false,
        },
    }
</script>

<template>
    <div class="form-con">
        <form action="../../data/register.php" class="main-form" method="post">
            <div class="input-con">
                <label class="label"> New Email:</label><br>
                <input type="email" placeholder="input new email" class="main-input" required v-model="email">
                <div></div>
            </div>

            <div class="input-con">
                <label class="label">New Username:</label><br>
                <input type="text" placeholder="input new username" class="main-input" required v-model="username">
                <div></div>
            </div>

            <div class="input-con">
                <label class="label">New Password:</label>
                <input type="password" placeholder="input new password" class="main-input" required v-model="password">
                <div> {{ passwordError }} </div>
            </div>

            <div class="input-con">
                <label class="label">Confirm Password:</label>
                <input type="password" placeholder="confirm new password" class="main-input" required v-model="password2">
                <div> {{ passwordError }} </div>
            </div>

            <div class="input-con">
                <label class="label">Usage: </label>
                <select class="sm:text-xl font-bold p-1 sm:p-3 rounded-lg w-4/5" required v-model="usage">
                    <option value="Consumer">Consumer</option>
                    <option value="Merchant">Merchant</option>
                </select>
            </div>

            <div class=" mt-10">
                <input type="checkbox" required v-model="terms">
                <label>Accept terms and conditions</label>
            </div>

            <div class="submit-con">
                <input type="submit" value="Register" class="main-submit">
            </div>
        </form>
    </div>
</template>