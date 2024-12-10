<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Contact</title>
    <link href="{{ asset('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container py-5">
        <!-- Card Wrapper -->
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Create Contact</h4>
            </div>
            <div class="card-body">
                <!-- Form -->
                <form id="contactForm" action="{{ route('admin.contact.store') }}" method="post">
                    @csrf

                    <!-- Name Field -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>

                    <!-- Email Field -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>

                    <!-- Mail Field -->
                    <div class="mb-3">
                        <label for="mail" class="form-label">Mail</label>
                        <input type="text" name="mail" id="mail" class="form-control" required>
                    </div>

                    <!-- Submit Button -->
                    <div class="text-end">
                        <button type="button" class="btn btn-primary" onclick="confirmSubmit()">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap and SweetAlert Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmSubmit() {
            Swal.fire({
                title: "Apakah Anda yakin?",
                text: "Apakah Anda ingin menyimpan kontak ini?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, simpan!",
                cancelButtonText: "Tidak, batalkan"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: $('#contactForm').attr('action'),
                        data: $('#contactForm').serialize(),
                        success: function(response) {
                            Swal.fire({
                                title: "Berhasil!",
                                text: "Kontak berhasil disimpan.",
                                icon: "success"
                            }).then(() => {
                                window.location.href = "{{ route('admin.contact.index') }}";
                            });
                        },
                        error: function(xhr) {
                            let errors = xhr.responseJSON?.errors || { error: ['Terjadi kesalahan.'] };
                            let errorMessages = '';
                            for (let key in errors) {
                                errorMessages += `${errors[key].join('<br>')}<br>`;
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
