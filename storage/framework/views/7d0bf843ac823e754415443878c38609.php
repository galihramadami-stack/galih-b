

<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Detail Transaksi</h5>
            <a href="<?php echo e(route('transaksi.index')); ?>" class="btn btn-light btn-sm">Kembali</a>
        </div>

        <div class="card-body">

            
            <h6 class="fw-bold mb-3">Informasi Transaksi</h6>
            <table class="table table-sm table-bordered mb-4">
                <tr>
                    <th>Kode Transaksi</th>
                    <td><?php echo e($transaksi->kode_transaksi); ?></td>
                </tr>
                <tr>
                    <th>Tanggal</th>
                    <td><?php echo e(\Carbon\Carbon::parse($transaksi->tanggal)->format('d M Y H:i')); ?></td>
                </tr>
                <tr>
                    <th>Pelanggan</th>
                    <td><?php echo e($transaksi->pelanggan->nama ?? '-'); ?></td>
                </tr>
                <tr>
                    <th>Total Harga</th>
                    <td>Rp <?php echo e(number_format($transaksi->total_harga, 0, ',', '.')); ?></td>
                </tr>
            </table>

            
            <h6 class="fw-bold mb-3">Detail Produk</h6>
            <table class="table table-striped table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Harga Satuan</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $transaksi->produks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e($prod->nama_produk); ?></td>
                        <td>Rp <?php echo e(number_format($prod->harga, 0, ',', '.')); ?></td>
                        <td><?php echo e($prod->pivot->jumlah); ?></td>
                        <td>Rp <?php echo e(number_format($prod->pivot->sub_total, 0, ',', '.')); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>

                <tfoot class="table-secondary">
                    <tr>
                        <th colspan="4" class="text-end">Total</th>
                        <th>Rp <?php echo e(number_format($transaksi->total_harga, 0, ',', '.')); ?></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laravel projek\laravelproject\resources\views/latihan/transaksi/show.blade.php ENDPATH**/ ?>