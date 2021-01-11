<template>
    

 <div>
     <div class="container bg-dark py-4 px-3 text-center text-white rounded mt-5 mb-5 h6">
         <a href="#" class="text-white mr-3">Friends</a>
         <a href="#" class="text-white mr-3">Updates</a>
         <a href="#" class="text-white mr-3">Notifications</a>


     </div>
 </div>
    
</template>

<script>
    export default {
        props:["userId","follows"],


        mounted() {
            console.log('Component mounted.')
        },
        data:function(){
            return{
                status:this.follows
            }
        },
        methods:{
            followUser(){
                console.log(this.userId)
                    axios.post("/follow/" + this.userId)
                    .then(response => {
                        this.status = !this.status
                        console.log(response.data)
                    });
            }
        },
        computed:{
            buttonText(){
                return (this.status) ? "Unfollow" : "Follow";
            }
        }
    }
</script>
