<template>


    <select name="dropdown" id="dropdown" v-model="userData" v-on:change="passUserData">
        <option value="Select user" selected="selected" disabled >Select user</option>
        <option v-for="user in users"  :key="user.id" v-bind:value="user.id" v-text="user.name"></option>
    </select>
</template>

<script>
export default {
    props :{
        users: {
            type :Array,
            default : function(){
                return []
            }
        }
    },
    data:function(){
        return {
            userData : ''
        }
    },
    methods :{
        passUserData(event){

            this.$emit('passUserData',this.userData)
        }
    }
}
</script>

<style scoped>

</style>
