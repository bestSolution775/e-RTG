

<?php $__env->startSection('content'); ?>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Manage Category</h4>
              <p class="card-category"> Add the Category</p>
            </div>
            <div class="container">     
              <div class="panel panel-primary">
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-md-6">
                        <h3>Category List</h3>
                          <ul id="tree1" class="mb-1 pl-3 pb-2" style="position: relative;left: -19px;">
                              <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <li style="cursor:pointer;">
                                      <?php if(count($category->childs)): ?>
                                       <i class="material-icons" data-id = "0" style="position:absolute;top:2px;left:-5px;">arrow_right</i>
                                      <?php endif; ?>
                                      <i class="material-icons category_edit" onclick = "category_edit(<?php echo e($category); ?>);">edit</i>
                                        <i class="material-icons category_delete" onclick="confirm('<?php echo e(__('Are you sure you want to delete?')); ?>') ? remove_category(<?php echo e($category->id); ?>) : ''">delete</i>
                                      <?php echo e($category->title); ?>

                                      <?php if(count($category->childs)): ?>
                                          <?php echo $__env->make('products.categories.manageChild',['childs' => $category->childs], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                      <?php endif; ?>
                                      <!-- <a rel="tooltip" class="btn btn-success btn-link" data-original-title="" title="">
                                        <i class="material-icons">edit</i>
                                      </a> -->
                                  </li>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </ul>
                      </div>
                      <div class="col-md-6">
                        <h3>Add New Category</h3>


                          <?php echo Form::open(['route'=>'categories.store']); ?>



                          <?php if($message = Session::get('success')): ?>
                          <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>	
                                  <strong><?php echo e($message); ?></strong>
                          </div>
                          <?php endif; ?>

                          <?php if($message = Session::get('Failed')): ?>
                          <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>	
                                  <strong><?php echo e($message); ?></strong>
                          </div>
                          <?php endif; ?>

                          <div class="form-group <?php echo e($errors->has('title') ? 'has-error' : ''); ?>">
                            <?php echo Form::label('Title:'); ?>

                            <?php echo Form::text('title', old('title'), ['class'=>'form-control', 'placeholder'=>'Enter Title']); ?>

                            <span class="text-danger"><?php echo e($errors->first('title')); ?></span>
                          </div>


                          <div class="form-group <?php echo e($errors->has('parent_id') ? 'has-error' : ''); ?>">
                            <?php echo Form::label('Category:'); ?>

                            <?php echo Form::select('parent_id',$allCategories, old('parent_id'), ['class'=>'form-control', 'placeholder'=>'Select Category']); ?>

                            <span class="text-danger"><?php echo e($errors->first('parent_id')); ?></span>
                          </div>


                          <div class="form-group">
                            <button class="btn btn-success">Add New</button>
                          </div>


                          <?php echo Form::close(); ?>



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

<div class="modal fade" id="adit_category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?php echo e(route('categories.store')); ?>">
        <?php echo csrf_field(); ?>
        <div class="modal-body">
          <div class="mx-auto w-50">
            <div class="form-row">
              <div class="col-md-6">
                <div class="md-form form-group">
                  <input type="hidden" name = "id" id = "category_id">
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', ['activePage' => 'Category-Management', 'titlePage' => __('Category List')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\working_folder\E-RTG Project\resources\views//products/categories/index.blade.php ENDPATH**/ ?>