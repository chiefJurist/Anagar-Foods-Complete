<script>
    export default{
        props: ['session'],
        
        data(){
            return{
                users: [],
                email: "",
                username: "",
                password: "",
                password2: "",
                usage: "",
                terms: false,
                emailError: "",
                usernameError: "",
                passwordError: "",
                typeError: "",
                termsError: "",
                response: "",
                display: ""
            }
        },

        beforeMount (){
            if (this.session == true) {
                this.$router.push({name: "Dashboard"})
            }
        },

        methods: {
            //CLEARING THE ERROR
            clearError(){
                this.usernameError = this.emailError = this.passwordError = "";
            },

            //VALIDATE FORM
            validateForm() {
                    fetch("http://localhost/Anagar-Foods-Complete/data/register.php", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                        },
                        body: JSON.stringify({
                            email: this.email,
                            username: this.username,
                            password: this.password,
                            password2: this.password2,
                            usage: this.usage,
                            terms: this.terms,
                        }),
                    })
                    .then((res) => res.json())
                    .then((data) => {
                        // Handle the response from the server
                        this.response = data;
                        if (this.response.status == "success") {
                            this.display = this.response.message;
                            setTimeout(() => {
                                this.$router.push({ name: "Login" })
                            }, 2000)
                        } else if (this.response.status == "emailError") {
                            this.emailError = this.response.message;
                        } else if (this.response.status == "usernameError") {
                            this.usernameError = this.response.message;
                        } else if (this.response.status  == "passwordError") {
                            this.passwordError = this.response.message;
                        } else if (this.response.status == "typeError") {
                            this.typeError = this.response.message;
                        } else if (this.response.status == "termsError") {
                            this.termsError = this.response.message;
                        } else {
                            this.display = this.response.message;
                        }
                    })
                    .catch((err) => console.error(err));
                // }
            }
        }
    }
</script>

<template>
    <div class="form-con">
        <form @submit.prevent="validateForm" class="main-form" method="POST" action="../../data/register2.php">
            <div class="input-con" v-motion-slide-visible-once-left>
                <label class="label"> New Email:</label><br>
                <input type="email" placeholder="input new email" class="main-input" required v-model="email" @keydown="clearError">
                <div class="error"> {{ emailError }} </div>
            </div>

            <div class="input-con" v-motion-slide-visible-once-left>
                <label class="label">New Username:</label><br>
                <input type="text" placeholder="input new username" class="main-input" required v-model="username" @keydown="clearError">
                <div class="error"> {{ usernameError }} </div>
            </div>

            <div class="input-con" v-motion-slide-visible-once-left>
                <label class="label">New Password:</label>
                <input type="password" placeholder="input new password" class="main-input" required v-model="password" @keydown="clearError">
                <div class="error"> {{ passwordError }} </div>
            </div>

            <div class="input-con" v-motion-slide-visible-once-left>
                <label class="label">Confirm Password:</label>
                <input type="password" placeholder="confirm new password" class="main-input" required v-model="password2">
                <div class="error"> {{ passwordError }} </div>
            </div>

            <div class="input-con" v-motion-slide-visible-once-left>
                <label class="label">Usage: </label>
                <select class="sm:text-xl font-bold p-1 sm:p-3 rounded-lg w-4/5 outline-none" required v-model="usage">
                    <option value="Consumer">Consumer</option>
                    <option value="Merchant">Merchant</option>
                </select>
                <div class="error"> {{ usageError }} </div>
            </div>

            <div class=" mt-10 text-center transition duration-1000 ease-out" v-motion-pop-visible-once>
                <input type="checkbox" required v-model="terms" class=" mr-5 accent-orange-600" checked>
                <label>Accept terms and conditions</label>
                <div class="error">  {{ termsError }} </div>
            </div>

            <div class="submit-con" v-motion-pop-visible-once>
                <input type="submit" value="Register" class="main-submit">
            </div>

            <div class=" text-center font-bold text-lg text-green-600 uppercase">
                {{ display }}
            </div>
        </form>
    </div>
</template>