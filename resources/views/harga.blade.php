<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Booking Perjalanan - RAY PRANA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/harga.js') }}"></script>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg stiky-top bg-white shadow-sm">
        <div class="container">
            <div class="container mt-5"> <div class="row mb-3">
        <div class="col-12">
            <a href="{{ url('/') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i> Home
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
             </div>

        <div class="col-md-4">
             </div>
    </div>
</div>
            <a class="navbar-brand fw-bold custom-primary fs-2" href="#home">RAY PRANA</a>
        </div>
    </nav>

    <section id="booking" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">Pilih Perjalanan Anda</h2>
            <div class="row">
                <!-- Form Pemesanan -->
                <div class="col-lg-8">
                    <div class="card shadow-sm mb-4">
                        <div class="card-header bg-warning text-white">
                            <h5>Detail Pemesanan</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('/submit-booking') }}" method="POST" class="row g-4">
                                @csrf
                                <!-- Pilihan Tanggal -->
                                <div class="col-md-6">
                                    <label for="startDate" class="form-label fw-bold">Tanggal Mulai</label>
                                    <input type="date" class="form-control" id="startDate" name="startDate" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="endDate" class="form-label fw-bold">Tanggal Selesai</label>
                                    <input type="date" class="form-control" id="endDate" name="endDate" required
                                        readonly>
                                </div>

                                <!-- Pilih Paket -->
                                <div class="col-12">
                                    <label for="package" class="form-label fw-bold">Pilih Paket Tour</label>
                                    <select class="form-select" id="package" name="package" required>
                                        <option value="" selected disabled>Pilih paket tour Anda</option>
                                        <option value="jepang" data-price="12000000">Bali - Jepang
                                        </option>
                                        <option value="jakarta" data-price="2000000">Bali - Jakarta
                                        </option>
                                        <option value="thailand" data-price="8000000">Bali - Thailand</option>
                                        <option value="malaysia" data-price="6000000">Bali - Malaysia</option>
                                        <option value="singapur" data-price="650000">Bali - Singapur</option>
                                    </select>
                                </div>

                                <!-- Informasi Pemesan -->
                                <div class="col-md-6">
                                    <label for="fullName" class="form-label fw-bold">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="fullName" name="fullName"
                                        placeholder="Masukkan nama lengkap Anda" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label fw-bold">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Masukkan email Anda" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="phone" class="form-label fw-bold">Nomor Telepon</label>
                                    <input type="tel" class="form-control" id="phone" name="phone"
                                        placeholder="Masukkan nomor telepon Anda" required>
                                </div>

                                <!-- Jumlah Penumpang -->
                                <div class="col-md-6">
                                    <label for="passengerCount" class="form-label fw-bold">Jumlah Penumpang</label>
                                    <input type="number" class="form-control" id="passengerCount" name="passengerCount"
                                        placeholder="Masukkan jumlah penumpang" min="1" required>
                                </div>

                                <!-- Pilihan Transportasi -->
                                <div class="col-12">
                                    <label for="transportation" class="form-label fw-bold">Transportasi yang
                                        Digunakan</label>
                                    <select class="form-select" id="transportation" name="transportation" required>
                                        <option value="" selected disabled>Pilih transportasi Anda</option>
                                        <option value="bus-35">Pesawat Ekonomi</option>
                                        <option value="bus-45">Pesawat Ekonomi Premium</option>
                                        <option value="elf-16">Pesawat Kelas 1</option>
                                    </select>
                                </div>

                                <!-- Pilihan Guide -->
                                <div class="col-12">
                                    <label class="form-label fw-bold">Apakah Anda ingin menyertakan pelayanan tambahan saat
                                        perjalanan? (dikenakan biaya tambahan)</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="guide" id="guideYes"
                                            value="yes" required>
                                        <label class="form-check-label" for="guideYes">Ya</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="guide" id="guideNo"
                                            value="no" required>
                                        <label class="form-check-label" for="guideNo">Tidak</label>
                                    </div>
                                </div>

                                <!-- Catatan Tambahan Pemesan -->
                                <div class="col-12">
                                    <label for="notes" class="form-label fw-bold">Catatan Tambahan</label>
                                    <textarea class="form-control" id="notes" name="notes" rows="3"
                                        placeholder="Tambahkan catatan jika diperlukan"></textarea>
                                </div>

                                <!-- Tombol Submit -->
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-warning btn-lg">Lanjutkan Booking</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Ringkasan Pesanan -->
                <div class="col-lg-4">
                    <div class="card shadow-sm mb-4">
                        <div class="card-header bg-warning text-white">
                            <h5>Ringkasan Pesanan</h5>
                        </div>
                        <div class="card-body">
                            <p>Tanggal Mulai: <b id="selected-start-date">-</b></p>
                            <p>Tanggal Selesai: <b id="selected-end-date">-</b></p>
                            <p>Paket Tour: <b id="selected-package">-</b></p>
                            <p>Harga per PAX: <b id="package-price">-</b></p>
                            <p>Jumlah Penumpang: <b id="passenger-count">-</b></p>
                            <p>Transportasi: <b id="selected-transportation">-</b></p>
                            <p>Guide: <b id="selected-guide">-</b></p>
                            <p>Biaya Guide: <b id="guide-cost">Rp 0</b></p>
                            <hr>
                            <p>Nama Pemesan: <b id="fullname-summary">-</b></p>
                            <p>Email: <b id="email-summary">-</b></p>
                            <p>Nomor Telepon: <b id="phone-summary">-</b></p>
                            <p>Catatan Tambahan: <b id="notes-summary">-</b></p>
                            <h5>Total Harga: <b id="total-price">-</b></h5>
                        </div>
                    </div>
                    <div class="card shadow-sm">
                        <div class="card-header bg-warning text-white">
                            <h5>Kebijakan Pemesanan</h5>
                        </div>
                        <div class="card-body">
                            <p>Pastikan data yang Anda masukkan sudah benar sebelum melanjutkan pembayaran.</p>
                            <p>Pemesanan tidak dapat dibatalkan setelah pembayaran dilakukan.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="text-center py-3 bg-white shadow" data-bs-theme="light" id="TentangKami">
        <div class="container-fluid ">
            <span class="navbar-text">
                <p><b>&copy;2025 Enka Tour Travel. All Rights Reserved.</b></p>
                <a href="#" class="kontak mx-2">Instagram</a>
                <a href="#" class="kontak mx-2">Facebook</a>
                <a href="#" class="kontak mx-2">Kontak</a>
                <a href="#" class="kontak mx-2">Alamat</a>
            </span>
        </div>
    </footer>
</body>

<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="successModalLabel">Pemesanan Berhasil!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>{{ session('success') }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

@if (session('success'))
    <div id="success-message" data-message="{{ session('success') }}"></div>
@endif

</html>
