
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
    <link rel="stylesheet" href="//cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        @include('layouts.admin_sidebar')
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('layouts.admin_navbar')
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="{{ route('admin.skill.create') }}" class="btn btn-primary">Tambah Skill</a>
                    </div>

                    <table id="myTable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th style="text-align: center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($skills as $skill)
                                <tr>
                                    <td>{{ $skill->id }}</td>
                                    <td>{{ $skill->title }}</td>
                                    <td>{{ $skill->description }}</td>
                                    <td>
                                        <div class="progress" role="progressbar" aria-label="Animated striped example" aria-valuenow="{{ $skill->status }}" aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: {{ $skill->status }}%"></div>
                                        </div>
                                    </td>
                                    <td><img src="{{ asset('storage/' . $skill->image) }}" alt="Image" style="max-width: 60px;"></td>

                                     <td class="py-2 px-4 border">
                                    <!-- Tombol Edit -->
                                    <a href="{{ route('admin.edit_skill', $skill->id) }}" class="btn btn-warning text-white" onclick="return confirmEdit()">Edit</a>
                                
                                    <!-- Form untuk Delete -->
                                    <form id="deleteForm-{{ $skill->id }}" action="{{ route('admin.delete_skill', $skill->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                
                                        <!-- Tombol Delete -->
                                        <button type="button" class="btn btn-danger text-white" onclick="confirmDelete({{ $skill->id }})">Delete</button>
                                    </form>
                                </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- End of Main Content -->
            </div>
            <!-- End of Content Wrapper -->
        </div>
        <!-- End of Page Wrapper -->

    </div>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <!-- Modal content -->
    </div>
</body>
</html>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

    <!-- DataTables JS -->


  
     
   
    <!-- SweetAlert2 JS -->
    <script src="//cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.js" ></script>


    <script type="text/javascript">
       let table = new DataTable('#myTable');
     $('#myTable').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('admin.skill.index') }}", // Mengambil data melalui route
    columns: [
        { data: 'id', name: 'id' },  // Mengambil 'id' dari data JSON dan menampilkan di kolom pertama
        { data: 'title', name: 'title' },  // Mengambil 'title' dari data JSON dan menampilkan di kolom kedua
        { data: 'description', name: 'description' },  // Mengambil 'description' dan menampilkan di kolom ketiga
        {
            data: 'status',  // Mengambil 'status' dan menampilkan di kolom keempat
            name: 'status',
            render: function (data) {
                return '<div class="progress"><div class="progress-bar" style="width:' + data + '%;">' + data + '%</div></div>';
            }
        },
        {
            data: 'action',  // Kolom aksi, berisi tombol untuk Edit dan Delete
            name: 'action', 
            orderable: false,  // Tidak dapat diurutkan
            searchable: false,  // Tidak dapat dicari
            render: function(data, type, row) {
                return `
                    <a href="/admin/skill/${row.id}/edit" class="btn btn-warning btn-sm">Edit</a>
                    <form action="/admin/skill/${row.id}" method="POST" style="display:inline;" id="deleteForm-${row.id}">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete(${row.id})">Delete</button>
                    </form>
                `;
            }
        }
    ]
});

    
       
        function confirmDelete(id) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/admin/skill/${id}`,
                        type: 'DELETE',
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            $('#myTable').DataTable().ajax.reload();
                            Swal.fire('Deleted!', 'Skill berhasil dihapus.', 'success');
                        }
                    });
                }
            });
        }
    
    </script>