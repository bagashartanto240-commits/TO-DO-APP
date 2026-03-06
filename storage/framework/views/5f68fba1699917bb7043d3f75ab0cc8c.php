<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bagas Hartanto | Todo List Hub</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
</head>
<body>

    <div class="container py-5">
        <div class="text-center mb-5" data-aos="fade-down">
            <h1 class="header-title display-4">TODO<span class="text-primary">.LIST</span></h1>
            <p class="text-white-50 fs-5 mb-4">Project Bagas Hartanto</p>

            <div class="row g-3 justify-content-center">
                <div class="col-6 col-md-3">
                    <div class="glass-card p-3 text-center border-bottom border-primary border-4">
                        <small class="text-muted fw-bold d-block">TOTAL TASK</small>
                        <h2 class="fw-bold m-0 text-dark"><?php echo e($total_tugas); ?></h2>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="glass-card p-3 text-center border-bottom border-warning border-4">
                        <small class="text-muted fw-bold d-block">PENDING</small>
                        <h2 class="fw-bold m-0 text-warning"><?php echo e($total_pending); ?></h2>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="glass-card p-3 text-center border-bottom border-success border-4">
                        <small class="text-muted fw-bold d-block">FINISHED</small>
                        <h2 class="fw-bold m-0 text-success"><?php echo e($total_selesai); ?></h2>
                    </div>
                </div>
            </div>
        </div>

        <?php if(session('success')): ?>
            <div class="row justify-content-center" data-aos="zoom-in">
                <div class="col-lg-9">
                    <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm rounded-4 mb-4" role="alert">
                        <div class="d-flex align-items-center">
                            <span class="fs-4 me-3">✨</span>
                            <div><strong>Berhasil!</strong> <?php echo e(session('success')); ?></div>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="row justify-content-center">
            <div class="col-lg-9" data-aos="fade-up" data-aos-delay="100">
                <div class="glass-card p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="fw-bold m-0 text-dark">Active Task Logs</h4>
                        <a href="<?php echo e(route('todo.create')); ?>" class="btn btn-primary rounded-pill px-4 fw-bold shadow">
                            + NEW TASK
                        </a>
                    </div>

                    <div class="task-container">
                        <?php $__empty_1 = true; $__currentLoopData = $todos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $todo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="task-item <?php echo e($todo->is_done ? 'completed' : ''); ?>">
                                <form action="<?php echo e(route('todo.update', $todo->id)); ?>" method="POST">
                                    <?php echo csrf_field(); ?> <?php echo method_field('PATCH'); ?>
                                    <input type="checkbox" name="is_done" class="form-check-input shadow-none" onchange="this.form.submit()" <?php echo e($todo->is_done ? 'checked' : ''); ?>>
                                </form>
                                
                                <div class="task-content">
                                    <div class="d-flex align-items-center gap-2 mb-1">
                                        <h6 class="m-0 fw-bold <?php echo e($todo->is_done ? 'text-decoration-line-through text-muted' : ''); ?>">
                                            <?php echo e($todo->judul); ?>

                                        </h6>
                                        <span class="badge-status <?php echo e($todo->is_done ? 'status-finished' : 'status-pending'); ?>">
                                            <?php echo e($todo->is_done ? 'Finished' : 'Pending'); ?>

                                        </span>
                                    </div>
                                    <small class="text-muted d-block mb-1"><?php echo e($todo->keterangan ?? 'No description provided.'); ?></small>
                                    <div class="mt-1">
                                        <?php if($todo->is_done): ?>
                                            <small class="text-success fw-bold" style="font-size: 0.7rem;">
                                                ✓ Solved: <?php echo e(\Carbon\Carbon::parse($todo->tanggal_selesai)->format('d M, H:i')); ?>

                                            </small>
                                        <?php else: ?>
                                            <small class="text-primary fw-bold" style="font-size: 0.7rem;">
                                                ⏳ Deadline: <?php echo e(\Carbon\Carbon::parse($todo->deadline)->format('d M, H:i')); ?>

                                            </small>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="d-flex gap-2">
                                    <a href="<?php echo e(route('todo.edit', $todo->id)); ?>" class="btn-action btn btn-light text-primary border-0">✎</a>
                                    <form action="<?php echo e(route('todo.destroy', $todo->id)); ?>" method="POST" onsubmit="return confirm('Hapus data tugas ini?')">
                                        <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn-action btn btn-light text-danger border-0">✕</button>
                                    </form>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="text-center py-5">
                                <p class="text-muted">No system logs available.</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 800, once: true });
    </script>
</body>
</html><?php /**PATH D:\bagashartanto.20236004\TO-DOO\todo-app\resources\views/home.blade.php ENDPATH**/ ?>