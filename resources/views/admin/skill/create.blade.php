<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <form id="skillForm" action="{{ route('admin.submit_skill') }}" method="POST" enctype="multipart/form-data">
        @csrf <!-- Token keamanan untuk form -->
        
        <div class="form-group">
            <label for="title">Judul Skill</label>
            <input type="text" class="form-control" id="title" name="title" required maxlength="255" value="{{ old('title') }}">
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    
        <div class="form-group">
            <label for="description">Deskripsi Skill</label>
            <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    
        <div class="form-group">
            <label for="status">Status Skill</label>
            <input type="number" class="form-control" id="status" name="status" value="{{ old('status') }}">
            @error('status')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
        
       
    
        <button type="button" class="btn btn-primary" onclick="confirmSubmit()">Simpan Skill</button>
    </form>

    <script>
        function confirmSubmit() {
            Swal.fire({
                title: "Apakah Anda yakin?",
                text: "Apakah Anda ingin menyimpan skill ini?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, simpan!",
                cancelButtonText: "Tidak, batalkan"
            }).then((result) => {
                if (result.isConfirmed) {
                    // Submit the form via AJAX
                    $.ajax({
                        type: "POST",
                        url: $('#skillForm').attr('action'),
                        data: $('#skillForm').serialize(),
                        success: function(response) {
                            // Show success message
                            Swal.fire({
                                title: "Berhasil!",
                                text: "Skill telah disimpan.",
                                icon: "success"
                            }).then(() => {
                                // Optionally, redirect or refresh the page
                                window.location.href = '{{ route('admin.skill.index') }}'; // Redirect to the skill index page
                            });
                        },
                        error: function(xhr) {
                            // Handle validation errors or other errors
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
