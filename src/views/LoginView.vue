<script>
    export default{
        props: ['session'],

        data(){
            return{
                recognition: "",
                password: "",
                result: "",
                recognitionError: "",
                passwordError: "",
                postError: ""
            }
        },

        beforeMount (){
            if (this.session == true) {
                this.$router.push({name: "Dashboard"})
            }
        },

        methods: {
            change() {
                this.$emit("control3")
            },

            //CLEARING THE ERROR
            clearError(){
                this.recognitionError = this.passwordError = "";
            },

            handleSubmit() {
                //POSTING THE DATA TO THE SERVER FOR VALIDATION
                fetch("http://localhost/Anagar-Foods-Complete/data/login.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({
                        recognition: this.recognition,
                        password: this.password
                    })
                })

                //FETCHING THE RESPONSE
                .then((response) => response.json())
                
                //POPULATING THE RESULT PROPERTY
                .then((data) => {
                    this.result = data;

                    //HANDLING THE RESPONSE FROM THE SERVER
                    if (this.result.status == "unrecognized") {
                        //If  the user does not exist
                        this.recognitionError = this.result.message
                    }else if (this.result.status == "invalid") {
                        //if the password is wrong
                        this.passwordError = this.result.message
                    } else if (this.result.status == "error") {
                        //if the post request has a problem
                        this.postError = this.result.message
                    } else if (this.result.status == "success") {
                        //if the action was successful, redirect to dashboard
                        if (this.result.status == "success") {
                            this.change()
                            // Emit an event with user data
                            this.$emit("loginSuccess", {
                                id: this.result.id,
                                email: this.result.email,
                                username: this.result.username,
                                type: this.result.type
                            });
                            this.$router.push({ name: "Dashboard" })
                        }
                    }
                })
                //CATCHING ERRORS   
                .catch(err => console.error(err.message))
            }
        }
    }
</script>

<template>
    <div class="form-con">
        <form @submit.prevent="handleSubmit" class="main-form">
            <div class="input-con" v-motion-slide-visible-right>
                <label class="label">Username / Email:</label><br>
                <input type="text" placeholder="input username or email" class="main-input" required v-model="recognition" @keydown="clearError">
                <div v-if="recognitionError" class=" text-center text-red-600 "> {{ recognitionError }} </div>
            </div>

            <div class="input-con" v-motion-slide-visible-left>
                <label class="label">Password:</label>
                <input type="password" placeholder="input password" class="main-input" required v-model="password" @keydown="clearError">
                <div v-if="passwordError"  class=" text-center text-red-600 "> {{ passwordError }} </div>
            </div>

            <div class="submit-con" v-motion-pop-visible>
                <input type="submit" value="Log In" class="main-submit" required>
            </div>

            <div class=" text-blue-700 font-mono text-center py-10 transition duration-1000 ease-out" v-motion-fade-visible>
                <RouterLink :to="{name : 'ForgotPassword'}"> FORGOT PASSWORD </RouterLink>
            </div>
        </form>
    </div>
</template>