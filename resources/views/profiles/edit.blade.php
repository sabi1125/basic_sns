@extends('layouts.app')

@section('content')




<div class="container">

    <h1>Edit profile</h1>
    <form action="/profile/{{$user->username}}" method="post" enctype="multipart/form-data">

        @METHOD("PATCH")

        <div class="col-8 offset-2" >
        @csrf
    <div class="form-group row">
        <label for="title" class="col-md-4 col-form-label ">{{ __('title') }}</label>

        
            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ?? $user->profile->title }}" required autocomplete="title" autofocus>

            @error('title')
                
                    <strong>{{ $message }}</strong>
                
            @enderror
        </div>
    
    <div class="form-group row">
        <label for="description" class="col-md-4 col-form-label ">{{ __('description') }}</label>

        
            <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description')?? $user->profile->description }}" required autocomplete="description" autofocus>

            @error('description')
                
                    <strong>{{ $message }}</strong>
                
            @enderror
        
    </div>
        
    <div class="form-group row">
        <label for="url" class="col-md-4 col-form-label ">{{ __('url') }}</label>

        
            <input id="url" type="text" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url')?? $user->profile->url }}"  autocomplete="url" autofocus>

            @error('url')
                
                    <strong>{{ $message }}</strong>
                
            @enderror
        
    </div>


    
    <div class="form-group row mb-0">

        <div class="d-flex flex-column">
        <p> change Profile picture: </p>

        <test-js></test-js>
    </div>
    
</div>
    
        <div class="form-group row mt-3">
            
                <button type="submit" class="btn btn-primary">
                    {{ __('Create') }}
                </button>
            
        </div>
        </div>
            
</div>



    </div>

     




    </form>


</div>


@endsection
