@extends('base')
@section('main')
<div class="row">
   <div class="col-sm-8 offset-sm-2">
      <h1 class="display-3">Editar un Post</h1> 
      <div>
         @if ($errors->any())      
         <div class="alert alert-danger">
            <ul>
               @foreach ($errors->all() as $error)              
               <li>{{ $error }}</li>
               @endforeach        
            </ul>
         </div>
         <br />
         @endif      
         <form method="post" action="{{route('posts.update',$post->id)}}"> 
            @method('PATCH')
            @csrf          
            <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name" value="{{$post->name}}"/>
            </div>
            <div class="form-group"><label for="category">Category:</label>
            <input type="text" class="form-control" name="category" value="{{$post->category}}"/>
            </div>
            <div class="form-group"><label for="description">Description:</label>
            <input type="text" class="form-control" name="description" value="{{$post->desription}}"/>
            </div>
            <div class="form-group"><label for="country">Country:</label>
            <input type="text" class="form-control" name="country" value="{{$post->country}}"/>
            </div>
            <button type="submit" class="btn btn-dark ">Edit post</button>     
         </form>
      </div>
   </div>
</div>
@endsection