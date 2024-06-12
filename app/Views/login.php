<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login | Medi-Hub</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    body {
      background-image: url('images/banner1.jpg');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .card {
      background-color: rgba(255, 255, 255, 0.9);
      border-radius: 10px;
      padding: 20px;
    }
    .welcome-section {
      background-color: #007bff;
      color: white;
      border-top-left-radius: 10px;
      border-bottom-left-radius: 10px;
      padding: 20px;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
    }
    .form-section {
      padding: 20px;
    }
    @media (max-width: 768px) {
      .welcome-section {
        border-radius: 10px 10px 0 0;
      }
      .card {
        flex-direction: column;
      }
    }
  </style>
</head>
<body>
  <div class="container d-flex align-items-center justify-content-center min-vh-100">
    <div class="card d-flex flex-row shadow-sm w-100" style="max-width: 800px;">
      <div class="welcome-section d-none d-md-flex col-md-5">
        <h1>Selamat Datang di Medi-Hub</h1>
        <p>Platform terpercaya untuk solusi medis Anda.</p>
      </div>
      <div class="form-section col-md-7">
        <h1 class="text-center mb-4">Login</h1>
        <form id="form">
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
          </div>
          <button type="submit" class="btn btn-primary w-100 mb-3">Login</button>
          <div class="text-center">
            <p>Belum punya akun? <a href="/register">Daftar di sini</a></p>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
    // Fade-in animation on page load
    document.addEventListener('DOMContentLoaded', function() {
        document.body.classList.add('fade-in');
    });
    // Fade-out animation on page transition
    document.querySelectorAll('a').forEach(function(link) {
      link.addEventListener('click', function(event) {
        const href = this.getAttribute('href');
        if (href && href.startsWith('/')) {
        event.preventDefault();
        document.body.classList.remove('fade-in');
        document.body.classList.add('fade-out');
        setTimeout(function() {
            window.location.href = href;
        }, 500);
        }
      });
    });
    const form = document.querySelector('#form')
    form.addEventListener('submit', (e) => {
      e.preventDefault()
      const formData = new FormData(form)
      const data = new URLSearchParams(formData)
      fetch('http://localhost:8080/api/login', {
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        method: 'POST',
        body: data
      })
      .then(res => res.json())
      .then(data => {
        if(data.status == false) {
          alert('Login gagal')
        } else {
          setCookie('token', data.data.token, 1)
          alert('Login berhasil')
          window.location.replace('/')
        }
      })
      .catch(error => console.log(error))
    })
  </script>
</body>
</html>
