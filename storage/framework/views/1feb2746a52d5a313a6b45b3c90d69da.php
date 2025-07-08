
<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <h2>CheckOut</h2>
    <form action="<?php echo e(route('place.order')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <label for="shipping_address" class="form-label">Shipping Address</label>
            <input type="text" class="form-control" id="shipping_address" name="shipping_address" 
            required>
        </div>
        <div class="mb-3">
            <label for="payment_method_id" class="form-control">Payment Methods</label>
            <select class="form-control" id="payment_method_id" name="payment_method_id" required>
                <?php $__currentLoopData = $paymentMethods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($method->id); ?>"><?php echo e($method->name); ?></option>
                
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <button type="submit" class="btn btn-success"> Confirm Order</button>
        <a href="<?php echo e(route('cart.view')); ?>" class="btn btn-secondary">Back to cart</a>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\joudi\OneDrive\Desktop\store\megastore\resources\views/cart/checkout.blade.php ENDPATH**/ ?>