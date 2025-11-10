

<?php $__env->startSection('content'); ?>
<div class="container">
    <h3 class="mb-4">Tambah Transaksi Baru</h3>

    
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

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="<?php echo e(route('transaksi.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>

                
                <div class="mb-3">
                    <label for="id_pelanggan" class="form-label">Pelanggan</label>
                    <select name="id_pelanggan" id="id_pelanggan" class="form-select" required>
                        <option value="">-- Pilih Pelanggan --</option>
                        <?php $__currentLoopData = $pelanggan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($p->id); ?>"><?php echo e($p->nama); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <hr>

                <h5>Daftar Produk</h5>

                
                <div id="produk-wrapper">
                    <div class="row produk-item mb-3">
                        <div class="col-md-5">
                            <label class="form-label">Produk</label>
                            <select name="id_produk[]" class="form-select produk-select" required>
                                <option value="">-- Pilih Produk --</option>
                                <?php $__currentLoopData = $produk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($prod->id); ?>" data-harga="<?php echo e($prod->harga); ?>">
                                    <?php echo e($prod->nama_produk); ?> - Rp<?php echo e(number_format($prod->harga, 0, ',', '.')); ?>

                                </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">Jumlah</label>
                            <input type="number" name="jumlah[]" class="form-control jumlah-input" min="1" value="1" required>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">Subtotal</label>
                            <input type="text" class="form-control subtotal" readonly value="Rp0">
                        </div>

                        <div class="col-md-1 d-flex align-items-end">
                            <button type="button" class="btn btn-danger btn-remove w-100">×</button>
                        </div>
                    </div>
                </div>

                <div class="text-end mb-3">
                    <button type="button" class="btn btn-sm btn-secondary" id="btn-add">+ Tambah Produk</button>
                </div>

                <div class="text-end mb-4">
                    <h5>Total Harga: <span id="totalHarga">Rp0</span></h5>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary btn-sm">Simpan Transaksi</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    function hitungSubtotal() {
        let total = 0;
        document.querySelectorAll('.produk-item').forEach(item => {
            let select = item.querySelector('.produk-select');
            let jumlah = item.querySelector('.jumlah-input');
            let subtotalInput = item.querySelector('.subtotal');

            let harga = select.selectedOptions[0]?.getAttribute('data-harga') || 0;
            let sub = parseInt(harga) * parseInt(jumlah.value || 0);

            subtotalInput.value = 'Rp' + sub.toLocaleString('id-ID');
            total += sub;
        });

        document.getElementById('totalHarga').innerText = 'Rp' + total.toLocaleString('id-ID');
    }

    document.addEventListener('input', hitungSubtotal);
    document.addEventListener('change', hitungSubtotal);

    // Tambah produk baru
    document.getElementById('btn-add').addEventListener('click', function() {
        let wrapper = document.getElementById('produk-wrapper');
        let newRow = wrapper.firstElementChild.cloneNode(true);

        newRow.querySelectorAll('input').forEach(i => i.value = i.classList.contains('jumlah-input') ? 1 : 'Rp0');
        newRow.querySelector('.produk-select').value = '';

        wrapper.appendChild(newRow);
    });

    // Hapus produk
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('btn-remove')) {
            let items = document.querySelectorAll('.produk-item');
            if (items.length > 1) {
                e.target.closest('.produk-item').remove();
                hitungSubtotal();
            }
        }
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laravel projek\laravelproject\resources\views/latihan/transaksi/create.blade.php ENDPATH**/ ?>