<div class="sidebar" data-color="green" data-background-color="white" data-image="<?php echo e(asset('material')); ?>/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="https://creative-tim.com/" class="simple-text logo-normal">
      <?php echo e(__('e_RTG Project')); ?>

    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item<?php echo e($activePage == 'dashboard' ? ' active' : ''); ?>">
        <a class="nav-link" href="<?php echo e(route('countries.index')); ?>">
          <i class="material-icons">dashboard</i>
            <p><?php echo e(__('Admin Dashboard')); ?></p>
        </a>
      </li>
      <li class="nav-item<?php echo e($activePage == 'Country-Management' ? ' active' : ''); ?>">
        <a class="nav-link" href="<?php echo e(route('countries.index')); ?>">
          <i class="material-icons">language</i>
            <p><?php echo e(__('Country Management')); ?></p>
        </a>
      </li>
      <li class="nav-item<?php echo e($activePage == 'Distributor-Management' ? ' active' : ''); ?>">
        <a class="nav-link" href="<?php echo e(route('distributors.index')); ?>">
          <i class="material-icons">people</i>
            <p><?php echo e(__('Distributor Management')); ?></p>
        </a>
      </li>
      
      <li class="nav-item<?php echo e($activePage == 'Customer-Management' ? ' active' : ''); ?>">
        <a class="nav-link" href="<?php echo e(route('customers.index')); ?>">
          <i class="material-icons">transfer_within_a_station</i>
            <p><?php echo e(__('Customer Management')); ?></p>
        </a>
      </li>
      <li class="nav-item<?php echo e($activePage == 'User-Management' ? ' active' : ''); ?>">
        <a class="nav-link" href="<?php echo e(route('user.index')); ?>">
          <i class="material-icons">person</i>
            <p><?php echo e(__('User Management')); ?></p>
        </a>
      </li>
      <li class="nav-item <?php echo e(($activePage == 'profile' || $activePage == 'user-management') ? ' active' : ''); ?>">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
        <i class="material-icons">add_shopping_cart</i>
          <p><?php echo e(__('Product Management')); ?>

            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="laravelExample">
          <ul class="nav">
            <li class="nav-item<?php echo e($activePage == 'Category-Management' ? ' active' : ''); ?>">
              <a class="nav-link" href="<?php echo e(route('categories.index')); ?>">
                <span class="sidebar-mini"> CM </span>
                <span class="sidebar-normal"><?php echo e(__('Category Management')); ?> </span>
              </a>
            </li>
            <li class="nav-item<?php echo e($activePage == 'Attribute-Management' ? ' active' : ''); ?>">
              <a class="nav-link" href="<?php echo e(route('attributes.index')); ?>">
                <span class="sidebar-mini"> AM </span>
                <span class="sidebar-normal"> <?php echo e(__('Attribute Management')); ?> </span>
              </a>
            </li>
            <li class="nav-item<?php echo e($activePage == 'Item-Management' ? ' active' : ''); ?>">
              <a class="nav-link" href="<?php echo e(route('items.index')); ?>">
                <span class="sidebar-mini"> IM </span>
                <span class="sidebar-normal"> <?php echo e(__('Item Management')); ?> </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item<?php echo e($activePage == 'PushToRetailer-Management' ? ' active' : ''); ?>">
        <a class="nav-link" href="<?php echo e(route('pushtoretailers.index')); ?>">
          <i class="material-icons">person</i>
            <p><?php echo e(__('Push To Retailer')); ?></p>
        </a>
      </li>
    </ul>
  </div>
</div><?php /**PATH E:\working_folder\E-RTG Project\resources\views/layouts/navbars/sidebar.blade.php ENDPATH**/ ?>