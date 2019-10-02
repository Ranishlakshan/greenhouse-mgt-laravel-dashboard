@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    
<div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                Add Post
              </button></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Image</th>
                  <th>Action</th>
                  
                </tr>
                </thead>
                <tbody>
                @foreach($all_posts as $post)
                    <tr>
                        <td>{{$post['title']}}</td>
                        <td>{{$post['description']}}</td>
                        <td><img src="{{$post['picture']}}" style="height: 50px;width: 50px" ></td>
                        <td>Edit | Delete</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>


          <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Add new Post</h4>
                </div>
                <form method="post" action="">
                {{ csrf_field() }}
                <div class="modal-body">
                    <input type="text" placeholder="enter title" name="title" class="form-control"><br>
                    <input type="text" placeholder="enter description" name="description" class="form-control"><br>
                    

                  </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
              </form>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->


 



@stop