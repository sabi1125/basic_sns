@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" >
        <div class="col-3 p-5">
            <img src="{{ $user->profile->images ?? "data:image/png;base64,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" }}" style="max-width:150px" class="rounded-circle" alt="asdf">

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
<a href="/profile/{{ $user->username }}/edit">Edit profile</a>
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
