<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<style>
    body{
        display: flex;
    }
    .sidebar{
        width: 250px;
        height: 100vh;
        background-color: #1a1a1a;
        color: white;
        padding: 20px;
        position: fixed;
    }
    .content{
       margin-left: 250px;
        padding: 20px;
        width: 100%;
    }
    .sidebar a{
        color: white;
        text-decoration: none;
        display: block;
        padding: 10px;
        margin-bottom: 10px;
        border-radius: 5px ;

    }
    .sidebar a:hover{
        background-color: #2a2a2a;
        
    }
</style>


</head>
<body>
<?php echo $__env->make('components.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="content">
    <?php echo $__env->make('components.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container mt-4">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
</div>
</body>
</html><?php /**PATH C:\Users\joudi\OneDrive\Desktop\store\megastore\resources\views/layouts/dashboard.blade.php ENDPATH**/ ?>