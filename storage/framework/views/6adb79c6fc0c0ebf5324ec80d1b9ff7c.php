<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <center><h1><?php echo e($resto); ?></h1></center>
    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $makanan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    nama : <?php echo e($makanan['nama_makanan']); ?><br>
    harga : <?php echo e($makanan['harga']); ?><br>
    jumlah : <?php echo e($makanan['jumlah']); ?><br>
    <?php $total = $makanan['jumlah'] * $makanan['harga']; ?>
    total: <?php echo e($total); ?>

    <?php if($total > 15000): ?>
    keteranga: get diskon 5%
    <?php else: ?>
    keterangan: tidak dapat diskon
    <?php endif; ?>
    <hr>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</body>
</html><?php /**PATH C:\laravel projek\laravelproject\resources\views/menu.blade.php ENDPATH**/ ?>