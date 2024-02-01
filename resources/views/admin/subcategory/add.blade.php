@extends('admin.layout.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>New Category</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Add New Category</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- /.col -->
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action={{route('sub_category.add')}} method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name<span style="color: red">*</span></label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Sub Category Name"  name="name">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Slug<span style="color: red">*</span></label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="slug"  name="slug">
                            <div style="color: red">{{ $errors->first('slug')}}</div>
                        </div>

                        <div class="form-group">
                            <label for="statusSelect">Category<span style="color: red">*</span></label>
                            <select class="form-control" id="statusSelect" name="category">
                                @foreach ($records as $category)
                                <option value={{$category->id}}>{{$category->name}}</option>
                                @endforeach
                                
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="statusSelect">Status<span style="color: red">*</span></label>
                            <select class="form-control" id="statusSelect" name="status">
                                <option value="0">Active</option>
                                <option value="1">Inactive</option>
                            </select>
                        </div>

                        <hr>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Meta Title<span style="color: red">*</span></label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Meta Title"  name="meta_title">
                            <div style="color: red">{{ $errors->first('meta_title')}}</div>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Meta Description</label>
                            <textarea  class="form-control" id="exampleInputEmail1" placeholder="Meta Description"  name="meta_description"></textarea>
                            <div style="color: red">{{ $errors->first('meta_description')}}</div>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Meta Keywords</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Meta Keywords"  name="meta_keywords">
                            <div style="color: red">{{ $errors->first('meta_keywords')}}</div>
                        </div>

                    </div>

                    


                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.col -->
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
  <!-- /.content-wrapper -->
@endsection