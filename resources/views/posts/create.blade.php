@extends('layouts.app')

@section('content')


<div class="container">
    <form action="/p" method="post">
        <div class="col-8 offset-2" >
        @csrf
    <div class="form-group row">
        <label for="title" class="col-md-4 col-form-label ">{{ __('title') }}</label>

        
            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title')  }}" required autocomplete="title" autofocus>

            @error('title')
                
                    <strong>{{ $message }}</strong>
                
            @enderror
        </div>
    
    <div class="form-group row">
        <label for="description" class="col-md-4 col-form-label ">{{ __('description') }}</label>

        
            <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description" autofocus>

            @error('description')
                
                    <strong>{{ $message }}</strong>
                
            @enderror
        
    </div>

    <div class="form-group row">
        <label for="post" class="col-md-4 col-form-label ">{{ __('post') }}</label>

            <textarea name="post" id="post" cols="30" rows="10"  class="form-control @error('description') is-invalid @enderror" ></textarea>
            @error('post')
            
                <strong>{{ $message }}</strong>
            
        @enderror
        </div>
        <div class="form-group row mb-0">
            
                <button type="submit" class="btn btn-primary">
                    {{ __('Create') }}
                </button>
            
        </div>
            
</div>



    </div>

     




    </form>
</div>




@endsection
