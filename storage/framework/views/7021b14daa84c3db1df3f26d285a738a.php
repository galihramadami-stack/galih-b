

<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white">
            <h4>Detail Pembayaran</h4>
        </div>
        <div class="card-body">
            
            <h5 class="mb-3">Informasi Pembayaran</h5>
            <table class="table table-bordered">
                <tr>
                    <th>ID Pembayaran</th>
                    <td><?php echo e($pembayaran->id); ?></td>
                </tr>
                <tr>
                    <th>Tanggal Pembayaran</th>
                    <td><?php echo e($pembayaran->tanggal_bayar); ?></td>
                </tr>
                <tr>
                    <th>Total Bayar</th>
                    <td>Rp <?php echo e(number_format($pembayaran->transaksi->total_harga, 0, ',', '.')); ?></td>
                </tr>
                <tr>
                    <th>Uang Diterima</th>
                    <td>Rp <?php echo e(number_format($pembayaran->jumlah_bayar, 0, ',', '.')); ?></td>
                </tr>
                <tr>
                    <th>Kembalian</th>
                    <td>Rp <?php echo e(number_format($pembayaran->kembalian, 0, ',', '.')); ?></td>
                </tr>
            </table>

            
            <h5 class="mt-4 mb-3">Informasi Transaksi</h5>
            <table class="table table-bordered">
                <tr>
                    <th>Kode Transaksi</th>
                    <td><?php echo e($pembayaran->transaksi->kode_transaksi); ?></td>
                </tr>
                <tr>
                    <th>Tanggal Transaksi</th>
                    <td><?php echo e($pembayaran->transaksi->tanggal); ?></td>
                </tr>
                <tr>
                    <th>Total Transaksi</th>
                    <td>Rp <?php echo e(number_format($pembayaran->transaksi->total_harga, 0, ',', '.')); ?></td>
                </tr>
            </table>

            
            <h5 class="mt-4 mb-3">Detail Produk</h5>
            <table class="table table-striped table-bordered">
                <thead class="table-secondary">
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Sub Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $pembayaran->transaksi->produks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $produk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($index + 1); ?></td>
                        <td><?php echo e($produk->nama); ?></td>
                        <td>Rp <?php echo e(number_format($produk->harga, 0, ',', '.')); ?></td>
                        <td><?php echo e($produk->pivot->jumlah); ?></td>
                        <td>Rp <?php echo e(number_format($produk->pivot->sub_total, 0, ',', '.')); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>

            
            <h5 class="mt-4 mb-3">Informasi Pelanggan</h5>
            <table class="table table-bordered">
                <tr>
                    <th>Nama Pelanggan</th>
                    <td><?php echo e($pembayaran->transaksi->pelanggan->nama); ?></td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td><?php echo e($pembayaran->transaksi->pelanggan->alamat); ?></td>
                </tr>
            </table>

            <div class="mt-3">
                <a href="<?php echo e(route('pembayaran.index')); ?>" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laravel projek\laravelproject\resources\views/latihan/pembayaran/show.blade.php ENDPATH**/ ?>