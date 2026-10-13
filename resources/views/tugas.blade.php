<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>tugas</title>
</head>
<body class="justify-content-center align-items-center">
    <h3 class="text-center">Tugas Ujikom</h3>
    <h5 class="text-center text-muted">Input Nilai</h5>
    <div class="card shadow-sm p-4" style="width: 100%; max-width: 400px;" style="max-width: 400px;">
        <form action="{{route('tugas')}}" method="POST">
            <div class="mb-3">
                <label class="form-label">Nilai 1</label>
                <input type="integer" name="nilai1" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Nilai 2</label>
                <input type="integer" name="nilai2" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-warning w-100">submit</button>
        </form>
    </div>
</body>
</html>




