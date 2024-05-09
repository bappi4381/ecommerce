@extends('admin.admin')

@section('body')
    <div class="card">
        <div class="card-body">

            <h3 class="card-title">Subcatagory List</h3>
            <p class="card-title-desc">{{Session::get('message')}}</p>
                
            <  <table id="datatable"  class="table table-bordered">
                
                <thead>
                    <tr>
                        <th>Sl On</th>
                        <th>Product title</th>
                        <th>Product Price</th>
                        <th>Catagory name</th>
                        <th>Subatagory name</th>
                        <th>image</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>

                
                <tbody>
                   @foreach($products as $product)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$product->product_title}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->category->catagory_name}}</td>
                        <td>{{$product->sub_category->subcatagory_name}} </td>
                        <td><img src="{{asset('storage/' .$product->image)}}" alt="" style="height: 50px; width: 50px;"></td>
                        <td>{{$product->description}}</td>
                        <td>
                            <a href="" class="btn btn-success">Edit</a>
                            <a href="" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                   @endforeach
                   
                </tbody>
                
            </table>
        </div>
    </div>
@endsection
     <!-- Script -->
     <script type="text/javascript">
    $(document).ready(function(){

      // DataTable
      $('#studentsTable').DataTable({
         processing: true,
         serverSide: true,
         ajax: "{{route('product_search')}}",
         columns: [
            { data: 'id' },
            { data: 'product_title' },
            { data: 'catagory_name' },
            { data: 'subcatagory_name' },
            { data: 'price' },
         ]
      });

    });
    </script>