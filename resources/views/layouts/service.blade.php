<section id="service" class="py-5  text-white" style="background-color: aliceblue">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-4 fw-bold text-warning">What I Do?</h2>
            <p class="text-muted">Explore my skills and expertise</p>
        </div>

        <div class="row justify-content-center g-4">
            @foreach ($about as $item)
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="card_service shadow-lg border-0 rounded-lg overflow-hidden hover-zoom">
                    <div class="card-body text-center bg-white p-4">
                        @if ($item->logo)
                            <img src="{{ asset('storage/' . $item->logo) }}" alt="{{ $item->work }}" 
                                class="img-fluid mb-3" style="width: 90px; height: 90px; object-fit: cover; transition: all 0.3s;">
                        @else
                            <i class="bi bi-briefcase-fill mb-3" style="font-size: 60px; color: #42a5f5;"></i>
                        @endif
                        <h5 class="card-title fw-bold text-warning"></h5>
                    </div>
                    <div class="card-footer bg-warning text-dark text-center py-3">
                        <a href="#" class="text-dark fw-bold text-decoration-none">{{ $item->work }}</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
