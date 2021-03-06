@extends('base')
@section('main')
<div class="row">
   <div class="col-sm-8 offset-sm-2">
      <h1 class="display-3">New USER</h1>
      <div>
        @if ($errors->any())      
        <div class="alert alert-danger">
            <ul>
               @foreach ($errors->all() as $error)              
               <li>{{ $error }}</li>
               @endforeach        
            </ul>
        </div><br/>    
        @endif      
        <form method="post" action="{{ route('contacts.store') }}">
            @csrf 
            <div class="form-group">
                <label for="nickname">Nickname:</label>
                <input type="text" class="form-control" name="nickname"/>
            </div>         
            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" class="form-control" name="first_name"/>
            </div>
            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" class="form-control" name="last_name"/>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" class="form-control" name="email"/>
            </div>
            <div class="form-group">
                <label for="city">City:</label>
                <input type="text" class="form-control" name="city"/>
            </div>
            <div class="form-group">
                <label for="country">Country:</label>
                <input type="text" class="form-control" name="country"/>
            </div>
            <button type="submit" class="btn btn-dark">CREATE</button>  
                <a class="btn btn-primary" href="{{ route('contacts.index') }}">Back to HOME</a>    
        </form>
      </div>
   </div>
</div>
@endsection