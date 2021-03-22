@extends('base')
@section('main')
<div class="row">
<div class="col-sm-12">
@if(session()->get('success'))    
    <div class="alert alert-success">      
    {{ session()->get('success') }}      
</div> 
 @endif  
<h1 class="display-3">Posts</h1>
<div>    
<a href="{{ route('posts.create')}}" class="btn btn-primary mb-5">New Post</a>
</div>      
<table class="table table-striped">    
<thead>        
<tr>          
<td>ID</td>          
<td>Name</td>          
<td>Category</td>          
<td>Description</td>                
<td>Country</td>          
<td colspan = 2>Actions</td>        
</tr>    
</thead>    
<tbody>
     
@forelse($posts as $post)        
<tr>            
<td>{{$post->id}}</td>            
<td>{{$post->name}}</td>            
<td>{{$post->category}}</td>            
<td>{{$post->description}}</td>                     
<td>{{$post->country}}</td>            
<td>              
<a href="{{ route('posts.edit',$post->id)}}" class="btn btn-primary">Edit</a>            
</td>            
<td>                
<form action="{{ route('posts.destroy',$post->id)}}" method="POST">                  
@csrf                  
@method('DELETE')                  
<button class="btn btn-danger" type="button" data-toggle="modal" data-target="#exampleModal">Delete</button>                
</form>         
</td>        
</tr>
@empty
<tr>
<td colspan="7">We don't have any post registered</td>
</tr>

@endforelse    
</tbody>  
</table>
<div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure want to delete this contact {{$post->name}} {{$post->category}}?
      </div>
      <div class="modal-footer">
          <form action="{{ route('posts.destroy',$post->id)}}" method="post">
              @csrf                  
              @method('DELETE') 
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button type="submit" class="btn btn-primary">Yes</button>
          </form>
      </div>
    </div>
  </div>
</div>
@endsection

