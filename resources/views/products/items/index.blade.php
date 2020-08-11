@extends('layouts.app', ['activePage' => 'Item-Management', 'titlePage' => __('Item List')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Item Management</h4>
            <p class="card-category"> Please add Item</p>
          </div>
          <div class="col-12 text-right">
            <a data-toggle = "modal" href = "" data-target = "#add_item" class="btn btn-sm btn-primary">Add item</a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    No
                  </th>
                  <!-- <th>
                    Image
                  </th> -->
                  <th>
                    SKU
                  </th>
                  <th>
                    Name 
                  </th>
                  <th>
                    Price
                  </th>
                  <th>
                    Description
                  </th>
                  <th>
                    size
                  </th>
                  <th>
                    color
                  </th>
                  <th>
                    pattern
                  </th>
                  <th>
                    style
                  </th>
                  <th>
                    Actions
                  </th>
                </thead>
                <tbody>
                  @foreach($items as $item)
                      <tr>
                        <td>{{$index++}}</td>
                        <!-- <td><img width="50" height="60" src="uploads/{{$item->file_name}}" alt=""></td> -->
                        <td>{{$item->sku}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->price}}</td>
                        <td>{{$item->description}}</td>
                        <td>{{$item->Size}}</td>
                        <td>{{$item->Color}}</td>
                        <td>{{$item->Pattern}}</td>
                        <td>{{$item->Style}}</td>
                        <td>
                          <form method="post" action="{{ route('items.destroy', $item->id) }}">
                          <a class="btn btn-info btn-fab btn-fab-mini btn-round">
                            <i class="material-icons" onclick = "item_edit({{$item}});" style="color:white">edit</i>
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
<div class="modal fade" id="add_item" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{ route('items.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
            <div class="w-50 mx-auto">
              <div class="input-group">
                <input name="sku" type="text" class="form-control" placeholder="Enter SKU" require>
              </div>
              <br>
              <div class="input-group">
                <input name="name" type="text" class="form-control" placeholder="Enter Name" require>
              </div>
              <br>
              <div class="input-group">
                <input name="price" type="text" class="form-control" placeholder="Enter Price" require>
              </div>
              <br>
              <div class="input-group">
                <textarea name="description" placeholder="Enter Description" rows="5" cols="50"></textarea>
              </div>
              <br>
              <!-- <div class="input-group">
                <input type="file" name="file">
              </div>
              <br> -->
              @foreach($attributes as $attribute)
                <div class="input-group">
                  <select name="{{$attribute->title}}" class="form-control">
                    <option >Choose the {{$attribute->title}}</option>
                    @foreach($allattributes as $attr)
                      @if($attr->parent_id == $attribute->id)
                      <option value='{{$attr->title}}'>{{$attr->title}}</option>
                      @endif
                    @endforeach
                  </select>
                </div>
                <br>
              @endforeach
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
<div class="modal fade" id="edit_item" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="{{ route('items.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
            <div class="w-50 mx-auto">
              <input name="id" id="item_id" type="hidden">

              <div class="form-row">
                <div class="col-md-12">
                  <div class="md-form form-group">
                    <input name="sku" id="sku" type="text" class="form-control" placeholder="Enter SKU" require>
                    <label >SKU</label>
                  </div>
                </div>
              </div>
              <br>
              <div class="form-row">
                <div class="col-md-12">
                  <div class="md-form form-group">
                    <input name="name" id="name" type="text" class="form-control" placeholder="Enter Name" require>
                    <label >Name</label>
                  </div>
                </div>
              </div>
              <br>
              <div class="form-row">
                <div class="col-md-12">
                  <div class="md-form form-group">
                    <input name="price" id="price" type="text" class="form-control" placeholder="Enter Price" require>
                    <label >Price</label>
                  </div>
                </div>
              </div>
              <br>
              <div class="form-row">
                <div class="col-md-12">
                  <div class="md-form form-group">
                    <label>description</label>
                    <textarea name="description" id="description" placeholder="Enter Description" rows="5" cols="27"></textarea>
                  </div>
                </div>
              </div>
              <br>
              <!-- <div class="form-row">
                <input name="file" id="price" type="file">
              </div>
              <br> -->
              @foreach($attributes as $attribute)
                <div class="input-group">
                  <select name="{{$attribute->title}}" id="{{$attribute->title}}" class="form-control">
                    <option >Choose the {{$attribute->title}}</option>
                    @foreach($allattributes as $attr)
                      @if($attr->parent_id == $attribute->id)
                      <option value='{{$attr->title}}'>{{$attr->title}}</option>
                      @endif
                    @endforeach
                  </select>
                </div>
                <br>
              @endforeach
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