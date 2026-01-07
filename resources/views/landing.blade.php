<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RAY PRANA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/script-number.jsç.js') }}"></script>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  </head>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold custom-primary" href="#home">RAY PRANA SKYLINE</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                 
                    <li class="nav-item"><a class="nav-link" href="#paket-tour">Paket</a></li>
                    <li class="nav-item"><a class="nav-link" href="#ulasan">Ulasan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#dokumentasi">Dokumentasi</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tentang-kami">Tentang Kami</a></li>
                </ul>
                <form class="d-flex" id="search-form">
    <button class="btn btn-outline-primary me-2" type="submit">Home</button>
    
    @auth
        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                <i class="fas fa-user me-1"></i> {{ Auth::user()->name }}
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
    {{-- Cek apakah user adalah ADMIN --}}
    @if(Auth::user()->role === 'admin') 
        <li>
            <a class="dropdown-item fw-bold text-primary" href="{{ url('/dashboard') }}">
                <i class="fas fa-tachometer-alt me-2"></i> Dashboard Admin
            </a>
        </li>
        <li><hr class="dropdown-divider"></li> {{-- Garis pemisah --}}
    @endif

    {{-- Menu ini muncul untuk SEMUA user (termasuk admin) --}}
    <li>
        <a class="dropdown-item" href="#">
            <i class="fas fa-history me-2"></i> Riwayat Transaksi
        </a>
    </li>
    
    <li><hr class="dropdown-divider"></li> {{-- Garis pemisah --}}

    {{-- Tombol Logout --}}
    <li>
        <a class="dropdown-item text-danger" href="#" 
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
           <i class="fas fa-sign-out-alt me-2"></i> Logout
        </a>
    </li>
</ul>
        </div>
    @else
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#authModal">
            Login / Daftar
        </button>
    @endauth
</form>
            </div>
        </div>
    </nav>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

 <section id="home" class="d-flex justify-content-center align-items-end text-center vh-100 position-relative text-white" 
    style="background: url('img/1.jpg') center/cover no-repeat;">

    <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark bg-opacity-50"></div>
    
    <div class="position-relative z-2 pb-5 mb-5 container">
        <h1 class="text-uppercase fw-bold display-4">Welcome to <span style="color: cyan;">RAY PRANA</span> SKYLINE</h1>
        
        <p class="lead fs-4 mt-3 mb-4"> Temukan pengalaman perjalanan tak terlupakan dengan layanan terbaik dari Pesawat kami. <br> 
            Dari pantai eksotis hingga petualangan seru, kami siap membawa Anda ke destinasi impian. Yuk, mulai perjalananmu sekarang!
        </p>
        
        <a href="{{ route('harga') }}" class="btn btn-lg px-5 py-3 fw-bold" style="background-color: cyan; color: black; border-radius: 30px;">
            Book Now
        </a>
    </div>
</section>



<!-- Best Vacation Plan Section -->
<section id="paket-tour" class="paket-section py-5">
    <div class="container text-center">
        <h2 class="mb-2">Best Vacation Plan</h2>
        <p class="mb-5">Plan your perfect vacation with our travel agency. Choose among hundreds of all-inclusive offer!</p>
        <div class="row justify-content-center">
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="vacation-card">
                    <img src="{{ asset('img/6.jpg') }}" alt="Bali, Indonesia" class="img-fluid">
                    <div class="vacation-info" data-location="Bali">
                        <h5>SEOUL</h5>
                        <p class="price">Rp 5.850.000/PAX</p>
                        <p class="deskripsi">Seoul adalah ibu kota Korea Selatan yang modern dan dinamis, sekaligus pusat budaya, teknologi, dan hiburan. Kota ini memadukan istana bersejarah seperti Gyeongbokgung dengan gedung pencakar langit, kawasan belanja populer, serta budaya K-Pop dan kuliner khas Korea yang mendunia.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span><i class="fas fa-plane me-1"></i> 7 Day Trip</span>
                            <span><i class="fas fa-star me-1"></i> 4.5</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="vacation-card" data-location="Yogyakarta">
                    <img src="{{ asset('img/7.jpg') }}" alt="Yogyakarta, Indonesia" class="img-fluid">
                    <div class="vacation-info">
                        <h5>TOKYO </h5>
                        <p class="price">Rp 12.700.000/PAX</p>
                        <p class="deskripsi">Tokyo adalah ibu kota Jepang yang modern dan sibuk, dikenal sebagai pusat teknologi, budaya pop, dan ekonomi. Kota ini memadukan tradisi seperti kuil dan taman bersejarah dengan gedung tinggi, distrik belanja terkenal, serta kuliner khas Jepang yang beragam.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span><i class="fas fa-plane me-1"></i> 7 Day Trip</span>
                            <span><i class="fas fa-star me-1"></i> 4.5</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="vacation-card">
                    <img src="{{ asset('img/8.jpg') }}" alt="Lombok, Indonesia" class="img-fluid">
                    <div class="vacation-info" data-location="Lombok">
                        <h5>BANGKOK</h5>
                        <p class="price">Rp 8.650.000/PAX</p>
                        <p class="deskripsi">Bangkok adalah ibu kota Thailand yang ramai dan penuh warna, terkenal dengan perpaduan budaya tradisional dan kehidupan modern. Kota ini memiliki kuil-kuil indah, pasar tradisional, pusat perbelanjaan besar, serta kuliner khas Thailand yang sangat beragam.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span><i class="fas fa-plane me-1"></i> 7 Day Trip</span>
                            <span><i class="fas fa-star me-1"></i> 4.5</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="vacation-card" data-location="Malang">
                    <img src="{{ asset('img/9.jpg') }}" alt="Malang, Indonesia" class="img-fluid">
                    <div class="vacation-info">
                        <h5>KUALA LUMPUR</h5>
                        <p class="price">Rp 3.500.000/PAX</p>
                        <p class="deskripsi">Kuala Lumpur adalah ibu kota Malaysia yang modern dan multikultural, dikenal dengan Menara Kembar Petronas sebagai ikonnya. Kota ini memadukan budaya Melayu, Tionghoa, dan India dengan pusat perbelanjaan, kuliner beragam, serta perkembangan ekonomi yang pesat.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span><i class="fas fa-plane me-1"></i> 7 Day Trip</span>
                            <span><i class="fas fa-star me-1"></i> 4.5</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="#" class="btn btn-find-more mt-3">See More</a>
    </div>
