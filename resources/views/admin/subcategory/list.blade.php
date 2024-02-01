@extends('admin.layout.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Category</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Category</li>
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
                  <a href="{{route('sub_category.add')}}" class="btn btn-primary btn-sm">Add Category</a>
                </div>
              </div>
              </div>
              
            
            <!-- /.card-header -->
            <div class="card-body p-0">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Name</th>
                    <th>Categories</th>
                    <th>slug</th>
                    <th>Status</th>
                    <th>Meta Title</th>
                    <th>Meta Description</th>
                    <th>Meta Keywords</th>
                    <th>Created By</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($records as $data)                    
                  <tr>
                    <td>{{$data-> id}}</td>
                    <td>{{$data-> name}}</td>
                    <td>{{$data-> category -> name}}</td>
                    <td>{{$data-> slug}}</td>
                    <td>{{ ($data-> status==0) ? 'Active' : 'Inactive'}}</td>
                    <td>{{$data-> meta_title}}</td>
                    <td>{{$data-> meta_description}}</td>
                    <td>{{$data-> meta_keywords}}</td>
                    <td>{{$data -> createdByUser -> name}}</td>
                    <td>
                      <a href="{{route('sub_category.edit', ['id' => $data->id])}}" class="btn btn-primary btn-sm">Edit</a>
                      <a href="{{route('sub_category.delete', ['id' => $data->id])}}" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                    
                </tfoot>
              </table>
            </div>
            
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          {{$records->links()}}
        </div>
        <!-- /.col -->
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
  <!-- /.content-wrapper -->
@endsection