
;
<?php $__env->startSection('content'); ?>

<h1>Manage products</h1>

<a href="<?php echo e(route('products.create')); ?>"
class ="btn btn-dark"> Add New Product</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Actions</th>

        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><img src="<?php echo e(asset('storage/'. $product->image)); ?>" width="50" alt=""></td>
            <td><?php echo e($product->name); ?></td>
            <td><?php echo e($product->category->name); ?></td>
            <td><?php echo e($product->price); ?></td>
            <td><?php echo e($product->stock); ?></td>
            <td><a href="" class="btn btn-warninng">Edit</a>
            <form action="" method>
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            </td>
        </tr>
        
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\joudi\OneDrive\Desktop\store\megastore\resources\views/dashboard/products/index.blade.php ENDPATH**/ ?>