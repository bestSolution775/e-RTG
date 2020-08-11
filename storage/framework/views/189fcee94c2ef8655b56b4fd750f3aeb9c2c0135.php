<ul style="position: relative;left: -10px;">
<?php $__currentLoopData = $childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<li style="cursor:pointer;">
				<?php if(count($child->childs)): ?>
					<i class="material-icons" data-id = "0" style="position:absolute;top:2px;left:-5px;">arrow_right</i>
				<?php endif; ?>
				<i class="material-icons category_edit" onclick = "category_edit(<?php echo e($child); ?>);">edit</i>
				<i class="material-icons category_delete" onclick="confirm('<?php echo e(__('Are you sure you want to delete?')); ?>') ? remove_category(<?php echo e($child->id); ?>) : ''">delete</i>
				<?php echo e($child->title); ?>

				<?php if(count($child->childs)): ?>
				<?php echo $__env->make('products.categories.manageChild',['childs' => $child->childs], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
				<?php endif; ?>
			</li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul><?php /**PATH E:\working_folder\E-RTG Project\resources\views/products/categories/manageChild.blade.php ENDPATH**/ ?>