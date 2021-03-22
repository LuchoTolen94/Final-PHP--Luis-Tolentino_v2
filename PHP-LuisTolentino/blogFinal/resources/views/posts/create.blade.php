@extends('base')
@section('main')
<div class="row">
   <div class="col-sm-8 offset-sm-2">
      <h1 class="display-3">Añadir un Post</h1> 
      <div>
         @if ($errors->any())      
         <div class="alert alert-danger">
            <ul>
               @foreach ($errors->all() as $error)              
               <li>{{ $error }}</li>
               @endforeach        
            </ul>
         </div>
         <br />    @endif      
         <form method="post" action="{{ route('posts.store') }}">
            @csrf          
            <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name"/>
            </div>
            <div class="form-group"><label for="category">Category:</label>
            <input type="text" class="form-control" name="category"/>
            </div>
            <div class="form-group"><label for="description">Description:</label>
            <input type="text" class="form-control" name="description"/>
            </div>
            <div class="form-group"><label for="country">Country:</label>
            <input type="text" class="form-control" name="country"/>
            </div>
            <button type="submit" class="btn btn-dark ">Add post</button>
            <a class="btn btn-dark" href="{{route('posts.index')}}">back to the list</a>      
         </form>
      </div>
   </div>
</div>
@endsection