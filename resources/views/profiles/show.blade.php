@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" >
        <div class="col-3 p-5">
            <img src="{{ $user->profile->images }}" style="max-width:150px" class="rounded-circle" alt="asdf">

        </div>

        <div class="col-9">
<div class="pt-5 d-flex justify-content-between align-items-baseline" >
    <div class="d-flex align-items-center ">
    <h1>{{ $user->username  }}</h1>



@cannot("update",$user->profile)
<follow-Button user-id="{{$user->id}}" follows="{{$follows}}"></follow-Button>
@endcannot
</div>

    @can('update',$user->profile)
    <a href="/p/create">Add new post</a>
    @endcan
 


</div>



@can('update',$user->profile)
<a href="/profile/{{ $user->id }}/edit">Edit profile</a>
@endcan




<div class="d-flex">
    <div class="pr-5"><strong>posts: </strong>{{ $user->posts->count() }} </div>
    
    <div class="pr-5"><strong>followers: </strong>{{ $user->profile->followers->count() }} </div>
    
    <div class="pr-5"><strong>following: </strong>{{ $user->following->count() }} </div>
</div>


<div class="font-weight-bold pt-3"> {{ $user->profile->title ?? "not avialable" }} </div>
<div> {{$user->profile->description ?? "not avialable"}} </div>
<div><a href="{{ $user->profile->url }}">{{ $user->profile->url ?? "Not Avialable" }}</a></div>
</div>

    </div>






    <div class="row pt-5 d-flex flex-column mt-5 mb-5">
        
        @forelse($user->posts as $post)

        
        
        <div class="container p-5 mt-3 bg-white shadow d-flex flex-column rounded">
            <div class="d-flex flex-row " >
                
                    <img src="{{ $user->profile->images }}" alt="" class="col-md-1 mb-4 rounded-circle">
                <div class="d-flex flex-column">
                    <h5>{{ $user->username }}</h5> 
                    created at: {{$post->created_at}}
                </div>
                </div>
            
            

            <div class="border border-white p-5 mt-5 rounded">
                <div>
             <h5> {{ $post->post }} </h5>

        </div>
            <br>
        @if($post->images !== Null)

        
        <div class="col-md text-center m-5 px-0">
    <a href="/p/{{ $post->id }}">

            <img src="{{ $post->images }}" alt="" class="w-50 h-50 rounded">
            
        </a>

        </div>
        @endif



    </div>
        </div>
        @empty
        <div class="container p-5 mt-3 bg-dark text-white text-center h4 rounded">
            <p>There are no posts to display</p>
        </div>


        @endforelse



    
    </div>
</div>



</div>





@endsection
