<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h3 class="card-title">Create New Project</h3>
            </div>
            <div class="card-body">
                <form id="projectsForm" action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                
                    <div class="mb-3">
                        <label for="name" class="form-label">Project Name</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                
                    <div class="mb-3">
                        <label for="link" class="form-label">Project Link</label>
                        <input type="url" name="link" id="link" class="form-control @error('link') is-invalid @enderror" value="{{ old('link') }}">
                        @error('link')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                
                    <div class="mb-3">
                        <label for="issued_at" class="form-label">Issued At</label>
                        <input type="date" name="issued_at" id="issued_at" class="form-control @error('issued_at') is-invalid @enderror" value="{{ old('issued_at') }}">
                        @error('issued_at')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                
                    <div class="mb-3">
                        <label for="image" class="form-label">Upload Gambar</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>
                
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-primary" onclick="confirmSubmit()">Simpan project</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
    <script>
     function confirmSubmit() {
    Swal.fire({
        title: "Apakah Anda yakin?",
        text: "Apakah Anda ingin menyimpan project ini?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya, simpan!",
        cancelButtonText: "Tidak, batalkan"
    }).then((result) => {
        if (result.isConfirmed) {
            console.log("AJAX dipanggil...");
            
            let form = $('#projectsForm')[0]; // Ambil elemen form
            let formData = new FormData(form); // Gunakan FormData untuk mendukung file

            $.ajax({
                type: "POST",
                url: form.action,
                data: formData,
                contentType: false, // Agar tidak menggunakan form-urlencoded
                processData: false, // Agar data tidak di-serialize
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(response) {
                    console.log("AJAX berhasil:", response);
                    Swal.fire({
                        title: "Berhasil!",
                        text: "Project telah disimpan.",
                        icon: "success"
                    }).then(() => {
                        window.location.href = '{{ route('admin.projects.index') }}';
                    });
                },
                error: function(xhr) {
                    console.log("AJAX error:", xhr.responseText);
                    let errors = xhr.responseJSON.errors;
                    let errorMessages = '';
                    for (let error in errors) {
                        errorMessages += errors[error].join(", ") + "<br>";
                    }
                    Swal.fire({
                        title: "Error!",
                        html: errorMessages,
                        icon: "error"
                    });
                }
            });
        }
    });
}


    </script>
</body>
</html>
