<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Work</title>
    <link href="{{ asset('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>
<body>
    <form action="{{ route('admin.submit_about') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" name="judul" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="sub_subjudul">Sub Judul</label>
            <input type="text" name="sub_subjudul" class="form-control">
        </div>
        <div class="form-group">
            <label for="work">Work</label>
            <input type="text" name="work" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="sub_work">Sub Work</label>
            <input type="text" name="sub_work" class="form-control">
        </div>
        <div class="form-group">
            <label for="img">Upload Gambar</label>
            <input type="file" name="img" class="form-control" >
        </div>
        <div class="form-group">
            <label for="logo">Logo</label>
            <input type="file" class="form-control" id="logo" name="logo">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    
</body>
</html>
