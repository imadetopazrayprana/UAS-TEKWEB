<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun Baru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh; background-color: #f8f9fa;">
        <div class="card p-4 shadow" style="width: 400px;">
            <h3 class="text-center mb-4">Daftar Akun</h3>

            {{-- Pesan Error --}}
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            {{-- FORM REGISTER --}}
            {{-- PEMBUKA FORM (JANGAN DITUTUP DULU) --}}
            <form action="{{ route('register.submit') }}" method="POST">
                @csrf
                
                {{-- Nama Lengkap (Sekarang sudah di DALAM form) --}}
                <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="name" class="form-control" placeholder="Nama Anda" required>
                </div>

                {{-- Email --}}
                <div class="mb-3">
                    <label class="form-label">Email Address</label>
                    <input type="email" name="email" class="form-control" placeholder="contoh@email.com" required>
                </div>

                {{-- Password --}}
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Minimal 6 karakter" required>
                </div>

                <button type="submit" class="btn btn-primary w-100">Daftar Sekarang</button>
            
            </form> 
            {{-- PENUTUP FORM (BARU DITUTUP DI SINI) --}}

            <div class="text-center mt-3">
                <small>Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a></small>
            </div>
        </div>
    </div>
</body>
</html>