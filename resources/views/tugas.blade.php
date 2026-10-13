<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Ujikom</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5" style="max-width: 500px;">
        <h3 class="text-center mb-3">Tugas Ujikom</h3>
        <p class="text-center text-muted">Input Nilai</p>

        <div class="card p-4 border shadow-sm">
            <form action="{{ url('tugas') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="nilai1" class="form-label">Nilai 1</label>
                    <input type="number" class="form-control" id="nilai1" name="nilai1" required>
                </div>

                <div class="mb-3">
                    <label for="nilai2" class="form-label">Nilai 2</label>
                    <input type="number" class="form-control" id="nilai2" name="nilai2" required>
                </div>

                <button type="submit" class="btn btn-warning w-100">Submit</button>
            </form>
        </div>

        @isset($nilairatarata)
            <div class="mt-4 p-3 border bg-white shadow-sm">
                <h5>Hasil Perhitungan:</h5>
                <p class="mb-1">Rata-rata: <strong>{{ $nilairatarata }}</strong></p>
                <p class="mb-0">Status:
                    <span class="badge {{ $status == 'Lulus' ? 'bg-success' : 'bg-danger' }}">
                        {{ $status }}
                    </span>
                </p>
            </div>
        @endisset

    </div>

</body>
</html>
