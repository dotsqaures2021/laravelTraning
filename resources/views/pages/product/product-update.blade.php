@extends('layouts.backend');


@section('content')
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Update Product</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <form method="post" action="" enctype="multipart/form-data">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">General</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
            
                  @csrf

              @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
              @endforeach
              <div class="card-body">
                <div class="form-group">
                  <label for="inputName">Name</label>
                  <input type="text" id="inputName" name="name" class="form-control" value="{{ $product->name }}">
                </div>
                <div class="form-group">
                  <label for="inputName">Price</label>
                  <input type="number" id="inputPrice" name="price" class="form-control" value="{{  $product->price }}">
                </div>
                <div class="form-group">
                  <label for="inputName">Sale Price</label>
                  <input type="number" id="inputSalePrice" name="sale_price" class="form-control" value="{{  $product->sale_price }}">
                </div>
                <div class="form-group">
                  <label for="inputBio">Product Description</label>
                  <textarea id="inputDescription" name="description" class="form-control" rows="4">{{  $product->description }} </textarea>
                </div>
                <div class="form-group">
                  <label for="inputFile">Product Image</label>
                  <input type="file" name="image" class="form-control">
                </div>
                {{ $product->status }}
                <div class="form-group">
                  <label for="inputStatus">Status</label>
                  <select id="inputStatus" name="is_active" class="form-control custom-select">
                    <option selected disabled>Select one</option>
                    <option value="1" @if($product->is_active == '1') selected @endif>Active</option>
                    <option value="0" @if($product->is_active == '0') selected @endif>Inactive</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="inputStatus">Brand</label>
                  <select id="inputStatus" name="brand_id" class="form-control custom-select">
                    <option selected disabled>Select one</option>
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}" @if($product->brand_id ==  $brand->id ) selected @endif>{{ $brand->name }}</option>
                    @endforeach

                  </select>
                </div>      
                <div class="form-group">
                  <label for="inputStatus">Category</label>
                  <select id="inputStatus" name="category_id" class="form-control custom-select">
                    <option selected disabled>Select one</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if($product->category_id ==  $category->id ) selected @endif>{{ $category->name }}</option>
                    @endforeach
                  </select>
                </div>            
                
              </div>
              
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        
        </div>
        <div class="row">
          <div class="col-12">
            <a href="#" class="btn btn-secondary">Cancel</a>
            <input type="submit" value="Create Product" class="btn btn-success float-right">
          </div>
        </div>
      </form>
    </section>
    <!-- /.content -->
@stop 