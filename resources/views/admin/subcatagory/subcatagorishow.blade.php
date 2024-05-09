@extends('admin.admin')

@section('body')
    <div class="card">
        <div class="card-body">

            <h3 class="card-title">Subcatagory List</h3>
            <p class="card-title-desc">{{Session::get('message')}}</p>
            
            <table  class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                    <tr>
                        <th>Sl On</th>
                        <th>Catagory Id</th>
                        <th>Catagory name</th>
                        <th>Subatagory name</th>
                        <th>Action</th>
                    </tr>
                </thead>

                
                <tbody>
                   @foreach($catagories as $catagory)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{ $catagory->catagory_id}}</td>
                        <td>{{ $catagory->category->catagory_name ?? null }}</td>
                        <td>{{ $catagory->subcatagory_name}}</td>
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