@extends('admin.layout.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Product</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Edit Product</li>
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
                <h3 class="card-title">Form</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action={{route('product.edit', ['id' => $record->id])}} method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name<span style="color: red">*</span></label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Category Name"  name="title" value={{$record->title}}>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">SKU<span style="color: red">*</span></label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="SKU"  name="sku" value={{$record->sku}}>
                                    <div style="color: red">{{ $errors->first('slug')}}</div>
                                </div>
                            </div>
                        </div>
                        

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="statusSelect">Category<span style="color: red">*</span></label>
                                    <select class="form-control" id="categorySelect" name="category">
                                        @foreach ($category as $data)
                                            <option {{ ($record->categoryId == $data->id) ? 'selected' : '' }} value="{{ $data->id }}">{{ $data->name }}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="statusSelect">Sub Category<span style="color: red">*</span></label>
                                    <select class="form-control" id="subcategorySelect" name="subcategory">
                                        {{-- @foreach ($subcategories as $subcategory)
                                        <option value={{$subcategory->id}}>{{$subcategory->name}}</option>
                                        @endforeach --}}
                                        
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Old Price<span style="color: red">*</span></label>
                                    <input type="number" class="form-control" id="floatNumber" name="old_price" step="any" value={{$record->old_price}}>
                                
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">New Price<span style="color: red">*</span></label>
                                    <input type="number" class="form-control" id="floatNumber" name="new_price" step="any" value={{$record->new_price}}>
                            
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Image<span style="color: red">*</span></label>
                                    <input type="file" class="form-control" id="floatNumber" name="image[]" multiple accept="image/*">
                               
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Short Descriptions</label>
                                    <textarea  class="form-control" id="exampleInputEmail1" placeholder="Short Description"  name="short_description">{{$record->short_description}}</textarea>
                                    <div style="color: red">{{ $errors->first('meta_description')}}</div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Descriptions</label>
                                    <textarea  class="form-control" id="exampleInputEmail1" placeholder="Description"  name="description">{{$record->description}}</textarea>
                                    <div style="color: red">{{ $errors->first('meta_description')}}</div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Additional Information</label>
                                    <textarea  class="form-control" id="exampleInputEmail1" placeholder="Additional Information"  name="additional_information">{{$record->additional_information}}</textarea>
                                    <div style="color: red">{{ $errors->first('meta_description')}}</div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Shipping & returns</label>
                                    <textarea  class="form-control" id="exampleInputEmail1" placeholder="Shipping & returns"  name="shipping_n_returns">{{$record->shipping_n_returns}}</textarea>
                                    <div style="color: red">{{ $errors->first('meta_description')}}</div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="statusSelect">Size<span style="color: red">*</span></label>
                                    <table class="table table-striped">
                                        <thead>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody id="append">
                                            <tr>
                                                <td><input type="text" name="size[100][name]"></td>
                                                <td><input type="number" step="any" name="size[100][price]"></td>
                                                <td>
                                                    <button type="button" class="btn btn-primary btn-sm" id="addSize">Add</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Colour<span style="color: red">*</span></label>
                                    @foreach ($colours as $colour)
                                    <div>
                                        <input type="checkbox" name="colour_id[]" value={{$colour->id}}>
                                        <label for="colour_id[]"> </label>{{$colour->name}}<br>
                                    </div>
                                    
                                    @endforeach
                                </div>
                               
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label >Status<span style="color: red">*</span></label>
                                    <select class="form-control" id="statusSelect" name="status">
                                        <option {{($record->status == 0) ? 'selected': ''}} value="0">Active</option>
                                        <option {{($record->status == 1) ? 'selected': ''}} value="1">Inactive</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="statusSelect">Brand<span style="color: red">*</span></label>
                                    <select class="form-control" id="statusSelect" name="brand">
                                        @foreach ($brands as $brand)
                                        <option value={{$brand->id}}>{{$brand->name}}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                            </div>
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
@section('script')
<script>

    
    $(document).ready(function () {

        var i = 101;
        $('#addSize').click(function(){

            var html= '<tr id="deletesize'+i+'">\n\
                                                <td><input type="text" name="size['+i+'][name]"></td>\n\
                                                <td><input type="number" step="any" name="size['+i+'][price]"></td>\n\
                                                <td>\n\
                                                    <button id="'+i+'" type="button" class="btn btn-danger btn-sm deletesize">delete</button>\n\
                                                </td>\n\
                                            </tr>';
            i++;                                
            $('#append').append(html);
        });
    });

    $(document).on('click', '.deletesize', function(){
        var id = $(this).attr('id');

        $('#deletesize' + id).remove();
    });
    

    $(document).ready(function () {
        // Event listener for category selection change

        $('#categorySelect').change(function () {
            var categoryId = $(this).val();

            // AJAX request to get subcategories based on the selected category
            $.ajax({
                url: '/get-subcategories/' + categoryId,
                type: 'GET',
                success: function (data) {
                    // Clear existing options in the subcategory select
                    $('#subcategorySelect').empty();

                    // Populate subcategory select with new options
                    $.each(data, function (key, value) {
                        $('#subcategorySelect').append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                }
            });
        });
    });
</script>
@endsection