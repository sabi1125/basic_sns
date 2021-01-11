@extends('layouts.app')

@section('content')


<div class="container">


    <form action="/photo" method="post" enctype="multipart/form-data">
    @csrf



    
    
    <div class="container d-flex flex-column justify-content-center align-items-center mt-5 p-5" >
        

        <h2 class="mb-5">Upload photos</h2>



        <div class="form-group row mb-0">
            
            <button type="submit" class="btn btn-primary">
                {{ __('Upload') }}
            </button>
        
    </div>
    </div>    
            
    
        
</div>




     
@endsection




