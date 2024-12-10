<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Work</title>
    <link href="{{ asset('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>
<body>
    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.update_about', $about->id) }}" method="post" class="form" enctype="multipart/form-data">
        @csrf
        @method('PUT') <!-- Method PUT digunakan untuk update data -->
    
        <div class="table">
            <div>
                <label for="image">Image:</label>
                <input type="file" name="img" id="img">
                <!-- Menampilkan gambar saat ini jika ada -->
                @if(isset($about->img))
                    <div>
                        <img src="{{ asset('storage/' . $about->img) }}" alt="Current Image" width="100">
                    </div>
                @endif
            </div>
    
            <div>
                <label for="judul">Judul:</label>
                <input type="text" name="judul" id="judul" value="{{ $about->judul }}" class="form-control mb-2" required>
            </div>
    
            <div>
                <label for="sub_subjudul">Sub Subjudul:</label>
                <input type="text" name="sub_subjudul" id="sub_subjudul" value="{{ $about->sub_subjudul }}" class="form-control mb-2">
            </div>
    
            <div>
                <label for="work">Work:</label>
                <input type="text" name="work" id="work" value="{{ $about->work }}" class="form-control mb-2" required>
            </div>
    
            <div>
                <label for="sub_work">Sub Work:</label>
                <input type="text" name="sub_work" id="sub_work" value="{{ $about->sub_work }}" class="form-control mb-2">
            </div>
        </div>
        
        
        <div class="form-group">
            <label for="logo">Logo</label>
            <input type="file" class="form-control" id="logo" name="logo">
            @if ($about->logo)
                <img src="{{ asset('storage/' . $about->logo) }}" alt="Current Logo" width="100">
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
    
    </form>
</body>
</html>
