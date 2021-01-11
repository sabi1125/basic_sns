@extends('layouts.app')

@section('content')


<div class="container text-center shadow-lg rounded p-5">
    <img src="{{ $post->images }}" alt="" class="col-md w-50 h-50 rounded">
    <div class="container mt-5">
        likes:123
        comments:39
        pachi-pachi:20
    </div>
</div>
<div class="container mt-5 text-start">
    <h5>{{$post->user->username}}</h5>
    <p>created at: {{$post->created_at}}</p>
    <h5 class="m-5">{{ $post->post }}</h5>


</div>



@endsection
