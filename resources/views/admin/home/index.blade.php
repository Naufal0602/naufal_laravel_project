
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        @include('layouts.admin_sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                @include('layouts.admin_navbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Home</h1>
                        <a href="{{ route('admin.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="btn-susces"></i>Tambah home</a>
                    </div>
                
                    <table id="aboutTable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Sub Judul</th>
                                <th>Work</th>
                                <th>Sub Work</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach ($home as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->judul }}</td>
                                <td>{{ $item->sub_subjudul }}</td>
                                <td>{{ $item->work }}</td>
                                <td>{{ $item->sub_work }}</td>
                                <td>
                                    @if ($item->img)
                                        <img src="{{ asset('storage/' . $item->img) }}" alt="Image for {{ $item->judul }}" width="100">
                                    @else
                                        <span>No image uploaded</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.edit_home', $item->id ) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form id="deleteForm-{{ $item->id }}" action="{{ route('admin.delete_home', $item->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $item->id }})">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/datatables.net/js/jquery.dataTables.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                    
                    <script>
                        $(document).ready(function() {
                            $('#aboutTable').DataTable({
                                "paging": true,        // Enable pagination
                                "searching": true,     // Enable searching
                                "ordering": true,      // Enable sorting
                                "info": true,          // Enable table info (like "showing 1 to 10 of 50")
                                "lengthChange": true,  // Allow changing page length
                                "autoWidth": false     // Disable auto width calculation
                            });
                        });
                    
                        // Function to show SweetAlert confirmation for delete
                        function confirmDelete(id) {
                            Swal.fire({
                                title: 'Are you sure?',
                                text: "You won't be able to revert this!",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Yes, delete it!'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    document.getElementById('deleteForm-' + id).submit();
                                }
                            });
                        }
                    </script>
</body>
</html>