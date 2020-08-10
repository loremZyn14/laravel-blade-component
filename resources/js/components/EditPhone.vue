<template>
    <div>
        <h2>Your Editing Phone of {{ phone.user.name}}</h2>
        <span class="btn" @click="addPhone"><i class="fas fa-chevron-left"></i> back</span><br><br>
        <label for="name">Name</label>
        <input type="text" class="form-control"  id="name" v-model="newPhoneName">
        <button class="btn btn-primary mt-3" @click="updatePhone">Submit</button>
    </div>
</template>
<script>
export default {
    props :{
        phone : {
            type : Object,
        }
    },
    data:function(){
        return {
            newPhoneName : this.phone.name
        }
    },
    methods :{
        addPhone(){
            this.$emit('back',true)
        },
        updatePhone(){
            axios.put(`/api/phones/${this.phone.id}`,{
                name : this.newPhoneName
            }).then((response)=>{
                if(response.data == 'ok'){
                    this.addPhone()
                }
            })
        }
    },
    watch : {
        phone : function (newVal,oldVal){
            this.newPhoneName = newVal.name
        }
    }

}
</script>
