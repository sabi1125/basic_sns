<template>
    
<div>
 
<div class="add">
          <a  @click="showAdd" >Add photos</a>  
</div>
                

        <transition name="fade">
            <div class="form-group row" v-show="addPhotos">
                
        

                <input id="images" type="file" name="images" class="mt-3 ml-4">

                
                <br>
        
                </div>
</transition>

</div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data(){
            return{
                addPhotos:false
            }
        },
        methods:{
            showAdd(){
                this.addPhotos = !this.addPhotos
            }
        }
        
    }
</script>


<style>
.add a {
    background: #008CBA;
    cursor: pointer;
    padding: 10px;
    text-decoration: none;
    color: white !important;
    border-radius: 5px;
    transition: 0.1s ease-in-out;
}


.add a{
    background: none;
    color:#008CBA !important;
    border: 1px #008CBA solid;
}


.fade-enter-active, .view-leave-active{
    transition: opacity 0.5s ease-in-out, transform 0.5s ease;
}

.view-enter, .view-leave-to{
    opacity: 0;
}




</style>