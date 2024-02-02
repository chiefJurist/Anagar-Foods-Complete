<script>
    //TWO WAY DATA BINDING SO THAT THE SELECTED ORDER WILL BE ACCESSIBLE FROM THE PARENT COMPONENT
    //(You justnhave to return a a property bounded to the form)
    export default {
        data() {
            return {
                selected: ""
            };
        }
    };
</script>

<template>
    <select class="session-create-select" v-model="selected">
        <option value="">Our Local Menu</option>
        <option value="Jollof Rice">Jollof Rice</option>
        <option value="Fried Rice">Fried Rice</option>
        <option value="Coconut Rice">Coconut Rice</option>
        <option value="Palm Oil Rice">Palm Oil Rice</option>
        <option value="White Rice">White Rice</option>
        <option value="Jollof Spaghetti">Jollof Spaghetti</option>
        <option value="White Spaghetti">White Spaghetti</option>
        <option value="Jollof Macaroni">Jollof Macaroni</option>
        <option value="White Macaroni">White Macaroni</option>
        <option value="Boiled Yam">Boiled Yam</option>
        <option value="Porridge Yam">Porridge Yam</option>
        <option value="Beans">Beans</option>
        <option value="Boiled Irish potato">Boiled Irish potato</option>
        <option value="Fried Irish potato">Fried Irish potato</option>
        <option value="Fried Sweet Potato">Fried Sweet Potato</option>
        <option value="Boiled Sweet Potato">Boiled Sweet Potato</option>
        <option value="Semolina">Semolina</option>
        <option value="Semovita">Semovita</option>
        <option value="Casava mash (fufu)">Casava mash (fufu)</option>
        <option value="Casava Flakes Pudding ( garri)">Casava Flakes Pudding ( garri)</option>
        <option value="Wheat">Wheat</option>
        <option value="Beans Pudding">Beans Pudding ( moi moi)</option>
        <option value="Bambara pudding">Bambara pudding (okpa)</option>
        <option value="Locale cornmeal">Locale cornmeal (agidi)</option>
        <option value="Corn Pudding">Corn Pudding ( moimoi-oka/ elili-oka)</option>
        <option value="Tomato Stew">Tomato Stew</option>
        <option value="Tomato Sauce ">Tomato Sauce </option>
        <option value="Fried Rice Sauce">Fried Rice Sauce</option>
        <option value="Palm Nut Stew">Palm Nut Stew (ofe akwu)</option>
        <option value="Vegetable sauce">Vegetable sauce</option>
        <option value="Egg Sauce">Egg Sauce</option>
        <option value="Onion Sauce">Onion Sauce</option>
        <option value="Okra soup">Okra soup</option>
        <option value="Egusi Soup">Egusi Soup</option>
        <option value="Ogbono Soup">Ogbono Soup</option>
        <option value="Bitter leaf Soup">Bitter leaf Soup</option>
        <option value="Cocoyam soup">Cocoyam soup</option>
    </select>
</template>