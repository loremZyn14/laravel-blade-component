<template>
    <div class="col-md-6">
        <h1>Create new Phone</h1>
        <select-user @getUserData="getUser" v-model="users"  :users="users" />
        <label for="name">Phone Name</label>
        <input type="text" class="form-control" id="name" v-model="phoneName">
        <button class="btn btn-primary mt-3" @click="createPhone">Submit</button>
    </div>
</template>
<script>
import selectUser from './SelectUser';
export default {
    components :{
        selectUser
    },
    data(){
        return {
            users : {
                type : Array,
                default(){
                    return []
                }
            },
            phoneName    : null,
            selectedUser : {
                type : Object
            }
        }
    },
    mounted(){
        this.getUsers()
    },

    methods :{
        createPhone(){
            axios.post('/api/phones',{
                user_id : this.selectedUser.id,
                name    : this.phoneName
            }).then((response) => {
                if(response.data == 'ok'){
                    this.$emit('updatePhoneList')
                    this.phoneName = '';
                    this.getUsers()
                }
            }).catch(err => console.log(err))
        },
        getUser(user){
            this.selectedUser = user;
        },
        getUsers(){
            axios.get('/api/users').then((response)=>{
                this.users = response.data
            }).catch((err)=>{
                console.log(err)
            });
        }
    },


}
</script>
