@extends('layouts.app', ['activePage' => 'PushToRetailer-Management', 'titlePage' => __('Category List')])


@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Push To Retailer</h4>
              <p class="card-category"> Push the product</p>
            </div>
            <div class="container">     
              <div class="panel panel-primary">
                  <div class="panel-body">
                      <div class="col-12" style="margin-top:3%;">
                        <form method="post" action="{{ route('pushtoretailers.search') }}">
                            @csrf
                            <div class="row">
                              <input type="text" name="product_search" class="col-md-5" placeholder="Search Product...">
                              <input type="text" name="customer_search" class="col-md-5" placeholder="Search Customer...">
                              <div class="col-md-2">
                                <button type="submit" class="btn btn-round btn-just-icon btn-success">
                                  <i class="material-icons">search</i>
                                  <div class="ripple-container"></div>
                                </button>
                              </div>
                            </div>
                        </form>
                      </div>
                    <div class="row">
                      <div class="col-md-6">
                        <h3>Product List</h3>
                          <i class="material-icons foward_icon">arrow_forward</i>
                          <ul id="product" class="mb-1 pl-3 pb-2 list-group" style="position: relative;left: -37px;">
                              @foreach($products as $product)
                                  <li class="list-group-item" style="cursor:pointer;">
                                      <div class="form-check product_style">
                                        {!! Form::checkbox('remember', $product->id, null, ['id'=>'remember', 'class' => 'checkbox']) !!}
                                        <label class="form-check-label product_item" for="materialUnchecked">{{ $product->name }}</label>
                                      </div>
                                      
                                  </li>
                              @endforeach
                          </ul>
                      </div>
                      <div class="col-md-6">
                        <h3>Customer List</h3>
                          <ul id="customer" class="mb-1 pl-3 pb-2 list-group" style="position: relative;left: -37px;">
                              @foreach($customers as $customer)
                                  <li class="list-group-item" style="cursor:pointer;">
                                      <div class="form-check product_style">
                                        {!! Form::checkbox('remember', $customer->id, null, ['id'=>'remember', 'class' => 'checkbox']) !!}
                                        <label class="form-check-label product_item" for="materialUnchecked">{{ $customer->customer_company }}</label>
                                      </div>
                                  </li>
                              @endforeach
                          </ul>
                      </div>
                    </div> 
                  </div>
                  <div class="card-footer ml-auto mr-auto">
                    <button type="submit" class="btn btn-success" style="position:relative;left:25%;" onclick="pushtoretailer();">Push To Reatiler<div class="ripple-container"></div></button>
                  </div>
                </div>
              </div>
            </div>

          </div>
      </div>
    </div>
  </div>
</div>
@endsection