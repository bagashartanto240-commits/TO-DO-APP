<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Tugas | Todo Hub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="bg-light">

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="glass-card p-4 shadow-sm">
                    <h4 class="fw-bold mb-4 text-dark">📝 Buat Tugas Baru</h4>
                    <hr class="mb-4" style="opacity: 0.1;">
                    
                    <form action="{{ route('todo.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Judul Tugas</label>
                            <input type="text" name="judul" class="form-control" placeholder="Apa yang harus dilakukan?" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Batas Waktu (Deadline)</label>
                            <input type="datetime-local" name="deadline" class="form-control" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Keterangan Tambahan</label>
                            <textarea name="keterangan" class="form-control" rows="3" placeholder="Detail tugas (opsional)"></textarea>
                        </div>

                        <div class="mb-4">
                            <div class="form-check d-flex align-items-center gap-2 p-0">
                                <input class="form-check-input ms-0 shadow-none" type="checkbox" name="is_done" id="checkDone" style="width: 25px; height: 25px; cursor: pointer;">
                                <label class="form-check-label fw-semibold text-dark cursor-pointer" for="checkDone">
                                    Tandai sudah selesai
                                </label>
                            </div>
                        </div>
                        
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary rounded-pill px-4 fw-bold shadow">
                                Simpan Tugas
                            </button>
                            <a href="{{ route('todo.index') }}" class="btn btn-light rounded-pill px-4">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>