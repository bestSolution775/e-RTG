@extends('layouts.app', ['activePage' => 'Distributor-Management', 'titlePage' => __('Distributor List')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Distributor Management</h4>
            <p class="card-category"> Please add distributor</p>
          </div>
          @if (session('status'))
            <div class="row" style="margin-top:20px;">
              <div class="col-sm-3 w-50 mx-auto">
                <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="material-icons">close</i>
                  </button>
                  <span>{{ session('status') }}</span>
                </div>
              </div>
            </div>
          @endif
          @if (session('failed'))
            <div class="row" style="margin-top:20px;">
              <div class="col-sm-3 w-50 mx-auto">
                <div class="alert alert-danger">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="material-icons">close</i>
                  </button>
                  <span>{{ session('failed') }}</span>
                </div>
              </div>
            </div>
          @endif
          <div class="col-12">
          
            <form method="post" action="{{ route('distributors.search') }}">
                @csrf
              <input type="text" name="search" class="col-md-2" placeholder="Search...">
              <button type="submit" class="btn btn-white btn-round btn-just-icon btn-success">
                <i class="material-icons">search</i>
                <div class="ripple-container"></div>
              </button>
              <a data-toggle = "modal" style="float:right;color:white" data-target = "#add_distributor" class="btn btn-sm btn-primary">Add distributor</a>
            </form>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    No
                  </th>
                  <th>
                    Company
                  </th>
                  <th>
                    Address line 1
                  </th>
                  <th>
                    Address line 2
                  </th>
                  <th>
                    State
                  </th>
                  <th>
                    Postcode
                  </th>
                  <th>
                    Country
                  </th>
                  <th>
                    Country ID
                  </th>
                  <th>
                    Actions
                  </th>
                </thead>
                <tbody>
                  @foreach($distributors as $distributor)
                      <tr>
                        <td>{{$index++}}</td>
                        <td>{{$distributor->distributor_company}}</td>
                        <td>{{$distributor->address_line1}}</td>
                        <td>{{$distributor->address_line2}}</td>
                        <td>{{$distributor->state}}</td>
                        <td>{{$distributor->postcode}}</td>
                        <td>{{$distributor->country->country_title}}</td>
                        <td class="text-primary">{{$distributor->country_id}}</td>
                        <td>
                          <form method="post" action="{{ route('distributors.destroy', $distributor->id) }}">
                          <a class="btn btn-info btn-fab btn-fab-mini btn-round">
                            <i class="material-icons" onclick = "distributor_edit({{$distributor}});" style="color:white">edit</i>
                          </a> 
                          @csrf
                          @method('DELETE')
                          <a class="btn btn-danger btn-fab btn-fab-mini btn-round"  onclick="confirm('{{ __('Are you sure you want to delete?') }}') ? this.parentElement.submit() : ''" style="color:white">
                            <i class="material-icons">delete</i>
                          </a>
                          </form> 
                        </td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="add_distributor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Distributor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="{{ route('distributors.store') }}">
        @csrf
        <div class="modal-body">
            <div class="w-50 mx-auto">
              <div class="input-group">
                <input name="distributor_company" type="text" class="form-control" placeholder="Input distributor company" require>
              </div>
              <br>
              <div class="input-group">
                <input name="address_line1" type="text" class="form-control" placeholder="Input Address line 1" require>
              </div>
              <br>
              <div class="input-group">
                <input name="address_line2" type="text" class="form-control" placeholder="Input Address line 2" require>
              </div>
              <br>
              <div class="input-group">
                <input name="state" type="text" class="form-control" placeholder="Input State" require>
              </div>
              <br>
              <div class="input-group">
                <input name="postcode" type="number" class="form-control" placeholder="Input Postcode" require>
              </div>
              <br>
              <div class="input-group">
                <select name="country_id" class="form-control">
                  <option >Choose the country</option>
                  @foreach($countries as $country)
                    <option value="{{$country->id}}">{{$country->country_title}}</option>
                  @endforeach
                </select>
              </div>
            </div>
          
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- update Modal -->
<div class="modal fade" id="edit_distributor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Distributor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="{{ route('distributors.store') }}">
        @csrf
        <div class="modal-body">
            <div class="w-50 mx-auto">
              <input name="id" id="distributor_id" type="hidden">
              <div class="input-group">
                <input name="distributor_company" id="distributor_company" type="text" class="form-control" placeholder="Input distributor company" require>
              </div>
              <br>
              <div class="input-group">
                <input name="address_line1" id="address_line1" type="text" class="form-control" placeholder="Input Address line 1" require>
              </div>
              <br>
              <div class="input-group">
                <input name="address_line2" id="address_line2" type="text" class="form-control" placeholder="Input Address line 2" require>
              </div>
              <br>
              <div class="input-group">
                <input name="state" id="state" type="text" class="form-control" placeholder="Input State" require>
              </div>
              <br>
              <div class="input-group">
                <input name="postcode" id="postcode" type="number" class="form-control" placeholder="Input Postcode" require>
              </div>
              <br>
              <div class="input-group">
                <select name="country_id" id="country_id" class="form-control">
                  <option >Choose the country</option>
                  @foreach($countries as $country)
                    <option value="{{$country->id}}">{{$country->country_title}}</option>
                  @endforeach
                </select>
              </div>
            </div>
          
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection