

<?php $__env->startSection('content'); ?>
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Customer Management</h4>
            <p class="card-category"> Please add customer</p>
          </div>
          <div class="col-12 text-right">
            <a data-toggle = "modal" href = "" data-target = "#add_customer" class="btn btn-sm btn-primary">Add customer</a>
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
                  <th>
                  Ftp Host
                  </th>
                  <th>
                  Ftp Username
                  </th>
                  <th>
                  Ftp Password
                  </th>
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
                    Actions
                  </th>
                </thead>
                <tbody>
                  <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><?php echo e($index++); ?></td>
                      <td><?php echo e($customer->customer_company); ?></td>
                      <td><?php echo e($customer->address_line1); ?></td>
                      <td><?php echo e($customer->address_line2); ?></td>
                      <td><?php echo e($customer->state); ?></td>
                      <td><?php echo e($customer->postcode); ?></td>
                      <td><?php echo e($customer->country->country_title); ?></td>
                      <td class="text-primary"><?php echo e($customer->distributor_id); ?></td>
                      <td class="text-primary"><?php echo e($customer->country_id); ?></td>
                      <td><?php echo e($customer->tag); ?></td>
                      <td><?php echo e($customer->ftphost); ?></td>
                      <td><?php echo e($customer->ftpusername); ?></td>
                      <td><?php echo e($customer->ftppassword); ?></td>
                      <td><?php echo e($customer->dbhost); ?></td>
                      <td><?php echo e($customer->dbuser); ?></td>
                      <td><?php echo e($customer->dbpassword); ?></td>
                      <td>
                        <form method="post" action="<?php echo e(route('customers.destroy', $customer->id)); ?>">
                        <a class="btn btn-info btn-fab btn-fab-mini btn-round">
                          <i class="material-icons" onclick = "customer_edit(<?php echo e($customer); ?>);" style="color:white">edit</i>
                        </a> 
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <a class="btn btn-danger btn-fab btn-fab-mini btn-round"  onclick="confirm('<?php echo e(__('Are you sure you want to delete this customer?')); ?>') ? this.parentElement.submit() : ''" style="color:white">
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
<div class="modal fade" id="add_customer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Customer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?php echo e(route('customers.store')); ?>">
        <?php echo csrf_field(); ?>
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
                    <input name="ftphost" type="text" class="form-control" placeholder="Input Ftp Host" require>
                    <label>Ftp Host</label>
                  </div>
                </div>
              </div>
              <br>
              <div class="form-row">
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
              <br>
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
                    <select name="distributor_id" class="form-control">
                      <option >Choose the Distributor</option>
                      <?php $__currentLoopData = $distributors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $distributor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($distributor->id); ?>"><?php echo e($distributor->distributor_company); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </div>
                </div>
              </div>
              <br>
              <div class="form-row">
                <div class="col-md-6">
                  <div class="md-form form-group">
                    <select name="country_id" class="form-control">
                      <option >Choose the country</option>
                      <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($country->id); ?>"><?php echo e($country->country_title); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="md-form form-group">
                    <input name="tag" type="text" class="form-control" placeholder="Input Input tag" require>
                    <label>Input tag</label>
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
        <h5 class="modal-title" id="exampleModalLabel">Update Country</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?php echo e(route('customers.store')); ?>">
        <?php echo csrf_field(); ?>
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
                <div class="col-md-6">
                  <div class="md-form form-group">
                    <input id="ftphost" name="ftphost" type="text" class="form-control" placeholder="Input Ftp Host" require>
                    <label>Ftp Host</label>
                  </div>
                </div>
              </div>
              <br>
              <div class="form-row">
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
              <br>
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
                    <select id="distributor_id" name="distributor_id" class="form-control">
                      <option >Choose the Distributor</option>
                      <?php $__currentLoopData = $distributors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $distributor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($distributor->id); ?>"><?php echo e($distributor->distributor_company); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </div>
                </div>
              </div>
              <br>
              <div class="form-row">
                <div class="col-md-6">
                  <div class="md-form form-group">
                    <select id="country_id" name="country_id" class="form-control">
                      <option >Choose the country</option>
                      <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($country->id); ?>"><?php echo e($country->country_title); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="md-form form-group">
                    <input id="tag" name="tag" type="text" class="form-control" placeholder="Input Input tag" require>
                    <label>Input tag</label>
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
<?php echo $__env->make('layouts.app', ['activePage' => 'Customer-Management', 'titlePage' => __('Customer List')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\working_folder\real_project\malaysia_project\wordpress_admin2\wordpress_admin\resources\views/customers/index.blade.php ENDPATH**/ ?>