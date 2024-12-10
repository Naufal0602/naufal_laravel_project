<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <form id="edit_certificate_form" action="{{ route('admin.certificates.update', $certificate->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Certificate Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $certificate->name) }}" required>
        </div>

        <div class="form-group">
            <label for="issued_by">Issued By</label>
            <input type="text" class="form-control" id="issued_by" name="issued_by" value="{{ old('issued_by', $certificate->issued_by) }}" required>
        </div>

        <div class="form-group">
            <label for="issued_at">Issued At</label>
            <input type="date" class="form-control" id="issued_at" name="issued_at" value="{{ old('issued_at', $certificate->issued_at) }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description">{{ old('description', $certificate->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="file">Replace Certificate File (optional)</label>
            <input type="file" class="form-control-file" id="file" name="file">
            @if ($certificate->file)
                <p>Current file: <a href="{{ asset('storage/' . $certificate->file) }}" target="_blank">View</a></p>
            @endif
        </div>

        <div class="form-group">
            <label for="image">Image (Optional)</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*">
        </div>
        

        <button id="submit" type="button" onclick="confirmSubmit()" class="btn btn-primary">Update Certificate</button>
        <a href="{{ route('admin.certificates.index') }}" class="btn btn-secondary">Cancel</a>
    </form>

</body>
</html>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
                    url: $('#edit_certificate_form').attr('action'),
                    data: $('#edit_certificate_form').serialize(),
                    success: function(response) {
                        // Show success message
                        Swal.fire({
                            title: "Updated!",
                            text: "The skill has been updated successfully.",
                            icon: "success"
                        }).then(() => {
                            // Optionally, redirect or do something else
                            window.location.href = '{{  route('admin.certificates.index') }}'; // Redirect to the skill list
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