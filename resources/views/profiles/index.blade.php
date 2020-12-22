@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" >
        <div class="col-3 p-5">
            <img src="https://lh3.googleusercontent.com/proxy/Td2MH0f34QcJKYrRH01cTlDSqzhx8S5rIaSceb7Kl9ggllt15GD0mjHYDV1st7D4iujCuyp5v-U4ROAFu_GVnBqP2oek-VVxYaE4eYZKwKalzHEJ9E0TLO_XfRKgn0z5mAUQEJpd-maJYai-HQ" style="max-width:130px" class="rounded-circle" alt="">
        </div>
        <div class="col-9">
<div class="pt-5 d-flex justify-content-between align-items-baseline" ><h1>{{ $user->username  }}</h1>



    @can('update',$user->profile)
    <a href="/p/create">Add new post</a>
    @endcan
    

 


</div>



@can('update',$user->profile)
<a href="/profile/{{ $user->id }}/edit">Edit profile</a>
@endcan




<div class="d-flex">
    <div class="pr-5"><strong>posts: </strong>153 </div>
    
    <div class="pr-5"><strong>followers: </strong>2k </div>
    
    <div class="pr-5"><strong>following: </strong>1k </div>
</div>
<div class="font-weight-bold pt-3"> {{ $user->profile->title }} </div>
<div> {{$user->profile->description}} </div>
<div><a href="#">{{ $user->profile->url ?? "Not Avialable" }}</a></div>
</div>

    </div>




    <div class="row pt-5 d-flex flex-column mt-5 ">
        <strong> {{$user->username}} </strong>
        
        @forelse($user->posts as $post)
        
        <strong># {{ $post->title }}</strong>
        <br>
        <strong>{{ $post->description }}</strong>
        <br>
        <div class="container p-5 mt-3 bg-dark text-white d-flex flex-column">
            {{ $post->post }}


            <div class="mt-5">

                created at: {{$post->created_at}}
            </div>
        </div>
        @empty
        <div class="container p-5 mt-3 bg-dark text-white text-center h4">
            <p>There are no posts to display</p>
        </div>


        @endforelse
    
    </div>



</div>





@endsection
