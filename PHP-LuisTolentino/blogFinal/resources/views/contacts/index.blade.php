@extends('base')
@section('main')
<div class="row">
  <div class="col-sm-12">
    @if(session()->get('success'))    
      <div class="alert alert-success">      
        {{ session()->get('success') }}
      </div>  
    @endif
    <h1 class="display-3">Contacts</h1>
    <div>
      <a href="{{ route('contacts.create')}}" class="btn btn-primary mb-3">New contact</a>
    </div>

      <table class="table table-striped">
        <thead>
          <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Email</td>
            <td>Job Title</td>
            <td>City</td>
            <td>Country</td>
            <td colspan=2>Actions</td>
          </tr>
        </thead>
      <tbody>
        @forelse($contacts as $contact)
          <tr>
            <td>{{$contact->id}}</td>
            <td>{{$contact->first_name}} {{$contact->last_name}}</td>
            <td>{{$contact->email}}</td>
            <td>{{$contact->job_title}}</td>
            <td>{{$contact->city}}</td>
            <td>{{$contact->country}}</td>
            <td><a href="{{ route('contacts.edit',$contact->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
              <form action="{{ route('contacts.destroy',$contact->id)}}" method="post">
              @csrf
              @method('DELETE')
                <button class="btn btn-danger" type="submit" data-toggle="modal" data-target="#exampleModal">Delete</button>
              </form>
            </td>
          </tr>
        @empty
        <tr>
          <td colspan="7">We don't have any contact registers.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Deleting contact</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure that you want to delete the contact: {{$contact->first_name}} {{$contact->last_name}}?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button type="button" class="btn btn-primary">Yes</button>
      </div>
    </div>
  </div>
</div>
@endsection
