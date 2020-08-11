

<?php $__env->startSection('content'); ?>
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
                  <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <td><?php echo e($index++); ?></td>
                        <td><?php echo e($item->sku); ?></td>
                        <td><?php echo e($item->name); ?></td>
                        <td><?php echo e($item->price); ?></td>
                        <td><?php echo e($item->description); ?></td>
                        <td><?php echo e($item->Size); ?></td>
                        <td><?php echo e($item->Color); ?></td>
                        <td><?php echo e($item->Pattern); ?></td>
                        <td><?php echo e($item->Style); ?></td>
                        <td>
                          <form method="post" action="<?php echo e(route('items.destroy', $item->id)); ?>">
                          <a class="btn btn-info btn-fab btn-fab-mini btn-round">
                            <i class="material-icons" onclick = "item_edit(<?php echo e($item); ?>);" style="color:white">edit</i>
                          </a> 
                          <?php echo csrf_field(); ?>
                          <?php echo method_field('DELETE'); ?>
                          <a class="btn btn-danger btn-fab btn-fab-mini btn-round"  onclick="confirm('<?php echo e(__('Are you sure you want to delete?')); ?>') ? this.parentElement.submit() : ''" style="color:white">
                            <i class="material-icons">delete</i>
                          </a>
                          </form> 
                        </td>
                      </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
      <form method="post" action="<?php echo e(route('items.store')); ?>">
        <?php echo csrf_field(); ?>
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
              <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="input-group">
                  <select name="<?php echo e($attribute->title); ?>" class="form-control">
                    <option >Choose the <?php echo e($attribute->title); ?></option>
                    <?php $__currentLoopData = $allattributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php if($attr->parent_id == $attribute->id): ?>
                      <option value='<?php echo e($attr->title); ?>'><?php echo e($attr->title); ?></option>
                      <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>
                <br>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
      <form method="post" action="<?php echo e(route('items.store')); ?>">
        <?php echo csrf_field(); ?>
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
              <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="input-group">
                  <select name="<?php echo e($attribute->title); ?>" id="<?php echo e($attribute->title); ?>" class="form-control">
                    <option >Choose the <?php echo e($attribute->title); ?></option>
                    <?php $__currentLoopData = $allattributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php if($attr->parent_id == $attribute->id): ?>
                      <option value='<?php echo e($attr->title); ?>'><?php echo e($attr->title); ?></option>
                      <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>
                <br>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', ['activePage' => 'Item-Management', 'titlePage' => __('Item List')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\working_folder\crt_project\resources\views//products/items/index.blade.php ENDPATH**/ ?>