@extends('admin.admin')

@section('body')
<div class="card w-75">
  <div class="card-header">
    <h3>New Catagory Add</h3>
  </div>
  <div class="card-body ">
    <p class="card-title-desc">{{Session::get('message')}}</p>
    <form action="{{route('catagory_create')}}" method="POST" enctype="multipart/form-data">
     @csrf
        <div class="form-group">
            <label>Catagory Name</label>
            <input type="text" class="form-control w-50" name="catagory_name" placeholder="Catagory name">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>
@endsection