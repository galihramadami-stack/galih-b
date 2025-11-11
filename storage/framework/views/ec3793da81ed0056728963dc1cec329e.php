

<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Data Pembayaran</h5>
            <a href="<?php echo e(route('pembayaran.create')); ?>" class="btn btn-light btn-sm">+ Tambah Pembayaran</a>
        </div>

        <div class="card-body">
            
            <form action="<?php echo e(route('pembayaran.index')); ?>" method="GET" class="mb-3">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari kode transaksi..." value="<?php echo e($search); ?>">
                    <button class="btn btn-outline-primary" type="submit">Cari</button>
                    <?php if($search): ?>
                    <a href="<?php echo e(route('pembayaran.index')); ?>" class="btn btn-outline-secondary">Reset</a>
                    <?php endif; ?>
                </div>
            </form>

            
            <?php if(session('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo e(session('success')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            <?php endif; ?>

            
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Kode Transaksi</th>
                            <th>Nama Pelanggan</th>
                            <th>Tanggal Bayar</th>
                            <th>Metode</th>
                            <th>Jumlah Bayar</th>
                            <th>Kembalian</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $pembayarans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pembayaran): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($loop->iteration + ($pembayarans->currentPage() - 1) * $pembayarans->perPage()); ?></td>
                            <td><?php echo e($pembayaran->transaksi->kode_transaksi ?? '-'); ?></td>
                            <td><?php echo e($pembayaran->transaksi->pelanggan->nama ?? '-'); ?></td>
                            <td><?php echo e(\Carbon\Carbon::parse($pembayaran->tanggal_bayar)->format('d M Y')); ?></td>
                            <td>
                                <span class="badge bg-<?php echo e($pembayaran->metode_pembayaran == 'cash' ? 'success' : ($pembayaran->metode_pembayaran == 'credit' ? 'warning' : 'info')); ?>">
                                    <?php echo e(ucfirst($pembayaran->metode_pembayaran)); ?>

                                </span>
                            </td>
                            <td>Rp <?php echo e(number_format($pembayaran->jumlah_bayar, 0, ',', '.')); ?></td>
                            <td>Rp <?php echo e(number_format($pembayaran->kembalian, 0, ',', '.')); ?></td>
                            <td class="text-center">
                                <a href="<?php echo e(route('pembayaran.show', $pembayaran->id)); ?>" class="btn btn-sm btn-info text-white">
                                    Show
                                </a>
                                <a href="<?php echo e(route('pembayaran.edit', $pembayaran->id)); ?>" class="btn btn-sm btn-warning text-white">
                                    Edit
                                </a>
                                <form action="<?php echo e(route('pembayaran.destroy', $pembayaran->id)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="8" class="text-center text-muted">Tidak ada data pembayaran</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            
            <div class="mt-3">
                <?php echo e($pembayarans->links()); ?>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laravel projek\laravelproject\resources\views/latihan/pembayaran/index.blade.php ENDPATH**/ ?>