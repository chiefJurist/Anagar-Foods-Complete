<script>
    export default{
        props: [ 'id', 'session' ],

        data() {
            return{
                newUsername: "",
                newType: "",
                dbResponse: ""
            }
        },

        beforeMount (){
            if (this.session == false) {
                this.$router.push({name: "Home"})
            }
        },

        methods: {
            //Clear Errors
            clearUsernameError(){
                this.usernameError = ""
            },
            handleSubmit() {
                //Validate And Redirect
                fetch("http://localhost/Anagar-Foods-Complete/data/editProfile.php", {
                    method: "POST",
                    headers: {
                        "Content-Type" : "application/json"
                    },
                    body: JSON.stringify({
                        id: this.id,
                        username: this.newUsername,
                        type: this.newType
                    })
                })
                .then((response) => response.json())
                .then((data) => {
                    this.dbResponse = data
                    if (this.dbResponse.status == "success") {
                        this.$router.push({name: 'Settings'})
                    }
                })
                .catch((error) => console.error(error))
            }
        }
    }
</script>

<template>
    <div class="form-con">
        <form @submit.prevent="handleSubmit" class="main-form">
            <div class=" text-center text-2xl md:text-5xl font-serif text-orange-600 ">
                EDIT PROFILE
            </div>

            <div class="input-con">
                <label class="label">New Username:</label><br>
                <input type="text" placeholder="input new username" class="main-input" required v-model="newUsername" @keydown="clearUsernameError">
                <div class=" text-red-500 text-center text-lg mt-24">
                    {{ dbResponse.message }}
                </div>
            </div>

            <div class="input-con">
                <label class="label">Usage: </label>
                <select class="sm:text-xl font-bold p-1 sm:p-3 rounded-lg w-4/5" required v-model="newType">
                    <option value="Consumer">Consumer</option>
                    <option value="Merchant">Merchant</option>
                </select>
            </div>

            <div class="submit-con">
                <input type="submit" value="Confirm" class="main-submit">
            </div>
        </form>
    </div>
</template>