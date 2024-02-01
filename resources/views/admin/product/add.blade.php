@extends('admin.layout.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>New Product</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Add New Product</li>
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
                <form action={{route('product.add')}} method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Title<span style="color: red">*</span></label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Title"  name="title">
                        </div>

                        <div class="form-group">
                          <label for="statusSelect">Brand<span style="color: red">*</span></label>
                          <select class="form-control" id="statusSelect" name="brand">
                              @foreach ($brands as $brand)
                              <option value={{$brand->id}}>{{$brand->name}}</option>
                              @endforeach
                              
                          </select>
                      </div>
                      
                        <div class="form-group">
                            <label for="statusSelect">Category<span style="color: red">*</span></label>
                            <select class="form-control" id="statusSelect" name="category">
                                @foreach ($categories as $category)
                                <option value={{$category->id}}>{{$category->name}}</option>
                                @endforeach
                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="statusSelect">Sub Category<span style="color: red">*</span></label>
                            <select class="form-control" id="statusSelect" name="subcategory">
                                @foreach ($subcategories as $subcategory)
                                <option value={{$subcategory->id}}>{{$subcategory->name}}</option>
                                @endforeach
                                
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Old Price<span style="color: red">*</span></label>
                            <input type="number" class="form-control" id="floatNumber" name="old_price" step="any">
                            <div style="color: red">{{ $errors->first('slug')}}</div>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">New Price<span style="color: red">*</span></label>
                            <input type="number" class="form-control" id="floatNumber" name="new_price" step="any">
                            <div style="color: red">{{ $errors->first('slug')}}</div>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Short Descriptions</label>
                            <textarea  class="form-control" id="exampleInputEmail1" placeholder="Short Description"  name="short_description"></textarea>
                            <div style="color: red">{{ $errors->first('meta_description')}}</div>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Descriptions</label>
                            <textarea  class="form-control" id="exampleInputEmail1" placeholder="Description"  name="description"></textarea>
                            <div style="color: red">{{ $errors->first('meta_description')}}</div>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Additional Information</label>
                            <textarea  class="form-control" id="exampleInputEmail1" placeholder="Additional Information"  name="additional_information"></textarea>
                            <div style="color: red">{{ $errors->first('meta_description')}}</div>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Shipping & returns</label>
                            <textarea  class="form-control" id="exampleInputEmail1" placeholder="Shipping & returns"  name="shipping_n_returns"></textarea>
                            <div style="color: red">{{ $errors->first('meta_description')}}</div>
                        </div>

                        <div class="form-group">
                            <label for="statusSelect">Status<span style="color: red">*</span></label>
                            <select class="form-control" id="statusSelect" name="status">
                                <option value="0">Active</option>
                                <option value="1">Inactive</option>
                            </select>
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