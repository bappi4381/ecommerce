@extends('admin.admin')

@section('body')
<div class="card w-75">
  <div class="card-header">
    <h3>Product add</h3>
  </div>
  <div class="card-body ">
    <p class="card-title-desc">{{Session::get('message')}}</p>
    <form action="{{route('product_create')}}" method="POST" enctype="multipart/form-data">
     @csrf
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label>Product tittle</label>
                    <input type="text" class="form-control " name="product_title" placeholder="Product title">
                    @error('product_title')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>Product Price</label>
                    <input type="text" class="form-control " name="price" placeholder="Product Price">
                    @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                 <label>Catagory</label>
                    <select name="catagory_id"class="form-control">
                    @if($catagories->isNotEmpty())
                    @foreach($catagories as $catagory)
                    <option value="{{ $catagory->id }}">{{ $catagory->category->catagory_name ?? null }}</option>
                    @endforeach
                    @endif 
                    </select>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                 <label>Sub Catagory</label>
                    <select name="sub_catagory_id"class="form-control">
                    @if($catagories->isNotEmpty())
                    @foreach($catagories as $catagory)
                    <option value="{{ $catagory->id }}">{{ $catagory->subcatagory_name }}</option>
                    @endforeach
                    @endif 
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Product Discription</label>
            <textarea class="form-control" name="description"  cols="50" placeholder="Product discription"></textarea>
        </div>
        <div class="form-group">
            <label for="formrow-password-input">Image</label>
            <input type="file" name="image" class="form-control" id="formrow-password-input">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>
@endsection