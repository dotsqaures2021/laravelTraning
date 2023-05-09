@extends('layouts.backend');


@section('content')
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Category</li>
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
                  <label for="inputName">Catgeory Name</label>
                  <input type="text" id="inputName" name="name" class="form-control" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                  <label for="inputBio">Catgeory Description</label>
                  <textarea id="inputDescription" name="description" class="form-control" rows="4">{{ old('description') }} </textarea>
                </div>
                <div class="form-group">
                  <label for="inputFile">Category Image</label>
                  <input type="file" name="image" class="form-control">
                </div>  
                <div class="form-group">
                  <label for="inputStatus">Parent ID</label>
                  <select id="inputStatus" name="parent_id" class="form-control custom-select">
                    <option selected disabled>Select one</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
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
            <input type="submit" value="Create Category" class="btn btn-success float-right">
          </div>
        </div>
      </form>
    </section>
    <!-- /.content -->
@stop 