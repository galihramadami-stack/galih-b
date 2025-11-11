

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span><?php echo e(__('Detail Produk')); ?></span>
                    <a href="<?php echo e(route('produk.index')); ?>" class="btn btn-sm btn-outline-primary">Kembali</a>
                </div>

                <div class="card-body">
                    <?php if($produk->image): ?>
                        <img src="<?php echo e(Storage::url($produk->image)); ?>" class="w-100 rounded mb-3" alt="<?php echo e($produk->nama_produk); ?>">
                    <?php else: ?>
                        <img src="<?php echo e(asset('images/no-image.png')); ?>" class="w-100 rounded mb-3" alt="No Image">
                    <?php endif; ?>

                    <h4 class="fw-bold"><?php echo e($produk->nama_produk); ?></h4>
                    <p class="mt-2 mb-1">Harga: <strong>Rp<?php echo e(number_format($produk->harga, 0, ',', '.')); ?></strong></p>
                    <p class="mt-2">Stok: <strong><?php echo e($produk->stok); ?></strong></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laravel projek\laravelproject\resources\views/latihan/produk/show.blade.php ENDPATH**/ ?>