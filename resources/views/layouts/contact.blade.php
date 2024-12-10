<!-- Contact 5 - Bootstrap Brain Component -->
<section class="py-3 py-md-5 py-xl-8" id="contact">
  <div class="container">
      <div class="row">
          <div class="col-12 col-md-10 col-lg-8">
              <h3 class="fs-5 mb-2 text-secondary text-uppercase">Contact</h3>
          </div>
      </div>
  </div>

  <div class="container">
      <div class="row gy-4 gy-md-5 gy-lg-0 align-items-md-center">
          <div class="col-12 col-lg-6">
              <div class="border overflow-hidden">
                  <!-- Form Kontak -->
                  <form id="contactForm" action="{{ route('admin.contact.store') }}" method="POST">
                      @csrf
                      <div class="row gy-4 gy-xl-5 p-4 p-xl-5">
                          <div class="col-12">
                              <label for="name" class="form-label">Full Name <span class="text-danger">*</span></label>
                              <input type="text" class="form-control" id="name" name="name" value="" required>
                          </div>
                          <div class="col-12 col-md-6">
                              <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                              <div class="input-group">
                                  <span class="input-group-text">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                          <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                                      </svg>
                                  </span>
                                  <input type="email" class="form-control" id="email" name="email" value="" required>
                              </div>
                          </div>
                          <div class="col-12">
                              <label for="mail" class="form-label">Message <span class="text-danger">*</span></label>
                              <textarea class="form-control" id="mail" name="mail" rows="3" required></textarea>
                          </div>
                          <div class="col-12">
                              <div class="d-grid">
                                  <button type="submit" class="btn btn-primary" id="submitBtn">Kirim Pesan</button>            
                              </div>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
          <div class="col-12 col-lg-6">
              <div class="row justify-content-xl-center">
                  <div class="col-12 col-xl-11">
                      <!-- Google Maps iframe -->
                      <div class="embed-responsive embed-responsive-16by9">
                          <iframe 
                              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.489424438151!2d106.75623947480648!3d-6.58592089340768!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c5457e0e3bcf%3A0x58481d58737539c0!2sSMK%20Negeri%201%20Ciomas!5e0!3m2!1sid!2sid!4v1732850821110!5m2!1sid!2sid" 
                              width="100%" 
                              height="500px" 
                              style="border: none;" 
                              loading="lazy">
                          </iframe>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
