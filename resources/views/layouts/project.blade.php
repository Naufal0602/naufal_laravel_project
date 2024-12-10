<section class="page-section portfolio" id="portfolio">
    <div class="container">
        <!-- Portfolio Section Heading -->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">My Project</h2>
        <!-- Icon Divider -->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Portfolio Grid Items -->
        <div class="portfolio-slider">
            @foreach($projects as $project)
                <div class="portfolio-item text-center mx-2">
                    <div class="card shadow-sm">
                        <div class="img-wrapper position-relative">
                            <img src="{{ asset('storage/' . $project->image) }}" class="card-img-top img-fluid" alt="{{ $project->name }}">
                            <div class="overlay d-flex justify-content-center align-items-center">
                                <div class="overlay-infos text-center">
                                    <h5 class="text-white">{{ $project->name }}</h5>
                                    <a href="{{ $project->link }}" class="text-white" target="_blank"><i class="ti-link"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{ $project->description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
    </div>
</section>
