<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-success text-white">
                <h3 class="card-title">Edit Project</h3>
            </div>
            <div class="card-body">
                <!-- Pesan sukses -->
                <div id="success-message" class="alert alert-success d-none"></div>
                
                <form id="edit_project_form" action="{{ route('admin.projects.update', $project->id) }}" method="POST">
                    @csrf
                    @method('PUT')
    
                    <!-- Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Project Name</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $project->name) }}">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
    
                    <!-- Description -->
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" rows="4" class="form-control @error('description') is-invalid @enderror">{{ old('description', $project->description) }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
    
                    <!-- Link -->
                    <div class="mb-3">
                        <label for="link" class="form-label">Project Link</label>
                        <input type="url" name="link" id="link" class="form-control @error('link') is-invalid @enderror" value="{{ old('link', $project->link) }}">
                        @error('link')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
    
                    <!-- Issued At -->
                    <div class="mb-3">
                        <label for="issued_at" class="form-label">Issued At</label>
                        <input type="date" name="issued_at" id="issued_at" class="form-control @error('issued_at') is-invalid @enderror" value="{{ old('issued_at', $project->issued_at) }}">
                        @error('issued_at')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Upload Gambar Baru</label>
                        <input type="file" name="image" id="image" class="form-control">
                        @if ($project->image)
                            <div class="mt-3">
                                <label>Gambar Saat Ini:</label>
                                <img src="{{ asset('storage/' . $project->image) }}" alt="Gambar Project" class="img-fluid rounded" style="max-height: 150px;">
                            </div>
                        @endif
                    </div>
    
                    <!-- Buttons -->
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary me-2">Cancel</a>
                        <button id="submit" type="button" onclick="confirmSubmit()" class="btn btn-primary">Update Project</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function confirmSubmit() {
    Swal.fire({
        title: "Are you sure?",
        text: "Do you want to proceed with updating this project?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, update it!",
        cancelButtonText: "No, cancel"
    }).then((result) => {
        if (result.isConfirmed) {
            // Jika dikonfirmasi, submit form melalui AJAX
            $.ajax({
                type: "POST",
                url: $('#edit_project_form').attr('action'), // URL dari form
                data: $('#edit_project_form').serialize(), // Data dari form
                success: function(response) {
                    // Tampilkan pesan sukses dengan redirect
                    Swal.fire({
                        title: "Updated!",
                        text: "The project has been updated successfully.",
                        icon: "success"
                    }).then(() => {
                        // Redirect ke halaman daftar project
                        window.location.href = "{{ route('admin.projects.index') }}";
                    });
                },
                error: function(xhr) {
                    // Tangani error validasi atau lainnya
                    let errors = xhr.responseJSON.errors;
                    let errorMessages = '';
                    
                    // Bersihkan error sebelumnya
                    $(".is-invalid").removeClass("is-invalid");
                    $(".invalid-feedback").remove();

                    // Tambahkan error baru ke elemen input terkait
                    for (let field in errors) {
                        let input = $(`[name="${field}"]`);
                        input.addClass("is-invalid");
                        input.after(`<div class="invalid-feedback">${errors[field].join(", ")}</div>`);
                    }

                    // Tampilkan pesan kesalahan
                    Swal.fire({
                        title: "Error!",
                        text: "Please fix the errors in the form and try again.",
                        icon: "error"
                    });
                }
            });
        }
    });
}
</script>