

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Daftar Transaksi</h3>
        <a href="<?php echo e(route('transaksi.create')); ?>" class="btn btn-primary">+ Tambah Transaksi</a>
    </div>

    
    <?php if(session('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session('success')); ?>

    </div>
    <?php endif; ?>

    
    <?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul class="mb-0">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($err); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
    <?php endif; ?>

    <?php if($transaksi->count() > 0): ?>
    <div class="table-responsive">
        <table class="table table-bordered align-middle text-center">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Kode Transaksi</th>
                    <th>Tanggal</th>
                    <th>Pelanggan</th>
                    <th>Total Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $transaksi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no => $trx): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($no + 1); ?></td>
                    <td><?php echo e($trx->kode_transaksi); ?></td>
                    <td><?php echo e(\Carbon\Carbon::parse($trx->tanggal)->format('d M Y, H:i')); ?></td>
                    <td><?php echo e($trx->pelanggan->nama ?? '-'); ?></td>
                    <td>Rp<?php echo e(number_format($trx->total_harga, 0, ',', '.')); ?></td>
                    <td>
                        <a href="<?php echo e(route('transaksi.show', $trx->id)); ?>"
                            class="btn btn-outline-warning btn-sm">Show</a>
                        <a href="<?php echo e(route('transaksi.edit', $trx->id)); ?>"
                            class="btn btn-outline-success btn-sm">Edit</a>
                        <form action="<?php echo e(route('transaksi.destroy', $trx->id)); ?>" method="POST" class="d-inline"
                            onsubmit="return confirm('Yakin mau hapus transaksi ini?')">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-outline-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
    <?php else: ?>
    <div class="alert alert-info">
        Belum ada transaksi yang tercatat.
    </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laravel projek\laravelproject\resources\views/latihan/transaksi/index.blade.php ENDPATH**/ ?>