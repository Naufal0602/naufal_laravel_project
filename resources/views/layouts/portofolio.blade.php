<section class="page-section portfolio bg-light py-5" id="certificates">
    <div class="container">
        <!-- Section Heading -->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-4">My Certificates</h2>
        <!-- Icon Divider -->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-certificate text-warning"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Certificate Grid Items -->
        <div class="row">
            @foreach($certificates as $certificate)
                <div class="col-lg-4 col-md-6 mb-4">
                    <a href="{{ asset('storage/' . $certificate->file) }}" target="_blank" class="card-link">
                        <div class="card shadow-lg border-0">
                            <div class="card-img-wrapper position-relative">
                                <img src="{{ asset('storage/' . $certificate->image) }}" 
                                     class="card-img-top img-fluid" 
                                     alt="{{ $certificate->name }}">
                            </div>
                            <div class="card-body text-center">
                                <h5 class="card-title text-secondary font-weight-bold">{{ $certificate->name }}</h5>
                                <p class="card-text">{{ $certificate->description }}</p>
                                <small class="text-muted">Issued on: {{ $certificate->issued_at }}</small>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>