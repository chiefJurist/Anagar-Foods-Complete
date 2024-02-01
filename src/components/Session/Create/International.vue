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
        <option value="">Our International Menu</option>
        <option value="Beans Pudding">Beans Pudding ( moi moi)</option>
        <option value="Bambara pudding">Bambara pudding (okpa)</option>
        <option value="Locale cornmeal">Locale cornmeal (agidi)</option>
        <option value="Corn Pudding">Corn Pudding ( moimoi-oka/ elili-oka)</option>
    </select>
</template>