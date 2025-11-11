

<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Edit Pembayaran</h5>
            <a href="<?php echo e(route('pembayaran.index')); ?>" class="btn btn-light btn-sm">Kembali</a>
        </div>

        <div class="card-body">
            
            <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <strong>Terjadi kesalahan:</strong>
                <ul class="mb-0">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($err); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <?php endif; ?>

            <form action="<?php echo e(route('pembayaran.update', $pembayaran->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                
                <div class="mb-3">
                    <label class="form-label">Kode Transaksi</label>
                    <input type="text" class="form-control" value="<?php echo e($pembayaran->transaksi->kode_transaksi); ?>" readonly>
                    <input type="hidden" name="id_transaksi" value="<?php echo e($pembayaran->transaksi->id); ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama Pelanggan</label>
                    <input type="text" class="form-control" value="<?php echo e($pembayaran->transaksi->pelanggan->nama); ?>" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Total Harga</label>
                    <input type="text" id="total_harga" class="form-control" value="Rp<?php echo e(number_format($pembayaran->transaksi->total_harga, 0, ',', '.')); ?>" readonly>
                </div>

                <hr>

                
                <div class="mb-3">
                    <label class="form-label">Tanggal Bayar</label>
                    <input type="date" name="tanggal_bayar" class="form-control" value="<?php echo e($pembayaran->tanggal_bayar); ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Metode Pembayaran</label>
                    <select name="metode_pembayaran" class="form-select" required>
                        <option value="">-- Pilih Metode --</option>
                        <option value="cash" <?php echo e($pembayaran->metode_pembayaran == 'cash' ? 'selected' : ''); ?>>Cash</option>
                        <option value="credit" <?php echo e($pembayaran->metode_pembayaran == 'credit' ? 'selected' : ''); ?>>Credit</option>
                        <option value="debit" <?php echo e($pembayaran->metode_pembayaran == 'debit' ? 'selected' : ''); ?>>Debit</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jumlah Bayar</label>
                    <input type="number" name="jumlah_bayar" id="jumlah_bayar" class="form-control" min="0" value="<?php echo e($pembayaran->jumlah_bayar); ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kembalian</label>
                    <input type="text" name="kembalian" id="kembalian" class="form-control" value="Rp<?php echo e(number_format($pembayaran->kembalian, 0, ',', '.')); ?>" readonly>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-success">Update Pembayaran</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const totalHargaInput = document.getElementById('total_harga');
        const jumlahBayarInput = document.getElementById('jumlah_bayar');
        const kembalianInput = document.getElementById('kembalian');

        jumlahBayarInput.addEventListener('input', function() {
            const total = parseInt(totalHargaInput.value.replace(/[^0-9]/g, '')) || 0;
            const bayar = parseInt(this.value) || 0;
            let kembali = bayar - total;
            if (kembali < 0) kembali = 0;
            kembalianInput.value = 'Rp' + kembali.toLocaleString('id-ID');
        });
    });

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laravel projek\laravelproject\resources\views/latihan/pembayaran/edit.blade.php ENDPATH**/ ?>