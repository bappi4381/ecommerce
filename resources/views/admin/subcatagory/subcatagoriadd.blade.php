@extends('admin.admin')

@section('body')
<div class="card w-75">
  <div class="card-header">
    <h3>New Catagory Add</h3>
  </div>
  <div class="card-body ">
    <p class="card-title-desc">{{Session::get('message')}}</p>
    <form action="{{route('subcatagory_create')}}" method="POST" enctype="multipart/form-data">
     @csrf
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label>Catagory</label>
                <select name="catagory_id"class="form-control">
                    @if($catagories->isNotEmpty())
                    @foreach($catagories as $catagory)
                    <option value="{{ $catagory->id }}">{{ $catagory->catagory_name }}</option>
                    @endforeach
                    @endif
                    
                </select>
            </div>
        </div>
        <div class="col-06">
            <div class="form-group">
                <label>Sub Catagory Name</label>
                <input type="text" class="form-control" name="subcatagory_name" placeholder="Catagory name">
            </div>
        </div>
    </div>   
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>
@endsection