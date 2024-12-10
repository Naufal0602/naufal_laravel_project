@php
    $item = $about->first(); // Ambil item pertama dari koleksi
@endphp

@if ($item)
<section id="about-skills" class="min-vh-100 d-flex align-items-center bg-light" style="font-family: 'Poppins', sans-serif;">
    <div class="container py-5">
        <div class="row align-items-center">
            <!-- Kolom Kiri: About -->
            <div class="col-md-6 text-center text-md-start mb-5 mb-md-0">
                <h1 class="display-5 text-primary fw-bold mt-4" style="font-size: 2.5rem;">{{ $item->judul }}</h1>
                <h3 class="text-secondary mb-3" style="font-size: 1.5rem;">{{ $item->sub_subjudul }}</h3>
                <p class="text-muted fs-5 mb-4" style="font-size: 1.1rem;">
                    {{ $item->sub_work }}
                </p>
                <a href="#contact" class="btn btn-primary btn-lg px-4 py-3 shadow rounded-pill" style="font-size: 1.1rem;">
                    <i class="bi bi-envelope me-2"></i> Contact Me
                </a>
            </div>

            <!-- Kolom Kanan: Skills -->
            <div class="col-md-6">
                <div class="text-center text-md-start">
                    <h6 class="subtitle text-uppercase text-primary mb-2" style="font-size: 1.2rem;">Skills</h6>
                    <h2 class="section-title font-weight-bold text-dark mb-4" style="font-size: 2rem;">Why Choose Me</h2>
                    <p class="text-muted mb-4" style="font-size: 1.1rem;">
                        Ini adalah skill yang saya kuasai 
                    </p>
                </div>
                <div class="row">
                    @foreach ($skills as $skill)
                        <div class="col-12 mb-4">
                            <h6 class="text-dark fw-bold" style="font-size: 1.3rem;">{{ $skill->title }}</h6>
                            <div class="progress mb-2" style="height: 20px;">
                                <div 
                                    class="progress-bar bg-primary progress-bar-striped progress-bar-animated" 
                                    role="progressbar" 
                                    style="width: {{ $skill->status }}%;" 
                                    aria-valuenow="{{ $skill->status }}" 
                                    aria-valuemin="0" 
                                    aria-valuemax="100">
                                    {{ $skill->status }}%
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif
