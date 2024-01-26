<script>
    export default{
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
                usageError: "",
                termsError: ""
            }
        },

        mounted(){
            fetch("http://localhost/Anagar-Foods-Complete/data/register.php")
            //Fetching The Response
            .then((response) => response.json())

            //Fetching The Actual Data and Populating The Jobs Property
            .then((data) => {
                console.log("Received data:", data);
                this.users = data
            })
            
            //Catching Errors
            .catch((error) => console.error("Error fetching data:", error));
        },

        methods: {
            //VALIDATE FORM
            validateForm() {
                //Validate Email
                for (const user of this.users) {
                    if (user.email == this.email) {
                        this.emailError = "You Already Have An Account"
                    }
                }

                //Validate Username
                for (const user of this.users) {
                    if (user.username == this.username) {
                        this.usernameError = "Username is Taken"
                    }
                }

                //Validate Password
                if (this.password != this.password2) {
                    this.passwordError = "Passwords do not match";
                } else if (this.password.length < 8) {
                    this.passwordError = "Password should be at least 8 characters long";
                }
            },

            //CLEARING THE ERROR
            clearError(){
                this.usernameError = this.emailError = this.passwordError = "";
            }
        }
    }
</script>

<template>
    <div class="form-con">
        <form @submit.prevent="validateForm" class="main-form">
            <div class="input-con">
                <label class="label"> New Email:</label><br>
                <input type="email" placeholder="input new email" class="main-input" required v-model="email" @keydown="clearError">
                <div class="error"> {{ emailError }} </div>
            </div>

            <div class="input-con">
                <label class="label">New Username:</label><br>
                <input type="text" placeholder="input new username" class="main-input" required v-model="username" @keydown="clearError">
                <div class="error"> {{ usernameError }} </div>
            </div>

            <div class="input-con">
                <label class="label">New Password:</label>
                <input type="password" placeholder="input new password" class="main-input" required v-model="password" @keydown="clearError">
                <div class="error"> {{ passwordError }} </div>
            </div>

            <div class="input-con">
                <label class="label">Confirm Password:</label>
                <input type="password" placeholder="confirm new password" class="main-input" required v-model="password2">
                <div class="error"> {{ passwordError }} </div>
            </div>

            <div class="input-con">
                <label class="label">Usage: </label>
                <select class="sm:text-xl font-bold p-1 sm:p-3 rounded-lg w-4/5" required v-model="usage">
                    <option value="Consumer">Consumer</option>
                    <option value="Merchant">Merchant</option>
                </select>
                <div class="error"> {{ usageError }} </div>
            </div>

            <div class=" mt-10">
                <input type="checkbox" required v-model="terms">
                <label>Accept terms and conditions</label>
                <div class="error">  {{ termsError }} </div>
            </div>

            <div class="submit-con">
                <input type="submit" value="Register" class="main-submit">
            </div>
        </form>
    </div>
</template>