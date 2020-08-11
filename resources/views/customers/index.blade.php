@extends('layouts.app', ['activePage' => 'Customer-Management', 'titlePage' => __('Customer List')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Customer Management</h4>
            <p class="card-category"> Please add customer</p>
          </div>
          <div class="col-12">
            <form method="post" action="{{ route('customers.search') }}">
                @csrf
              <input type="text" name="search" class="col-md-2" placeholder="Search...">
              <button type="submit" class="btn btn-white btn-round btn-just-icon btn-success">
                <i class="material-icons">search</i>
                <div class="ripple-container"></div>
              </button>
              <a data-toggle = "modal"  style="float:right;color:white" data-target = "#add_customer" class="btn btn-sm btn-primary">Add customer</a>
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
                    Distributor ID
                  </th>
                  <th>
                    Country ID
                  </th>
                  <th>
                    Tag
                  </th>
                  <!-- <th>
                  Ftp Host
                  </th>
                  <th>
                  Ftp Username
                  </th>
                  <th>
                  Ftp Password
                  </th> -->
                  <th>
                  DB Host
                  </th>
                  <th>
                  DB User
                  </th>
                  <th>
                  DB Password
                  </th>
                  <th>
                  DB Name
                  </th>
                  <th>
                    Actions
                  </th>
                </thead>
                <tbody>
                  @foreach($customers as $customer)
                    <tr>
                      <td>{{$index++}}</td>
                      <td>{{$customer->customer_company}}</td>
                      <td>{{$customer->address_line1}}</td>
                      <td>{{$customer->address_line2}}</td>
                      <td>{{$customer->state}}</td>
                      <td>{{$customer->postcode}}</td>
                      <td>{{$customer->country->country_title}}</td>
                      <td class="text-primary">{{$customer->distributor_id}}</td>
                      <td class="text-primary">{{$customer->country_id}}</td>
                      <td>{{$customer->tag}}</td>
                      <!-- <td>{{$customer->ftphost}}</td>
                      <td>{{$customer->ftpusername}}</td>
                      <td>{{$customer->ftppassword}}</td> -->
                      <td>{{$customer->dbhost}}</td>
                      <td>{{$customer->dbuser}}</td>
                      <td>{{$customer->dbpassword}}</td>
                      <td>{{$customer->dbname}}</td>
                      <td>
                        <form method="post" action="{{ route('customers.destroy', $customer->id) }}">
                        <a class="btn btn-info btn-fab btn-fab-mini btn-round">
                          <i class="material-icons" onclick = "customer_edit({{$customer}});" style="color:white">edit</i>
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
<div class="modal fade" id="add_customer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Customer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="{{ route('customers.store') }}">
        @csrf
        <div class="modal-body">
            <div class="mx-auto">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="md-form form-group">
                    <input name="customer_company" type="text" class="form-control" placeholder="Input customer company" require>
                    <label>Company</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="md-form form-group">
                    <input name="address_line1" type="text" class="form-control" placeholder="Input Address line 1" require>
                    <label >Address line1</label>
                  </div>
                </div>
              </div>
              <br>
              <div class="form-row">
                <div class="col-md-6">
                  <div class="md-form form-group">
                    <input name="address_line2" type="text" class="form-control" placeholder="Input Address line 2" require>
                    <label >Address line2</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="md-form form-group">
                    <input name="state" type="text" class="form-control" placeholder="Input State" require>
                    <label>State</label>
                  </div>
                </div>
              </div>  
              <br>
              <div class="form-row">
                <div class="col-md-6">
                  <div class="md-form form-group">
                    <input name="postcode" type="number" class="form-control" placeholder="Input Postcode" require>
                    <label>Postcode</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="md-form form-group">
                    <input name="tag" type="text" class="form-control" placeholder="Input Input tag" require>
                    <label>Input tag</label>
                  </div>
                </div>
                <!-- <div class="col-md-6">
                  <div class="md-form form-group">
                    <input name="ftphost" type="text" class="form-control" placeholder="Input Ftp Host" require>
                    <label>Ftp Host</label>
                  </div>
                </div> -->
              </div>
              <br>
              <!-- <div class="form-row">
                <div class="col-md-6">
                  <div class="md-form form-group">
                    <input name="ftpusername" type="text" class="form-control" placeholder="Input Ftp Username" require>
                    <label>Ftp Username</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="md-form form-group">
                    <input name="ftppassword" type="text" class="form-control" placeholder="Input Ftp Pasword" require>
                    <label>Ftp Pasword</label>
                  </div>
                </div>
              </div>
              <br> -->
              <div class="form-row">
                <div class="col-md-6">
                  <div class="md-form form-group">
                    <input name="dbhost" type="text" class="form-control" placeholder="Input Database Host" require>
                    <label>Database Host</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="md-form form-group">
                    <input name="dbuser" type="text" class="form-control" placeholder="Input Database User" require>
                    <label>Database User</label>
                  </div>
                </div>
              </div>
              <br>
              <div class="form-row">
                <div class="col-md-6">
                  <div class="md-form form-group">
                    <input name="dbpassword" type="text" class="form-control" placeholder="Input Database Password" require>
                    <label>Database Password</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="md-form form-group">
                    <input name="dbname" type="text" class="form-control" placeholder="Input Database Name" require>
                    <label>Database Name</label>
                  </div>
                </div>
              </div>
              <br>
              <div class="form-row">
                <div class="col-md-6">
                  <div class="md-form form-group">
                    <select name="distributor_id" class="form-control">
                      <option >Choose the Distributor</option>
                      @foreach($distributors as $distributor)
                        <option value="{{$distributor->id}}">{{$distributor->distributor_company}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="md-form form-group">
                    <select name="country_id" class="form-control">
                      <option >Choose the country</option>
                      @foreach($countries as $country)
                        <option value="{{$country->id}}">{{$country->country_title}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
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
<div class="modal fade" id="edit_customer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Customer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="{{ route('customers.store') }}">
        @csrf
        <div class="modal-body">
            <div class="mx-auto">
              <input name="id" id="customer_id" type="hidden">
              
              <div class="form-row">
                <div class="col-md-6">
                  <div class="md-form form-group">
                    <input id="customer_company" name="customer_company" type="text" class="form-control" placeholder="Input customer company" require>
                    <label>Company</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="md-form form-group">
                    <input id="address_line1" name="address_line1" type="text" class="form-control" placeholder="Input Address line 1" require>
                    <label >Address line1</label>
                  </div>
                </div>
              </div>
              <br>
              <div class="form-row">
                <div class="col-md-6">
                  <div class="md-form form-group">
                    <input id="address_line2" name="address_line2" type="text" class="form-control" placeholder="Input Address line 2" require>
                    <label >Address line2</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="md-form form-group">
                    <input id="state" name="state" type="text" class="form-control" placeholder="Input State" require>
                    <label>State</label>
                  </div>
                </div>
              </div>  
              <br>
              <div class="form-row">
                <div class="col-md-6">
                  <div class="md-form form-group">
                    <input id="postcode" name="postcode" type="number" class="form-control" placeholder="Input Postcode" require>
                    <label>Postcode</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="md-form form-group">
                    <input id="tag" name="tag" type="text" class="form-control" placeholder="Input Input tag" require>
                    <label>Input tag</label>
                  </div>
                </div>
                <!-- <div class="col-md-6">
                  <div class="md-form form-group">
                    <input id="ftphost" name="ftphost" type="text" class="form-control" placeholder="Input Ftp Host" require>
                    <label>Ftp Host</label>
                  </div>
                </div> -->
              </div>
              <br>
              <!-- <div class="form-row">
                <div class="col-md-6">
                  <div class="md-form form-group">
                    <input id="ftpusername" name="ftpusername" type="text" class="form-control" placeholder="Input Ftp Username" require>
                    <label>Ftp Username</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="md-form form-group">
                    <input id="ftppassword" name="ftppassword" type="text" class="form-control" placeholder="Input Ftp Pasword" require>
                    <label>Ftp Pasword</label>
                  </div>
                </div>
              </div>
              <br> -->
              <div class="form-row">
                <div class="col-md-6">
                  <div class="md-form form-group">
                    <input id="dbhost" name="dbhost" type="text" class="form-control" placeholder="Input Database Host" require>
                    <label>Database Host</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="md-form form-group">
                    <input id="dbuser" name="dbuser" type="text" class="form-control" placeholder="Input Database User" require>
                    <label>Database User</label>
                  </div>
                </div>
              </div>
              <br>
              <div class="form-row">
                <div class="col-md-6">
                  <div class="md-form form-group">
                    <input id="dbpassword" name="dbpassword" type="text" class="form-control" placeholder="Input Database Password" require>
                    <label>Database Password</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="md-form form-group">
                    <input id="dbname" name="dbname" type="text" class="form-control" placeholder="Input Database Name" require>
                    <label>Database Name</label>
                  </div>
                </div>
              </div>
              <br>
              <div class="form-row">
                <div class="col-md-6">
                  <div class="md-form form-group">
                    <select id="distributor_id" name="distributor_id" class="form-control">
                      <option >Choose the Distributor</option>
                      @foreach($distributors as $distributor)
                        <option value="{{$distributor->id}}">{{$distributor->distributor_company}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="md-form form-group">
                    <select id="country_id" name="country_id" class="form-control">
                      <option >Choose the country</option>
                      @foreach($countries as $country)
                        <option value="{{$country->id}}">{{$country->country_title}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
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