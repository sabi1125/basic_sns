@extends('layouts.app')

@section('content')


<div class="container border border-black text-center p-5">
<a href="/profile/{{$user->profile->id}}">
    <img src="{{ $user->profile->images }}" alt="" class="col-md-3 mb-4 rounded-circle">
<h4> {{($user->username)}}</h4>
</a>
</div>

<widget-bar></widget-bar>



@forelse($posts as $post)
    
        
<div class="container p-5 mt-3 bg-white shadow d-flex flex-column rounded">
    <div class="d-flex flex-row " >
        

            <img src="{{ $post->user->profile->images }}" alt="" class="col-md-1 mb-4 rounded-circle">
        <div class="d-flex flex-column">
            <h5>{{ $post->user->username }}</h5> 
            created at: {{$post->created_at}}
        </div>
        </div>
    
    

    <div class="p-5 mt-5 rounded">
        <div>
     <h5 class="border border-gray py-3 px-4"> {{ $post->post }} </h5>

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
        <div class="container p-5 mt-3  text-gray text-center h2 rounded">
            <p>You currently can see no posts Try following someone.. <br>
                Or your friends have not posted anything yet
            </p>
        </div>

@endforelse

@endsection
