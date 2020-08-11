@extends('layouts.app', ['activePage' => 'Attribute-Management', 'titlePage' => __('Category List')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Manage Attribute</h4>
              <p class="card-category"> Add the Attribute</p>
            </div>
            <div class="container">     
              <div class="panel panel-primary">
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-md-6">
                        <h3>Attribute List</h3>
                          <ul id="tree1" class="mb-1 pl-3 pb-2" style="position: relative;left: -19px;">
                              @foreach($attributes as $attribute)
                                  <li style="cursor:pointer;">
                                      @if(count($attribute->childs))
                                       <i class="material-icons" data-id = "0" style="position:absolute;top:2px;left:-5px;">arrow_right</i>
                                      @endif
                                      <i class="material-icons category_edit" onclick = "attribute_edit({{$attribute}});">edit</i>
                                        <i class="material-icons category_delete" onclick="confirm('{{ __('Are you sure you want to delete?') }}') ? remove_attribute({{$attribute->id}}) : ''">delete</i>
                                      {{ $attribute->title }}
                                      @if(count($attribute->childs))
                                          @include('products.attributes.manageChild',['childs' => $attribute->childs])
                                      @endif
                                      <!-- <a rel="tooltip" class="btn btn-success btn-link" data-original-title="" title="">
                                        <i class="material-icons">edit</i>
                                      </a> -->
                                  </li>
                              @endforeach
                          </ul>
                      </div>
                      <div class="col-md-6">
                        <h3>Add New Attribute</h3>


                          {!! Form::open(['route'=>'attributes.store']) !!}


                          @if ($message = Session::get('success'))
                          <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>	
                                  <strong>{{ $message }}</strong>
                          </div>
                          @endif
                          
                          @if ($message = Session::get('Failed'))
                          <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>	
                                  <strong>{{ $message }}</strong>
                          </div>
                          @endif

                          <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                          {!! Form::label('Title:') !!}
                          {!! Form::text('title', old('title'), ['class'=>'form-control', 'placeholder'=>'Enter Title']) !!}
                          <span class="text-danger">{{ $errors->first('title') }}</span>
                          </div>


                          <div class="form-group {{ $errors->has('parent_id') ? 'has-error' : '' }}">
                            {!! Form::label('Attribute:') !!}
                            {!! Form::select('parent_id',$allAttributes, old('parent_id'), ['class'=>'form-control', 'placeholder'=>'Select Attribute']) !!}
                            <span class="text-danger">{{ $errors->first('parent_id') }}</span>
                          </div>


                          <div class="form-group">
                            <button class="btn btn-success">Add New</button>
                          </div>


                          {!! Form::close() !!}


                      </div>
                    </div> 
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="adit_attribute" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Attribute</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="{{ route('attributes.store') }}">
        @csrf
        <div class="modal-body">
          <div class="mx-auto w-50">
            <div class="form-row">
              <div class="col-md-6">
                <div class="md-form form-group">
                  <input type="hidden" name = "id" id = "attribute_id">
                  <input name="title" id='title' type="text" class="form-control" placeholder="Enter title" require>
                  <label>title</label>
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