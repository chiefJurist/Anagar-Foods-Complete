<script>
    export default{
        data(){
            return{
                email: "",
                password: "",
                password2: "",
                emailError: "",
                passwordError: "",
                otp: "",
                otpError: "",
                result: "",
                result2: ""
            }
        },

        methods: {
            //CLEARING THE ERROR
            clearError(){
                this.emailError = this.passwordError = this.otpError = "";
            },

            //FUNCTION FOR HANDLING THE SUBMIT
            handleSubmit(){
                fetch("http://localhost/Anagar-Foods-Complete/data/forgotPassword.php", {
                    method: "POST",
                    headers: {
                        "Content-Type" : "application/json"
                    },
                    body: JSON.stringify({
                        email: this.email,
                        password: this.password,
                        password2: this.password2
                    })
                })
                .then((response) => response.json())
                .then((data) => {
                    this.result = data
                    if (this.result.status == "emailError") {
                        this.emailError = this.result.message
                    } else if (this.result.status == "passwordError") {
                        this.passwordError = this.result.message
                    }
                })
                .catch((error) => console.error(error))
            },

            //Function For Checking OTP
            checkOtp(){
                if (this.otp == this.result.message) {
                    fetch("http://localhost/Anagar-Foods-Complete/data/forgotPassword2.php", {
                        method: "POST",
                        headers: {
                            "Content-Type" : "application/json"
                        },
                        body: JSON.stringify({
                            email: this.email,
                            password: this.password,
                            password2: this.password2
                        })
                    })
                    .then((res) => res.json())
                    .then((data2) => {
                        this.result2 = data2
                        if (this.result2.status ==  "success") {
                            this.$router.push({ name: "Login" })
                        } else {
                            this.otpError = this.result2.message
                        }
                    })
                } else {
                    this.otpError = "Invalid OTP"
                }
            }
        }
    }
</script>

<template>
    <div class="form-con">
        <form @submit.prevent="handleSubmit" class="main-form" v-if="result.status != 'otp'">
            <div class="input-con">
                <label class="label">Input Your Email</label><br>
                <input type="email" placeholder="Input your email Address" class="main-input" required v-model="email" @keydown="clearError">
                <div class=" text-red-500 text-center text-lg"> {{ emailError }} </div>
            </div>

            <div class="input-con">
                <label class="label">Input New Password</label><br>
                <input type="password" placeholder="Input New Password" class="main-input" required v-model="password" @keydown="clearError">
                <div class=" text-red-500 text-center text-lg"> {{ passwordError }} </div>
            </div>

            <div class="input-con">
                <label class="label">Confirm New Password</label><br>
                <input type="password" placeholder="Confirm New Password" class="main-input" required v-model="password2" @keydown="clearError">
                <div class=" text-red-500 text-center text-lg"> {{ passwordError }} </div>
            </div>

            <div class="submit-con">
                <input type="submit" value="Confirm" class="main-submit">
            </div>
        </form>


        <form @submit.prevent="checkOtp" v-if="result.status == 'otp'">
            <div class="input-con">
                <label class="label">Input OTP Sent To Your Email</label><br>
                <input type="text" class="main-input text-center" required v-model="otp" @keydown="clearError">
                <div class=" text-red-500 text-center text-lg"> {{ otpError }} </div>
            </div>

            <div class="submit-con">
                <input type="submit" value="Confirm" class="main-submit">
            </div>
        </form>
    </div>
</template>