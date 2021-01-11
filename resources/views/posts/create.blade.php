@extends('layouts.app')

@section('content')


<div class="container">
    <form action="/p" method="post" enctype="multipart/form-data">
        <div class="col-8 offset-2" >
        @csrf
  
        <div class="form-group row">
            <label for="post" class="col-md-4 col-form-label ">{{ __('post') }}</label>
    
            
                <input id="post" type="text" class="form-control @error('post') is-invalid @enderror" name="post" value="{{ old('post') }}" required autocomplete="post" autofocus>
    
                @error('post')
                    
                        <strong>{{ $message }}</strong>
                    
                @enderror
            
        </div>
    
        
        <div class="form-group row mb-0">
        
        
            <test-js></test-js>
        
        
    </div>
        <div class="form-group row mt-3">
            <div>
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
