@extends('layouts.backend');

@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Projects</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Users</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Users</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          #
                      </th>
                      <th style="width: 20%">
                          Name
                      </th>
                      <th style="width: 20%">
                          Email
                      </th>
                      <th style="width: 20%">
                          Bio
                      </th>
                      <th style="width: 10%">
                          Website
                      </th>
                      <th style="width: 9%">
                          Status
                      </th>
                  </tr>
              </thead>
              <tbody>
              @foreach ($users as $user)
                <tr>
                    <td style="width: 1%">{{ $user->id }}</td>
                    <td style="width: 20%">{{ $user->name }}</td>
                    <td style="width: 20%">{{ $user->email }}</td>
                    <td style="width: 20%">{{ \Str::limit($user->bio, 20) }}</td>
                    <td style="width: 10%">{{ $user->website }}</td>
                    <td style="width: 9%">{{ $user->status }}</td>
                    <td class="project-actions text-right">
                        <a class="btn btn-primary btn-sm" href="#">
                            <i class="fas fa-folder">
                            </i>
                            View
                        </a>
                        <a class="btn btn-info btn-sm" href="user/{{ $user->id }}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a>
                        <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal_{{$user->id}}" href="delete/{{ $user->id }}">
                            <i class="fas fa-trash">
                            </i>
                            Delete
                        </a>
                        <div class="modal fade" id="exampleModal_{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title{{$user->id}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form method="post" action="{{ route('userlistafterdelete',['id'=>$user->id])}}">
                                    @csrf
                                    @method('delete');
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Delete</button>
                                </form>
                              </div>
                              <div class="modal-footer">
                              
                              </div>
                            </div>
                          </div>
                        </div>

                    </td>
                </tr>
                    
              @endforeach
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
@stop