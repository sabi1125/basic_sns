<template>
    

 <div>
     <div class="container bg-dark py-4 px-3 text-center text-white rounded mt-5 mb-5 h6 d-flex flex-row justify-content-center">

         <a href="/p/create" class="text-white mr-3">Make new post</a>

<form>
        <input type="text"  required v-model="search" @keyup="keyEvent">
</form>


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
                status:this.follows,
                search :"Search here",
                searchData:[]
            }
        },
        methods:{
            //follow other users action
            followUser(){
                console.log(this.userId)
                    axios.post("/follow/" + this.userId)
                    .then(response => {
                        this.status = !this.status
                        console.log(response.data)
                    });
           
            },


            //search for other users action
             keyEvent(e){
                 if(e.key==="Enter" && this.search ){
                     this.searchData.push(this.search);
                     this.search="Search here";
                     window.location.href="/search/" + this.searchData;
                 }

            }
        },
        computed:{
            buttonText(){
                return (this.status) ? "Unfollow" : "Follow";
            }
        }
    }
</script>


<style>


input{
    background: #343a40;
    border-top: none;
    border-right: none;
    border-left: none;
    border-bottom: 1px solid white;
    outline: none;
    color: white;
}
</style>
