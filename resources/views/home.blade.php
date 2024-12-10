@include('layouts.header')

    @include('layouts.navbar')


    @foreach ($home as $item)
    <header class="header" id="home">
        <div class="container">
            <div class="infos">
                <h6 class="title">{{ $item->sub_subjudul }}</h6>
                <h6 class="subtitle font-bold">{{ $item->judul }}</h6>  
    
                <div class="socials mt-4">
                    <a class="social-item" href="https://www.instagram.com/nanti_laper/profilecard/?igsh=MXdkdmE3Z3MxYzVwZQ=="><i class="ti-facebook"></i></a>
                    <a class="social-item" href="https://www.instagram.com/nanti_laper/profilecard/?igsh=MXdkdmE3Z3MxYzVwZQ=="><i class="ti-instagram"></i></a>
                    <a class="social-item" href="https://www.instagram.com/nanti_laper/profilecard/?igsh=MXdkdmE3Z3MxYzVwZQ=="><i class="ti-github"></i></a>
                    <a class="social-item" href="https://www.instagram.com/nanti_laper/profilecard/?igsh=MXdkdmE3Z3MxYzVwZQ=="><i class="ti-twitter"></i></a>
                </div>
            </div>              
            
                <div class="img-holder text-center" >
                    <img 
                        src="{{ asset('storage/' . $item->img) }}" 
                        alt="Image for {{ $item->judul }}" 
                        class="img-fluid rounded shadow" 
                        style="height: 100%; width: 100%; object-fit: cover;"
                    >
                </div>
            
            
                
        </div>  
    </header>
    @endforeach
    


        
    
    @include('layouts.about')


    <!-- Service section -->
    @include('layouts.service')
    <!-- End of Sectoin -->

    <!-- Skills section -->
   
    <!-- End of Skills sections -->

    @include('layouts.project')

    <!-- Experience section -->
    <!-- Portfolio section -->

    @include('layouts.portofolio')
<!-- End of portfolio section -->
   
    
   
 <!-- Contact Section -->
    @include('layouts.contact')

   
    <!-- End of Contact Section -->
    <footer>
        <div class="container">
            <div class="row">
                <!-- Kolom kiri (Hak Cipta) -->
                <div class="col-12 col-md-6">
                    <p>&copy; 2024 Your Company. All rights reserved.</p>
                </div>
                
                <!-- Kolom kanan (Tautan Sosial) -->
                <div class="col-12 col-md-6">
                    <ul class="list-inline text-md-end">
                        <li class="list-inline-item">
                            <a href="https://www.instagram.com/nanti_laper/profilecard/?igsh=MXdkdmE3Z3MxYzVwZQ==" target="_blank">
                                <i class="ti-facebook"></i> Facebook
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://www.instagram.com/nanti_laper/profilecard/?igsh=MXdkdmE3Z3MxYzVwZQ==" target="_blank">
                                <i class="ti-instagram"></i> Instagram
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://www.instagram.com/nanti_laper/profilecard/?igsh=MXdkdmE3Z3MxYzVwZQ==" target="_blank">
                                <i class="ti-github"></i> GitHub
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://www.instagram.com/nanti_laper/profilecard/?igsh=MXdkdmE3Z3MxYzVwZQ==" target="_blank">
                                <i class="ti-twitter"></i> Twitter
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    
    
	
	<!-- core  -->
    <script src="{{ asset('user/vendors/jquery/jquery-3.4.1.js') }}"></script>
    <script src="{{ asset('user/vendors/bootstrap/bootstrap.bundle.js') }}"></script>
    <!-- bootstrap 3 affix -->
	<script src="{{ asset('user/vendors/bootstrap/bootstrap.affix.js') }}"></script>
    <!-- steller js -->
    <script src="{{ asset('user/js/steller.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   
</html>

<script>
    $(document).ready(function(){
     $('.portfolio-slider').slick({
         slidesToShow: 3,       // Menampilkan 3 item sekaligus
         slidesToScroll: 1,     // Bergeser 1 item per klik
         arrows: true,          // Tombol navigasi
         dots: true,            // Tampilkan indikator bulatan di bawah
         autoplay: true,        // Otomatis berjalan
         autoplaySpeed: 3000,   // Interval per 3 detik
         responsive: [
             {
                 breakpoint: 768, // Untuk layar kecil
                 settings: {
                     slidesToShow: 1, // Tampilkan 1 item saja
                     arrows: false    // Hilangkan tombol panah
                 }
             },
             {
                 breakpoint: 992, // Untuk tablet
                 settings: {
                     slidesToShow: 2 // Tampilkan 2 item
                 }
             }
         ]
     });
 });



// Pastikan SweetAlert2 dan jQuery sudah ter-load

$(document).ready(function() {
        $('#contactForm').on('submit', function(e) {
            e.preventDefault();  // Menghentikan submit form biasa

            // Menampilkan SweetAlert2 konfirmasi sebelum submit
            Swal.fire({
                title: 'Apakah Anda yakin ingin mengirim pesan?',
                text: "Pastikan data yang Anda masukkan sudah benar.",
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Ya, Kirim!',
                cancelButtonText: 'Tidak, Batalkan',
            }).then((result) => {
                if (result.isConfirmed) {
                    var form = $('#contactForm');
                    var formData = form.serialize();  // Mengambil data dari form

                    $.ajax({
                        url: form.attr('action'),  // Mengambil URL action dari form
                        method: 'POST',
                        data: formData,  // Mengirimkan data form
                        success: function(response) {
                            // Menampilkan SweetAlert2 jika berhasil
                            Swal.fire({
                                icon: 'success',
                                title: 'Pesan Terkirim!',
                                text: 'Pesan Anda telah berhasil dikirim.',
                                confirmButtonText: 'OK'
                            });
                            form[0].reset(); // Mereset form setelah berhasil
                        },
                        error: function(xhr, status, error) {
                            // Menampilkan SweetAlert2 jika terjadi error
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Terjadi kesalahan, coba lagi nanti.',
                                confirmButtonText: 'OK'
                            });
                        }
                    });
                } else {
                    // Jika memilih Tidak
                    Swal.fire({
                        icon: 'info',
                        title: 'Pembatalan',
                        text: 'Pesan Anda tidak terkirim.',
                        confirmButtonText: 'OK'
                    });
                }
            });
        });
    });

 </script>