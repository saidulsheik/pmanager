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
                            <li class="breadcrumb-item active">Group Menu</li>
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
                            <h3 class="card-title">Add Group Menu</h3>
                        </div>
                        <div class="card-body">
                          <?php 
                            $id = !empty($groupmenu) ? $groupmenu->id : '';
                            $method = !empty($groupmenu) ? 'PUT' : 'POST';
                          ?>
                          <form action="{{ url("groupmenu/$id") }}" method="post">
                          <input type="hidden" name="_method" value="{{$method}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="row">
                                  <div class="col-sm-12">
                                    <div class="form-group">
                                      <label>Memu Group Name</label>
                                      <input type="text" name="group_name" required class="form-control" placeholder="Enter Group Name" value="{{ !empty($groupmenu) ? $groupmenu->group_name : '' }}">
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                        <label>Menu Icon</label>
                                        <input type="text" name="group_icon" required class="form-control" placeholder="Enter Menu Icon" value="{{ !empty($groupmenu) ? $groupmenu->group_icon : '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Has Sub-Menu?</label>
                                            <select name="menu_icon" id="menu_icon" class="form-control">
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                        <label>Serial Order</label>
                                        <input type="text" name="sl_order" required class="form-control" placeholder="Enter Serial Order" value="{{ !empty($groupmenu) ? $groupmenu->sl_order : '' }}">
                                        </div>
                                    </div>
                                </div>

                        </div>

                    <div class="card-footer">
                        <button type="submit" name="submit" value="submit" class="btn btn-primary">{{ !empty($groupmenu) ? 'Update' : 'Save' }}</button>
                        <a href="{{ URL::to("groupmenu") }}"  class="btn btn-danger">Cancel</a>
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
                                        <th>Name</th>
                                        <th>Menu Icon</th>
                                        <th>Has Sub Menu?</th>
                                        <th>Sl Order</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @if (!empty($groupmenus))
                                            @php($i=1)
                                            @foreach ($groupmenus as $groupmenu)
                                                <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{$groupmenu->group_name}}</td>
                                                <td> {{$groupmenu->group_icon}}</td>
                                                <td>{{$groupmenu->is_sub_menu==1? 'Yes' : 'No'}}</td>
                                                <td> {{$groupmenu->sl_order}}</td>
                                                <td style="text-align:center"  title="Edit"> 
                                                    <a href="{{ URL::to("groupmenu/$groupmenu->id/edit") }}">
                                                        <i class="fas fa-edit" style="color:#007bff"></i>
                                                    </a>
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

                   