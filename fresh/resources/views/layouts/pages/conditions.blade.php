@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    
<div class="box">
            <div class="box-header">
            <button  type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                Add Crop
            </button>
            
            

            <br><br>
              <h3 class="box-title"><b>Crop</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                  <th>Crop Type</th>
                  <th>Crop Name</th>
                  <th>Temparature</th>
                  <th>Humidity</th>
                  <th>Soil Mosture level</th>
                  <th>Light level</th>
                </tr>
                </thead>
                <tbody>
                @foreach($all_Conditions as $Condition)
                <tr>
                  <td>{{$Condition['croptype']}}</td>
                  <td>{{$Condition['cropname']}}</td>
                  <td>{{$Condition['temparature']}}</td>
                  <td>{{$Condition['humidity']}}</td>
                  <td>{{$Condition['soilmosture']}}</td>
                  <td>{{$Condition['lightlevel']}}</td>
                </tr>
                @endforeach
                </tbody>
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
                  <h4 class="modal-title">Add new Crop</h4>
                </div>
                <form method="post" action="">
                {{ csrf_field() }}
                <div class="modal-body">
                <select class="form-control" placeholder="enter type" name="croptype" type="text" >
                    <option>Enter Crop Type</option>
                    <option value="vegetable">Vegetable</option>
                    <option value="flowers">Flowers</option>
                    <option value="fruits">Fruits</option>
                    <option value="other">Other</option>
                  </select><br>
                    <input type="text" placeholder="Crop Name" name="cropname" class="form-control"><br>
                    <input type="number" placeholder="Temparature" name="temparature" class="form-control" min="0" max="100"><br>
                    <input type="number" placeholder="Humidity" name="humidity" class="form-control" min="0" max="100"><br>
                    <input type="number" placeholder="Soil Mosture level" name="soilmosture" class="form-control" min="0" max="100"><br>
                    <input type="number" placeholder="Light level" name="lightlevel" class="form-control" min="0" max="100"><br>
                    
                    

                  </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Add Crop</button>
                </div>
              </form>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->


 



@stop