</section>

    <!-- Ulasan -->
<section id="ulasan" class="py-5" style="background-color:#f8f9fa;">
    <div class="container">
        <div class="row">
            <!-- Form Ulasan -->
            <div class="col-md-4">
                <div class="p-4 text-white rounded" style="background-color: cyan;">
                    <h3 class="text-center">TULIS ULASAN ANDA</h3>
                    <form id="ulasanForm">
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" id="nama" class="form-control" placeholder="Nama" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Institusi (Opsional)</label>
                            <input type="text" id="institusi" class="form-control" placeholder="Institusi">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" id="email" class="form-control" placeholder="Email" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Testimonial</label>
                            <textarea id="testimonial" class="form-control" rows="3" placeholder="Tulis ulasan Anda..." required></textarea>
                        </div>

                        <!-- Bintang Rating -->
                        <div style="text-align: center; margin-top: 20px;">
                            <label class="form-label">Seberapa puas dengan layanan kami?</label>
                            <div class="rating" style="display: flex; justify-content: center; gap: 5px;">
                                <input type="radio" id="star1" name="rating" value="1" style="display: none;">
                                <label for="star1" class="star" data-value="1" style="font-size: 2rem; cursor: pointer;">&#9733;</label>

                                <input type="radio" id="star2" name="rating" value="2" style="display: none;">
                                <label for="star2" class="star" data-value="2" style="font-size: 2rem; cursor: pointer;">&#9733;</label>

                                <input type="radio" id="star3" name="rating" value="3" style="display: none;">
                                <label for="star3" class="star" data-value="3" style="font-size: 2rem; cursor: pointer;">&#9733;</label>

                                <input type="radio" id="star4" name="rating" value="4" style="display: none;">
                                <label for="star4" class="star" data-value="4" style="font-size: 2rem; cursor: pointer;">&#9733;</label>

                                <input type="radio" id="star5" name="rating" value="5" style="display: none;">
                                <label for="star5" class="star" data-value="5" style="font-size: 2rem; cursor: pointer;">&#9733;</label>
                            </div>
                        </div>

                        <button type="submit" class="btn w-100 mt-3" style="background-color: #f8f9fa;">Kirim Testimonial</button>
                    </form>
                </div>
            </div>

            <!-- Bagian Tampilan Ulasan -->
            <div class="col-md-8">
                <h3 class="text-center mb-4">PENDAPAT ANDA TENTANG KAMI</h3>
                <div class="swiper mySwiper" style="height: 400px; position: relative;">
                    <div class="swiper-wrapper" id="ulasan-wrapper">
                        <div class="swiper-slide">
                            <p>Belum ada ulasan yang tersedia.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Dokumentasi Section -->
<section id="dokumentasi" class="gallery-section py-5">
    <div class="container text-center">
        <h2 class="m-4">Destinasi yang mungkin anda suka 📸</h2>
        <p>INTIP MOMEN-MOMEN INDAH DARI PERJALANAN BERSAMA RAY PRANA 🍃</p>
        <div class="row gallery-grid">
            <div class="col-12 col-md-6 col-lg-4 col-img">
                <span class="gallery-number"></span>
                <img src="{{ asset('img/11.jpg') }}" alt="Trip 1" />
            </div>
            <div class="col-12 col-md-6 col-lg-4 col-img">
                <span class="gallery-number"></span>
                <img src="{{ asset('img/12.jpg') }}" alt="Trip 2" />
            </div>
            <div class="col-12 col-md-6 col-lg-4 col-img">
                <span class="gallery-number"></span>
                <img src="{{ asset('img/13.jpg') }}" alt="Trip 3" />
            </div>
            <div class="col-12 col-md-6 col-lg-4 col-img">
                <span class="gallery-number"></span>
                <img src="{{ asset('img/14.jpg') }}" alt="Trip 4" />
            </div>
            <div class="col-12 col-md-6 col-lg-4 col-img">
                <span class="gallery-number"></span>
                <img src="{{ asset('img/15.jpg') }}" alt="Trip 5" />
            </div>
            <div class="col-12 col-md-6 col-lg-4 col-img">
                <span class="gallery-number"></span>
                <img src="{{ asset('img/16.jpg') }}" alt="Trip 6" />
            </div>
        </div>
    </div>
