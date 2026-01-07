<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    
    <style>
        .info-card {
            transition: transform 0.2s;
            border: none;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        }
        .info-card:hover {
            transform: translateY(-5px); /* Efek naik saat di-hover */
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }
        .icon-blue {
            color: #0dcaf0; /* Warna biru muda (Cyan) sesuai gambar */
        }
        /* CSS Tambahan untuk Destinasi */
.destination-card img {
    height: 180px; /* Tinggi gambar tetap agar rapi barisnya */
    width: 100%;
    object-fit: cover; /* Agar gambar tidak gepeng */
    transition: transform 0.3s ease;
}

.destination-card:hover img {
    transform: scale(1.05); /* Efek zoom sedikit saat mouse diarahkan */
}

.destination-card .card-title {
    color: #0056b3; /* Warna biru mirip Garuda */
}

.destination-card:hover {
    box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
}
    </style>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/script2.js') }}"></script>
</head>
<body class="bg-light">

    <div class="d-flex">
        <div id="sidebar" class="bg-dark text-white p-3" style="width: 250px; min-height: 100vh;">
            <div class="text-center mb-4">
                <h2 class="fw-bold" style="color: #0dcaf0;">RAY PRANA <strong class="text-white">SKYLINE</strong></h2>
                <h6 class="mb-0 text-secondary">RAY PRANA MANAGEMENT</h6>
            </div>
      
            <small class="text-secondary text-uppercase">Menu</small>
            <ul class="nav flex-column mb-4">
                <li class="nav-item">
                    <a class="d-block py-2 px-3 text-white text-decoration-none rounded hover-bg" href="{{ url('/') }}">
                        <i class="bi bi-house-door me-2"></i>Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#destinasi"><i class="bi bi-geo-alt me-2"></i>Destinasi Wisata</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#paket"><i class="bi bi-suitcase me-2"></i>Paket Tour</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#dokumentasi"><i class="bi bi-collection me-2"></i>Dokumentasi</a>
                </li>
            </ul>
      
            <small class="text-secondary text-uppercase">Konfigurasi</small>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link text-white" href="#akun"><i class="bi bi-gear me-2"></i>Akun</a>
                </li>
            </ul>
        </div>
      
        <div class="flex-grow-1">
            <nav class="navbar navbar-light bg-white shadow-sm mb-4 px-3">
                <button id="toggleBtn" class="btn">
                    <i class="bi bi-list" style="font-size: 25px"></i>
                </button>
                <div class="ms-auto">
                   <span class="fw-bold text-secondary">Admin Panel</span>
                </div>
            </nav>

            <div id="home" class="container-fluid px-4">
                
                <div class="text-center mb-5">
                    <h2 class="fw-bold text-secondary">Tentang Ray Prana Skyline</h2>
                </div>

                <div class="row align-items-center">
                    <div class="col-lg-6 mb-4 mb-lg-0">
                        <div class="card border-0 shadow-sm p-2">
                            <img src="https://images.unsplash.com/photo-1488646953014-85cb44e25828?q=80&w=1935&auto=format&fit=crop" 
                                 alt="Travel Image" 
                                 class="img-fluid rounded-3 w-100" 
                                 style="object-fit: cover; min-height: 300px;">
                        </div>
                    </div>

                    <div class="col-lg-6">
                        
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <div class="card info-card h-100 text-center py-3">
                                    <div class="card-body">
                                        <i class="bi bi-person-badge fs-1 icon-blue mb-2"></i>
                                        <h6 class="fw-bold mb-1">Kualifikasi</h6>
                                        <small class="text-muted">Supplier Terpercaya</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card info-card h-100 text-center py-3">
                                    <div class="card-body">
                                        <i class="bi bi-headset fs-1 icon-blue mb-2"></i>
                                        <h6 class="fw-bold mb-1">Layanan</h6>
                                        <small class="text-muted">Full Support 24 Jam</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card info-card h-100 text-center py-3">
                                    <div class="card-body">
                                        <i class="bi bi-check-circle-fill fs-1 icon-blue mb-2"></i>
                                        <h6 class="fw-bold mb-1">Kerjasama</h6>
                                        <small class="text-muted">Saling Menguntungkan</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card info-card h-100 text-center py-3">
                                    <div class="card-body">
                                        <i class="bi bi-cart-check fs-1 icon-blue mb-2"></i>
                                        <h6 class="fw-bold mb-1">Persediaan</h6>
                                        <small class="text-muted">Layanan Kualitas Terbaik</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-secondary lh-lg">
                            <p class="mb-3">
                                <strong>Ray Prana Skyline</strong> adalah agen travel terpercaya yang telah melayani ribuan pelanggan. 
                                Kami berkomitmen untuk memberikan pengalaman perjalanan yang tak terlupakan dengan destinasi wisata terbaik di seluruh dunia 🌎.
                            </p>
                            <p>
                                Ray Prana Skyline siap membantu Anda merencanakan liburan impian. Kami menawarkan paket tour yang fleksibel, 
                                harga kompetitif, dan pelayanan penuh kehangatan! ✈️✨
                            </p>
                        </div>

                    </div>
                </div>
            </div>
            <div id="destinasi" class="container-fluid px-4 mt-5 pt-4" style="display: none;">
    
    <div class="mb-4">
        <h2 class="fw-bold text-secondary">Destinasi Populer</h2>
        <p class="text-muted">Pilihan destinasi terbaik di Indonesia untuk liburanmu.</p>
        
        <ul class="nav nav-tabs mt-3">
            <li class="nav-item">
                <a class="nav-link active fw-bold" href="#">Domestik</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-secondary" href="#">Internasional</a>
            </li>
        </ul>
    </div>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
        
        <div class="col">
            <div class="card h-100 border-0 shadow-sm destination-card">
                <div class="overflow-hidden rounded-top">
                    <img src="{{ asset('img/bedugul.jpg') }}" class="card-img-top" alt="Bali">
                </div>
                <div class="card-body">
                    <small class="text-secondary text-uppercase d-block mb-1">Indonesia</small>
                    <h5 class="card-title fw-bold text-primary">Bali (Bedugul)</h5>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 border-0 shadow-sm destination-card">
                <div class="overflow-hidden rounded-top">
                    <img src="{{ asset('img/borobudur.jpg') }}" class="card-img-top" alt="Magelang">
                </div>
                <div class="card-body">
                    <small class="text-secondary text-uppercase d-block mb-1">Indonesia</small>
                    <h5 class="card-title fw-bold text-primary">Magelang</h5>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 border-0 shadow-sm destination-card">
                <div class="overflow-hidden rounded-top">
                    <img src="{{ asset('img/bromo.jpg') }}" class="card-img-top" alt="Bromo">
                </div>
                <div class="card-body">
                    <small class="text-secondary text-uppercase d-block mb-1">Indonesia</small>
                    <h5 class="card-title fw-bold text-primary">Bromo</h5>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 border-0 shadow-sm destination-card">
                <div class="overflow-hidden rounded-top">
                    <img src="{{ asset('img/monas.jpg') }}" class="card-img-top" alt="Jakarta">
                </div>
                <div class="card-body">
                    <small class="text-secondary text-uppercase d-block mb-1">Indonesia</small>
                    <h5 class="card-title fw-bold text-primary">Jakarta</h5>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 border-0 shadow-sm destination-card">
                <div class="overflow-hidden rounded-top">
                    <img src="{{ asset('img/prambanan.jpg') }}" class="card-img-top" alt="Yogyakarta">
                </div>
                <div class="card-body">
                    <small class="text-secondary text-uppercase d-block mb-1">Indonesia</small>
                    <h5 class="card-title fw-bold text-primary">Yogyakarta</h5>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 border-0 shadow-sm destination-card">
                <div class="overflow-hidden rounded-top">
                    <img src="{{ asset('img/museumangkut.jpg') }}" class="card-img-top" alt="Batu">
                </div>
                <div class="card-body">
                    <small class="text-secondary text-uppercase d-block mb-1">Indonesia</small>
                    <h5 class="card-title fw-bold text-primary">Batu, Malang</h5>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 border-0 shadow-sm destination-card">
                <div class="overflow-hidden rounded-top">
                    <img src="{{ asset('img/tmii.jpg') }}" class="card-img-top" alt="TMII">
                </div>
                <div class="card-body">
                    <small class="text-secondary text-uppercase d-block mb-1">Indonesia</small>
                    <h5 class="card-title fw-bold text-primary">TMII Jakarta</h5>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 border-0 shadow-sm destination-card">
                <div class="overflow-hidden rounded-top">
                    <img src="{{ asset('img/lumajang.jpg') }}" class="card-img-top" alt="Lumajang">
                </div>
                <div class="card-body">
                    <small class="text-secondary text-uppercase d-block mb-1">Indonesia</small>
                    <h5 class="card-title fw-bold text-primary">Lumajang</h5>
                </div>
            </div>
        </div>

    </div>
