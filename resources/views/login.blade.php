<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Akun</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh; background-color: #f8f9fa;">
        <div class="card p-4 shadow" style="width: 350px;">
          <h3 class="text-center mb-4">Login</h3>
          
          {{-- Menampilkan Pesan Error --}}
          @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif

          {{-- FORM PEMBUKA (JANGAN DITUTUP DULU!) --}}
          <form action="{{ route('login.submit') }}" method="POST">
            @csrf
            
            {{-- Input Email --}}
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" name="email" class="form-control" id="email" placeholder="Masukkan email" required>
            </div>

            {{-- Input Password --}}
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" name="password" class="form-control" id="password" placeholder="Masukkan password" required>
            </div>
      
            {{-- Checkbox & Lupa Password --}}
            <div class="d-flex justify-content-between align-items-center mb-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="rememberMe">
                <label class="form-check-label" for="rememberMe">
                  Remember Me
                </label>
              </div>
            </div>
      
            {{-- Tombol Login --}}
            <button type="submit" class="btn w-100" style="background-color: orange; color: white;">Login</button>
            
            {{-- Link Daftar (Penting biar user bisa ke halaman register) --}}
            <div class="text-center mt-3">
                <small>Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a></small>
            </div>

          </form> 
          {{-- FORM PENUTUP (BARU DITUTUP DI SINI) --}}

        </div>
    </div>      
</body>
</html>