</section>

<!-- Tentang Kami Section -->
<section class="about-section py-5" id="tentang-kami">
    <div class="container">
        <p class="text-center m-4 fs-1 fw-bold">Tentang Kami</p>
        <div class="row align-items-center">
            <div class="col-lg-6 text-center">
                <img class="img-thumbnail rounded-5" src="{{ asset('img/17.jpg') }}" alt="Enka Tour Team" />
            </div>
            <div class="col-lg-6">
                <div class="row about-container g-4">
                    <div class="col-md-6">
                        <div class="about-box">
                            <i class="fas fa-address-book"></i>
                            <h3>Contact</h3>
                            <p>Hubungi Kami</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="about-box">
                            <i class="fas fa-headset"></i>
                            <h3>Layanan</h3>
                            <p>Full Support 24 Jam</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="about-box">
                            <i class="fas fa-check-circle"></i>
                            <h3>Kerjasama</h3>
                            <p>Saling Menguntungkan</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="about-box">
                            <i class="fas fa-cart-arrow-down"></i>
                            <h3>Investor</h3>
                            <p>Koneksi kami dengan para investor</p>
                        </div>
                    </div>
                </div>
                <div class="about-paragraf">
                    <p>
                        Setiap perjalanan bersama RAY PRANA sangatlah berharga.
Dapatkan miles saat Anda terbang bersama kami dan maskapai partner kami,
serta berbagai keuntungan eksklusif dan istimewa untuk Anda.
Jangan tunggu lagi, segera daftar sekarang!🌍.
                    </p>
                   
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="text-center py-3 bg-white shadow" data-bs-theme="light" id="TentangEnkaTour">
        <div class="container-fluid ">
            <span class="navbar-text">
                <p><b>&copy;2026 Ray Prana Skyline. All Rights Reserved.</b></p>
                <a href="#" class="kontak mx-2">Instagram</a>
                <a href="#" class="kontak mx-2">Facebook</a>
                <a href="#" class="kontak mx-2">Kontak</a>
                <a href="#" class="kontak mx-2">Alamat</a>
            </span>
        </div>
    </footer>

<!-- SwiperJS dan FontAwesome -->
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<script>
    var swiper = new Swiper(".mySwiper", {
    direction: "vertical",
    slidesPerView: 3,
    spaceBetween: 50,
    mousewheel: true,
    loop: true,
    autoplay: {
    delay: 1000,
    disableOnInteraction: false,
},
    breakpoints: {
    640: { slidesPerView: 1 },
    768: { slidesPerView: 2 },
    1024: { slidesPerView: 3 },
},
});
</script>
<div class="modal fade" id="authModal" tabindex="-1" aria-labelledby="authModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title fw-bold" id="authModalLabel">Masuk atau Daftar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
                <ul class="nav nav-pills nav-fill mb-4" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active rounded-pill" id="pills-login-tab" data-bs-toggle="pill" data-bs-target="#pills-login" type="button" role="tab">Login</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link rounded-pill" id="pills-register-tab" data-bs-toggle="pill" data-bs-target="#pills-register" type="button" role="tab">Daftar</button>
                    </li>
                </ul>

                <div class="tab-content" id="pills-tabContent">
                    
                    <div class="tab-pane fade show active" id="pills-login" role="tabpanel">
                        {{-- PERHATIKAN ACTION INI: Mengarah ke 'login.submit' --}}
                        <form action="{{ route('login.submit') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Email Address</label>
                                <input type="email" name="email" class="form-control" placeholder="name@example.com" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 fw-bold">Masuk Sekarang</button>
                        </form>
                    </div>

                    <div class="tab-pane fade" id="pills-register" role="tabpanel">
                        {{-- PERHATIKAN ACTION INI: Mengarah ke 'register.submit' --}}
                        <form action="{{ route('register.submit') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email Address</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" required>
                                <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="password" required>
</div>

<div class="mb-3">
    <label for="password_confirmation" class="form-label">Ulangi Password</label>
    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Ketik ulang password..." required>
</div>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 fw-bold">Daftar Akun Baru</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
@if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert" 
         style="position: fixed; top: 20px; right: 20px; z-index: 9999; max-width: 400px; box-shadow: 0 4px 8px rgba(0,0,0,0.2);">
        <strong>Ada Masalah!</strong>
        <ul class="mb-0 mt-2">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
</html>