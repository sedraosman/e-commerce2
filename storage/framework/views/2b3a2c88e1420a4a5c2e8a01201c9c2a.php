
<?php $__env->startSection('content'); ?>

<form action="<?php echo e(route('categories.store')); ?>" method="Post" >
    <?php echo csrf_field(); ?>
    <div class="mb-3">
        <label class="for-label" for="name">Category Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3">
        <label class="for-label" for="slug">Category Slug</label>
        <input type="text" class="form-control" id="slug" name="slug" required>
    </div>
   

    <button type="submit" class="btn btn-success">Add New Category</button>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\joudi\OneDrive\Desktop\store\megastore\resources\views/dashboard/categories/create.blade.php ENDPATH**/ ?>