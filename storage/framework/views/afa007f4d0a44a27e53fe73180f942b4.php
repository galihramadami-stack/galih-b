

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        Pelanggan
                    </div>
                    <div class="float-end">
                        <a href="<?php echo e(route('pelanggan.create')); ?>" class="btn btn-sm btn-outline-primary">Tambah Data</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Alamat</th>
                                    <th>No Telepon</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php $__empty_1 = true; $__currentLoopData = $pelanggan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($no++); ?></td>
                                    <td><?php echo e($data->nama); ?></td>
                                    <td><?php echo e($data->alamat); ?></td>
                                    <td><?php echo e($data->no_telepon); ?></td>
                                    <td>
                                        <form action="<?php echo e(route('pelanggan.destroy', $data->id)); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <a href="<?php echo e(route('pelanggan.show', $data->id)); ?>"
                                                class="btn btn-sm btn-outline-dark">Show</a> |
                                            <a href="<?php echo e(route('pelanggan.edit', $data->id)); ?>"
                                                class="btn btn-sm btn-outline-success">Edit</a> |
                                            <button type="submit" onsubmit="return confirm('Are You Sure ?');"
                                                class="btn btn-sm btn-outline-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="6" class="text-center">
                                        Data data belum Tersedia.
                                    </td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laravel projek\laravelproject\resources\views/latihan/pelanggan/index.blade.php ENDPATH**/ ?>