</div>
            <div id="paket" class="container-fluid px-4 mt-5 pt-4" style="display: none;">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-secondary">Daftar Pesanan Masuk</h2>
        <button class="btn btn-primary btn-sm"><i class="bi bi-download me-2"></i>Export Data</button>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="p-3">Tanggal Order</th>
                            <th>Nama Pemesan</th>
                            <th>Paket</th>
                            <th>Jml Penumpang</th>
                            <th>Total Harga</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($transactions as $trx)
                        <tr>
                            <td class="p-3">
                                <small class="text-muted d-block">{{ $trx->created_at->format('d M Y') }}</small>
                                <small class="fw-bold">{{ $trx->created_at->format('H:i') }}</small>
                            </td>
                            <td>
                                <div class="fw-bold">{{ $trx->customer_name }}</div>
                                <small class="text-muted">{{ $trx->customer_email }}</small>
                            </td>
                            <td>
                                <span class="badge bg-info text-dark">{{ $trx->package_name }}</span>
                                <div class="small text-muted mt-1">{{ $trx->start_date }} s/d {{ $trx->end_date }}</div>
                            </td>
                            <td class="text-center">{{ $trx->passenger_count }} Pax</td>
                            <td class="fw-bold text-success">Rp {{ number_format($trx->total_price, 0, ',', '.') }}</td>
                            <td>
                                <span class="badge bg-warning text-dark">{{ $trx->status }}</span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center p-5">
                                <img src="https://cdn-icons-png.flaticon.com/512/4076/4076432.png" width="80" class="mb-3 opacity-50">
                                <p class="text-muted fw-bold">Belum ada pesanan masuk.</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
            <div id="validasi" class="container mt-5 pt-5">
                <h1>Validasi Tour</h1>
            </div>
            <div id="dokumentasi" class="container mt-5 pt-5">
                <h1>Dokumentasi</h1>
            </div>
            <div id="akun" class="container-fluid px-4 mt-5 pt-3" style="display: none;"> <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-secondary">Aktivitas Akun</h2>
        <span class="badge bg-primary">{{ Auth::user()->name }}</span>
    </div>

    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm text-center py-4">
                <div class="card-body">
                    <div class="mb-3">
                        <i class="bi bi-person-circle text-secondary" style="font-size: 4rem;"></i>
                    </div>
                    <h5 class="fw-bold">{{ Auth::user()->name }}</h5>
                    <p class="text-muted small mb-3">{{ Auth::user()->email }}</p>
                    <button class="btn btn-outline-danger btn-sm">
                        <i class="bi bi-box-arrow-right me-1"></i> Logout
                    </button>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white py-3">
                    <h6 class="mb-0 fw-bold"><i class="bi bi-clock-history me-2 text-primary"></i>Riwayat Login Terakhir</h6>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light text-secondary">
                                <tr>
                                    <th class="ps-4">Aktivitas</th>
                                    <th>IP Address</th>
                                    <th>Waktu</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($activities as $log)
                                <tr>
                                    <td class="ps-4">
                                        {{ $log->description ?? 'Login System' }} 
                                    </td>
                                    <td>
                                        <span class="font-monospace small bg-light p-1 rounded">
                                            {{ $log->ip_address ?? '127.0.0.1' }}
                                        </span>
                                    </td>
                                    <td>
                                        <small class="text-muted">{{ $log->created_at->diffForHumans() }}</small>
                                    </td>
                                    <td>
                                        <span class="badge bg-success bg-opacity-10 text-success">Sukses</span>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center py-4 text-muted">
                                        Belum ada riwayat aktivitas.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

        </div>
    </div>

</body>
</html>