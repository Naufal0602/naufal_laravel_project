<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Skill</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h2>Edit Skill</h2>
    
        {{-- Check if there are any validation errors --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    
        {{-- Edit form for the Skill --}}
        <form id="editSkillForm" action="{{ url('admin/skill/' . $skill->id) }}" method="POST">
            @csrf
            @method('PUT') {{-- Spoofing the HTTP method as PUT for updating --}}
    
            {{-- Title Input --}}
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" name="title" value="{{ old('title', $skill->title) }}" class="form-control" required>
            </div>
    
            {{-- Description Input --}}
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" class="form-control" rows="5">{{ old('description', $skill->description) }}</textarea>
            </div>
    
            {{-- Status Input --}}
            <div class="form-group">
                <label for="status">Status:</label>
                <input type="number" name="status" value="{{ old('status', $skill->status) }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Upload Gambar Baru</label>
                <input type="file" name="image" id="image" class="form-control">
                @if ($skill->image)
                    <div class="mt-3">
                        <label>Gambar Saat Ini:</label>
                        <img src="{{ asset('storage/' . $skill->image) }}" alt="Gambar Project" class="img-fluid rounded" style="max-height: 150px;">
                    </div>
                @endif
            </div>

            
            {{-- Update Button --}}
            <button id="submit" type="button" onclick="confirmSubmit()" class="btn btn-primary">Update Skill</button>
        </form>
    </div>

    <script>
        function confirmSubmit() {
            Swal.fire({
                title: "Are you sure?",
                text: "Do you want to proceed with updating this skill?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, update it!",
                cancelButtonText: "No, cancel"
            }).then((result) => {
                if (result.isConfirmed) {
                    // If confirmed, submit the form via AJAX
                    $.ajax({
                        type: "POST",
                        url: $('#editSkillForm').attr('action'),
                        data: $('#editSkillForm').serialize(),
                        success: function(response) {
                            // Show success message
                            Swal.fire({
                                title: "Updated!",
                                text: "The skill has been updated successfully.",
                                icon: "success"
                            }).then(() => {
                                // Optionally, redirect or do something else
                                window.location.href = '{{ url('admin/skill') }}'; // Redirect to the skill list
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
