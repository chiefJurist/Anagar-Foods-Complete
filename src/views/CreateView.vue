<script>
    import International from "../components/Session/Create/International.vue";
    import Local from "../components/Session/Create/Local.vue";
    import Country from "../components/Session/Create/Country.vue";

    export default{
        components: { International, Local, Country },

        data () {
            return{
                location: "",
                role: ""
            }
        }
    }
</script>

<template>
    <div class=" flex justify-center py-24 bg-bg-4">
        <form action="" class=" w-3/4 shadow-lg border-2 border-orange-600 px-3 sm:py-7 py-10 text-center rounded-lg bg-food-bg text-orange-500">
            <div class=" text-2xl md:text-5xl font-serif text-orange-600 mb-12">Create Your Order</div>


            <!--Choosing The Location-->
            <div class=" mb-8">
                <select name="" id="" v-model="location" class="session-create-select">
                    <option value="">CHOOSE YOUR LOCATION</option>
                    <option value="International">INTERNATIONAL</option>
                    <option value="Local">LOCAL</option>
                </select>
            </div>

            <div v-if="location == 'Local'">
                <div class="text-lg sm:text-2xl font-semibold pt-8">MAIN ORDER</div>
                <div>
                    <Local></Local>
                </div>
                
                <div class="text-lg sm:text-2xl font-semibold pt-8">ADDITIONAL ORDER</div>
                <div>
                    <Local></Local>
                </div>
            </div>

            <div v-if="location == 'International'">
                <div class="text-lg sm:text-2xl font-semibold pt-8">MAIN ORDER</div>
                <div>
                    <International></International>
                </div>
                
                <div class="text-lg sm:text-2xl font-semibold pt-8">ADDITIONAL ORDER</div>
                <div>
                    <International></International>
                </div>
            </div>

            <div v-if="location" class=" py-16">
                <label class="session-input-label">Street Address</label><br>
                <input type="text" class="session-input" placeholder="Input Your Street Address"><br><br>

                <label class="session-input-label">Zip or Postal Code</label><br>
                <input type="text" class="session-input" placeholder="Input Your Zip or Postal Code"><br><br>

                <label class="session-input-label">City</label><br>
                <input type="text" class="session-input" placeholder="Input Your City Name"><br><br>

                <label class="session-input-label">State</label><br>
                <input type="text" class="session-input" placeholder="Input Your State"><br><br>

                <label class="session-input-label">Country</label><br>
                <div>
                    <Country></Country>
                </div>
            </div>

            <!--Choosing The Order Type-->
            <div class=" mb-20">
                <select name="" id="" v-model="role" class="session-create-select">
                    <option value="">CHOOSE ORDER TYPE</option>
                    <option value="Consumer">CONSUMER</option>
                    <option value="Merchant">MERCHANT</option>
                </select>
            </div>

            <div>
                <button type="submit" class="border-2 border-orange-600 p-3 rounded-md font-semibold bg-yellow-300 text-orange-600 hover:bg-yellow-600 hover:text-orange-300 transform transition ease-out duration-500 w-40">Submit</button>
            </div>
        </form>
    </div>
</template>