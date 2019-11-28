@extends('layouts.admin')

@section('content')
    <section class="content">
            <section class="content-header">
                    <div class="container-fluid">
                      <div class="row mb-2">
                        <div class="col-sm-6">
                          <h1>Group Menu</h1>
                        </div>
                        <div class="col-sm-6">
                          <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Menu</li>
                          </ol>
                        </div>
                      </div>
                    </div><!-- /.container-fluid -->
                  </section>
        <div class="container-fluid">
              <div class="row" id="successMessage">
                  <div class="col-md-12">
                    @if ($message = Session::get('success'))
                      <div class="alert alert-success alert-block" role="alert">
                        <button type="button" class="close" data-dismiss="alert">×</button>	
                            <strong>{{ $message }}</strong>
                      </div>
                    @endif
                  </div>
              </div>
            <div class="row">  
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Add New Menu</h3>
                        </div>
                        <div class="card-body">
                          <?php 
                            $id = !empty($menu) ? $menu->id : '';
                            $method = !empty($menu) ? 'PUT' : 'POST';
                          ?>
                          <form action="{{ url("menu/$id") }}" method="post">
                          <input type="hidden" name="_method" value="{{$method}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="row">
                                  <div class="col-sm-12">
                                    <div class="form-group">
                                      <label>Memu  Name</label>
                                      <input type="text" name="menu_name" required class="form-control" placeholder="Enter Group Name" value="{{ !empty($menu) ? $menu->menu_name : '' }}">
                                    </div>
                                  </div>
                                </div>
                               
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                        <label>Serial Order</label>
                                        <input type="text" name="sl_order" required class="form-control" placeholder="Enter Serial Order" value="{{ !empty($menu) ? $menu->sl_order : '' }}">
                                        </div>
                                    </div>
                                </div>

                        </div>

                    <div class="card-footer">
                        <button type="submit" name="submit" value="submit" class="btn btn-primary">{{ !empty($menu) ? 'Update' : 'Save' }}</button>
                        <a href="{{ URL::to("menu") }}"  class="btn btn-danger">Cancel</a>
                    </div>
                    </form>
                    </div>
                    
                </div>
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Group Menu List</h3>
                        </div>
                        <div class="card-body">
                                <table class="table table-bordered" id="example1">
                                    <thead>                  
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Group Menu Name</th>
                                        <th>Menu Name</th>
                                        <th>Menu Action</th>
                                        <th>Sl Order</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @if (!empty($menus))
                                            @php($i=1)
                                            @foreach ($menus as $menu)
                                                {{$menu}}
                                                <tr>
                                                    <td>{{$i++}}</td>
                                                    <td>{{$menu->groupmenu->group_name}}</td>
                                                    <td>{{$menu->menu_name}}</td>
                                                    <td> {{$menu->menu_action}}</td>
                                                    <td> {{$menu->sl_order}}</td>
                                                    <td style="text-align:center"  title="Edit"> 
                                                        <a href="{{ URL::to("menu/$menu->id/edit") }}">
                                                            <i class="fas fa-edit" style="color:#007bff"></i>
                                                        </a>
                                                        ||
                                                        <a href="">
                                                            <i class="fas fa-trash" style="color:red"  title="Delete"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="4">No Data Found</td>
                                            </tr>
                                        @endif
                                       
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

                   