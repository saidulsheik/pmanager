@extends('layouts.admin')

@section('content')
    <section class="content">

          <div class="modal fade" id="modal-lg">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Add New Project</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                @php($id = !empty($project) ? $project->id : '')
                @php($method = !empty($project) ? 'PUT' : 'POST')
                <form action="{{ url("project/$id") }}" method="post">
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <input type="hidden" name="_method" value="{{$method}}">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="row">
                                  <div class="col-sm-12">
                                    <!-- select option -->
                                    <div class="form-group">
                                      <label>Project Type</label>
                                      <select name="company_id" id="company_id" class="form-control select2">
                                        <option value="">Select Project Type</option>
                                        @foreach ($types as $type)
                                          <option {{ !$type_id=!empty($project)  ? $project->type_id : '' }} {{ ($type_id==$type->id)  ? 'selected' : '' }} value="{{$type->id}}">{{$type->name}}</option>
                                        @endforeach
                                      </select>
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                      <!-- select option -->
                                      <div class="form-group">
                                        <label>Project Status</label>
                                        <select name="company_id" id="company_id" class="form-control select2">
                                          <option value="">Select Project Status</option>
                                          @foreach ($statuses as $status)
                                            <option {{ !$statuses_id=!empty($project)  ? $project->statuses_id : '' }} {{ ($statuses_id==$status->id)  ? 'selected' : '' }} value="{{$status->id}}">{{$status->name}}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                    </div>
                                  </div>

                                <div class="row">
                                  <div class="col-sm-12">
                                    <!-- text input -->
                                    <div class="form-group">
                                      <label>Project Name</label>
                                      <input type="text" name="name" required class="form-control" placeholder="Enter Project Name" value="{{ !empty($project) ? $project->name : '' }}">
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-sm-12">
                                    <!-- textarea -->
                                    <div class="form-group">
                                      <label>Project Description</label>
                                    <textarea class="textarea" name="description" placeholder="Enter Project Description"
                                      style="width: 100%; height: 200px; font-size: 14px; line-height: 25px; border: 1px solid #dddddd; padding: px;">
                                      {{ !empty($project) ? $project->description : '' }}
                                    </textarea>

                                      {{-- <textarea class="form-control" rows="3" required name="description" placeholder="Enter Project Description">{{ !empty($project) ? $project->description : '' }}</textarea> --}}
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col-sm-12">
                                    <!-- select option -->
                                    <div class="form-group">
                                      <label>Department</label>
                                      <select name="company_id" id="company_id" class="form-control select2">
                                        <option value="">Select Department Name</option>
                                        @foreach ($companies as $company)
                                          <option {{ !$company_id=!empty($project)  ? $project->company_id : '' }} {{ ($company_id==$company->id)  ? 'selected' : '' }} value="{{$company->id}}">{{$company->name}}</option>
                                        @endforeach
                                      </select>
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                      <!-- text input -->
                                      <div class="form-group">
                                        <label>Start Date</label>
                                        <input type="date" name="start_date" required class="form-control" placeholder="Select start date" value="{{ !empty($project) ? $project->start_date : '' }}">
                                      </div>
                                    </div>
                                </div>
                                <div class="row">
                                  <div class="col-sm-12">
                                    <!-- text input -->
                                    <div class="form-group">
                                      <label>End Date</label>
                                      <input type="date" name="end_date" required class="form-control" placeholder="Select end date" value="{{ !empty($project) ? $project->end_date : '' }}">
                                    </div>
                                  </div>
                              </div>
                        </div>

                    {{-- <div class="card-footer">
                        <button type="submit" name="submit" value="submit" class="btn btn-primary">Save</button>
                        <a href="{{ URL::to("project") }}"  class="btn btn-danger">Cancel</a>
                    </div> --}}
                  </div>
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" name="submit" value="submit" class="btn btn-primary">Save</button>
                </div>
                  </form>
              </div>
            </div>
          </div>


            <section class="content-header">
                    <div class="container-fluid">
                      <div class="row mb-2">
                        <div class="col-sm-6">
                          <h1>Project</h1>
                        </div>
                        <div class="col-sm-6">
                          <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Project</li>
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
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Project Lists</h3>
                            <button type="button" class="btn btn-primary float-sm-right" data-toggle="modal" data-target="#modal-lg">
                                Add
                              </button>
                        </div>
                        <div class="card-body">
                                <table class="table table-bordered" id="example1">
                                    <thead>                  
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Project Name</th>
                                        <th>Description</th>
                                        <th>Department Name</th>
                                        <th>Created By</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Progress</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @if (!empty($projects))
                                        @php($i=1)
                                        @foreach ($projects as $project)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td><a href="{{ URL::to("project/$project->id") }}">{{$project->name}}</a></td>
                                                <td> {{$project->description}}</td>
                                                <td>{{$project->company->name}}</td>
                                                <td>{{$project->user->name}}</td>
                                                <td>{{$project->start_date}}</td>
                                                <td>{{$project->end_date}}</td>
                                                <td>{{$project->progress}}</td>
                                                <td style="text-align:center"  title="Edit"> 
                                                  <a href="{{ URL::to("project/$project->id/edit") }}"> <i class="fas fa-edit" style="color:#007bff"></i></a>
                                                  ||
                                                  <i class="fas fa-trash" style="color:red"  title="Delete"></i>
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

                   