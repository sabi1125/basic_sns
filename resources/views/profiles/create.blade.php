@extends('layouts.app')

@section('content')


<div class="container">

    @if($user->profile == null)
    <h1 class="col-8">Setup your profile</h1>
    @endif





    <form action="/profile" method="post" enctype="multipart/form-data"> 
        <div class="col-8 offset-2" >
        @csrf
    <div class="form-group row">
        <label for="title" class="col-md-4 col-form-label ">{{ __('Something about you') }}</label>

        
            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title')  }}" required autocomplete="title" autofocus>

            @error('title')
                
                    <strong>{{ $message }}</strong>
                
            @enderror
        </div>
    
    <div class="form-group row">
        <label for="description" class="col-md-4 col-form-label ">{{ __('Description') }}</label>

        
            <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description" autofocus>

            @error('description')
                
                    <strong>{{ $message }}</strong>
                
            @enderror
        
    </div>

    <div class="form-group row">
        <label for="url" class="col-md-4 col-form-label ">{{ __('url') }}</label>

        
            <input id="url" type="text" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url') }}" required autocomplete="url" autofocus>

            @error('url')
                
                    <strong>{{ $message }}</strong>
                
            @enderror
        
    </div>


    
    <div class="form-group row mb-0">
        
        
        <test-js></test-js>
    
    
</div>
    
        <div class="form-group row mt-3">
            
                <button type="submit" class="btn btn-primary">
                    {{ __('Create') }}
                </button>
            
        </div>
            
</div>



    </div>

     




    </form>
</div>




@endsection
