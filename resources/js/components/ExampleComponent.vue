<template>
    <div class="container  mt-3">

        <div class="row">
            <ul class="list-group-flush col-md-6">
                <h3 class="pl-3">Phone List : with user</h3>
                <li v-for="phone in phones"  :key="phone.id" class="list-group-item d-flex justify-content-between"  >
                    <p> {{ phone.id}}. {{ phone.name}} : user ( {{phone.user.name}})</p>
                    <div>
                        <span class="btn" @click="editPhone(phone)">
                            <i class="fas fa-edit text-success"></i>
                        </span>
                        <span  class="btn" @click="deletePhone(phone)">
                            <i class="fas fa-trash text-danger"></i>
                        </span>

                    </div>

                </li>
            </ul>
            <create-phone v-if="!edit" @updatePhoneList="createNewPhone" />
            <edit-phone @back="createNewPhone" v-if="edit" :phone="selectedPhone"/>
        </div>
    </div>
</template>

<script>
import createPhone from './CreatePhone';
import editPhone from './EditPhone';
export default {

    components :{
        createPhone,
        editPhone
    },
    data:function(){
        return {
            phones :[],
            edit : false,
            selectedPhone : null,
        }
    },
    mounted(){
        this.createNewPhone()
    },
    methods :{
        getPhones(){
            axios.get('/api/phones').then((response)=>{
                this.phones = response.data
            }).catch(err => alert(err))
        },

        deletePhone(phone){
           axios.delete(`/api/phones/${phone.id}`).then((response)=>{
               if(response.data == 'ok'){
                   this.phones.splice(this.phones.indexOf(phone),1)
                   alert('Phone successfully deleted!')
               }
           })
        },
        editPhone(phone){
            this.edit = true
            this.selectedPhone = phone

        },
        createNewPhone(){
            this.edit = false;
            this.getPhones()
        }

    }
}
</script>
