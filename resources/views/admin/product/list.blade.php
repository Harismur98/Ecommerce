@extends('admin.layout.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Product</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Product List</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      @include('admin.layout.message')
      <div class="row">
        
        <!-- /.col -->
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col-sm-6">
                  <h3 class="card-title">Striped Full Width Table</h3>
                </div>
                
                <div class="col-sm-6 text-right">
                  <a href="{{route('product.add')}}" class="btn btn-primary btn-sm">Add Product</a>
                </div>
              </div>
              </div>
              
            
            <!-- /.card-header -->
            <div class="card-body p-0">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Title</th>
                    {{-- <th>slug</th>
                    <th>category</th>
                    <th>subcategoryId</th>
                    <th>old_price</th>
                    <th>new_price</th>
                    <th>short_description</th>
                    <th>Description</th>
                    <th> additional_information</th>
                    <th>shipping_&_returns</th> --}}
                    <th>status</th>
                    <th>createdBy</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($records as $data)                    
                  <tr>
                    <td>{{$data-> id}}</td>
                    <td>{{$data-> title}}</td>
                    {{-- <td>{{$data-> slug}}</td>
                    <td>{{$data-> category -> name}}</td>
                    <td>{{$data-> subcategory -> name}}</td>
                    <td>{{$data-> old_price}}</td>
                    <td>{{$data-> new_price}}</td>
                    <td>{{$data-> short_description}}</td>
                    <td>{{$data-> description}}</td>
                    <td>{{$data-> additional_information}}</td>
                    <td>{{$data-> shipping_n_returns}}</td> --}}
                    <td>{{ ($data-> status==0) ? 'Active' : 'Inactive'}}</td>
                    <td>{{$data-> createdBy}}</td>

                    <td>
                      <a href="{{route('product.edit', ['id' => $data->id])}}" class="btn btn-primary btn-sm">Edit</a>
                      <a href="{{route('product.delete', ['id' => $data->id])}}" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
  <!-- /.content-wrapper -->
@endsection