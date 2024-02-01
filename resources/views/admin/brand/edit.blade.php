@extends('admin.layout.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Brand</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Edit Brand</li>
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
                <form action={{route('brand.edit', ['id' => $record->id])}} method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name<span style="color: red">*</span></label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Brand Name"  name="name" value={{$record->name}}>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Slug<span style="color: red">*</span></label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="slug"  name="slug" value={{$record->slug}}>
                            <div style="color: red">{{ $errors->first('slug')}}</div>
                        </div>

                        <div class="form-group">
                            <label for="statusSelect">Status<span style="color: red">*</span></label>
                            <select class="form-control" id="statusSelect" name="status">
                                <option {{($record->status == 0) ? 'selected': ''}} value="0">Active</option>
                                <option {{($record->status == 0) ? 'selected': ''}} value="1">Inactive</option>
                            </select>
                        </div>
                        {{-- <hr>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Meta Title<span style="color: red">*</span></label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Meta Title"  name="meta_title" value={{$record->meta_title}}>
                            <div style="color: red">{{ $errors->first('meta_title')}}</div>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Meta Description</label>
                            <textarea  class="form-control" id="exampleInputEmail1" placeholder="Meta Description"  name="meta_description" value={{$record->meta_description}}></textarea>
                            <div style="color: red">{{ $errors->first('meta_description')}}</div>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Meta Keywords</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Meta Keywords"  name="meta_keywords" value={{$record->meta_keywords}}>
                            <div style="color: red">{{ $errors->first('meta_keywords')}}</div>
                        </div> --}}

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