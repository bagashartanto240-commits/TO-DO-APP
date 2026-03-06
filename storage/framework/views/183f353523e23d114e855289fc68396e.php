<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task | Bagas Hartanto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
    <style>
        body { background: #001f3f; font-family: 'Inter', sans-serif; }
        .glass-card { background: rgba(255, 255, 255, 0.9); border-radius: 15px; padding: 30px; }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="glass-card shadow-lg">
                    <h4 class="fw-bold mb-4 text-center text-dark">UPDATE TASK</h4>
                    <hr>
                    
                    <form action="<?php echo e(route('todo.update_data', $todo->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?> 
                        <?php echo method_field('PUT'); ?>
                        
                        <div class="mb-3">
                            <label class="small fw-bold text-muted">Title</label>
                            <input type="text" name="judul" class="form-control" value="<?php echo e($todo->judul); ?>" required 
                                   style="background: rgba(0,0,0,0.05); border: none; padding: 12px;">
                        </div>

                        <div class="mb-3">
                            <label class="small fw-bold text-muted">Deadline</label>
                            <input type="datetime-local" name="deadline" class="form-control" 
                                   value="<?php echo e($todo->deadline ? date('Y-m-d\TH:i', strtotime($todo->deadline)) : ''); ?>" 
                                   required style="background: rgba(0,0,0,0.05); border: none; padding: 12px;">
                        </div>

                        <div class="mb-4">
                            <label class="small fw-bold text-muted">Description</label>
                            <textarea name="keterangan" class="form-control" rows="4" 
                                      style="background: rgba(0,0,0,0.05); border: none; padding: 12px;"><?php echo e($todo->keterangan); ?></textarea>
                        </div>

                        <div class="d-flex gap-2">
                            <a href="<?php echo e(route('todo.index')); ?>" class="btn btn-light w-100 py-3 fw-bold shadow-sm">BACK</a>
                            <button type="submit" class="btn btn-primary w-100 py-3 fw-bold shadow-sm">SAVE CHANGES</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html><?php /**PATH D:\bagashartanto.20236004\TO-DOO\todo-app\resources\views/edit.blade.php ENDPATH**/ ?>