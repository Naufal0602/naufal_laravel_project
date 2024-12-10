<!-- resources/views/dashboard.blade.php -->
<section class="section py-5">
    <div class="container text-center">
        <h6 class="subtitle text-uppercase text-muted">Skills</h6>
        <h6 class="section-title mb-4 font-weight-bold">Why Choose Me</h6>
        <p class="mb-5 pb-4 text-muted">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. In alias dignissimos. <br>
            Rerum commodi corrupti, temporibus non quam.
        </p>
  
        <div class="row text-left">
            @foreach ($skills as $skill)
                <div class="col-md-6 mb-4">
                    <h6 class="mb-3 font-weight-bold">{{ $skill->title }}</h6>
                    <div class="progress">
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
                    <!-- Menampilkan deskripsi skill -->
                    <p class="text-muted mt-2">{{ $skill->description }}</p>
                </div>
            @endforeach
        </div>
    </div>
  </section>
  