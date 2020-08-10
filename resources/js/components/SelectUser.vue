<template >
    <div class="form-group">
        <label for="userSelect">Select User</label>
        <select v-model="selectedUser" v-on:change="passUserData" class="form-control" id="userSelect">
            <option selected disabled>Select user..</option>
            <option v-for="user in users" :key="user.id" v-bind:value="user" >{{ user.name}}</option>
        </select>
    </div>

</template>
<script>
export default {
    props :{
        users : {
            type : [Object],
            default(){
                return []
            }
        }
    },
    data :function(){
        return {
            selectedUser : null
        }
    },
    methods :{
        passUserData(value){
            this.$emit('getUserData',this.selectedUser);
        }
    }
}
</script>
