@extends('admin.admin')
@section('body')
<div class="row mt-4">
    <div class="col mx-auto">
        <div class="card" style="width: 38rem;">
            <div class="card-body">
                    <h4 class="card-title mb-4">Update Catagory Form</h4>
                    <h4 class="text-center text-success">{{Session::get('message')}}</h4>
                    <form action="{{route('catagory_update',['id' => $catagory->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mt-2">
                            <div class="form-group">
                                <label for="formrow-firstname-input">Catagory name</label>
                                <input type="text"  name="catagory_name" value="{{$catagory->catagory_name}}" class="form-control" id="formrow-firstname-input">
                            </div>
                        </div>
                        
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary w-md">Update Catagory</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
@endsection