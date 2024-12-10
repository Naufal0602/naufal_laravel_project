<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Work</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @error('img')
        <div class="text-danger">{{ $message }}</div>
    @enderror

    <form action="{{ route('admin.submit_home') }}" method="POST" enctype="multipart/form-data" class="form">
        @csrf
        <div class="card p-4">
            <h3 class="text-center mb-4">Create Work</h3>
            
            <div class="mb-3">
                <label for="img" class="form-label">Image:</label>
                <input type="file" name="img" id="img" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="judul" class="form-label">Judul:</label>
                <input type="text" name="judul" id="judul" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="sub_subjudul" class="form-label">Sub Subjudul:</label>
                <input type="text" name="sub_subjudul" id="sub_subjudul" class="form-control">
            </div>

            <div class="mb-3">
                <label for="work" class="form-label">Work:</label>
                <input type="text" name="work" id="work" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="sub_work" class="form-label">Sub Work:</label>
                <input type="text" name="sub_work" id="sub_work" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary w-100">Submit</button>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
