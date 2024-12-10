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
    <form action="{{ route('admin.certificates.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">Certificate Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
        </div>

        <div class="form-group">
            <label for="issued_by">Issued By</label>
            <input type="text" class="form-control" id="issued_by" name="issued_by" value="{{ old('issued_by') }}" required>
        </div>

        <div class="form-group">
            <label for="issued_at">Issued At</label>
            <input type="date" class="form-control" id="issued_at" name="issued_at" value="{{ old('issued_at') }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
        </div>

        <div class="form-group">
            <label for="file">Upload Certificate File (optional)</label>
            <input type="file" class="form-control-file" id="file" name="file">
        </div>

        <div class="form-group">
            <label for="image">Image (Optional)</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*">
        </div>
        

        <button type="submit" class="btn btn-primary">Add Certificate</button>
        <a href="{{ route('admin.certificates.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</body>
</html>