<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Medi-Hub | Administrator Register</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    body {
      background-image: url('images/banner2.jpg');
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
        <h1 class="text-center mb-4">Administrator Register</h1>
        <form id="form">
          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
          </div>
          <button type="submit" class="btn btn-primary w-100 mb-3">Register</button>
        </form>
      </div>
    </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-9E7Xu/2H7puk2rSHzepGtgmCcRi0IHp4KZ8fE3Ztk1aIax72vYGkFi5z8v0le2H2" crossorigin="anonymous"></script>
  <script>
    const form = document.querySelector('#form');
    form.addEventListener('submit', (e) => {
      e.preventDefault();
      const formData = new FormData(form);
      const data = new URLSearchParams(formData);
      fetch('http://localhost:8080/api/administrator/register', {
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        method: 'POST',
        body: data
      })
      .then(res=>res.json())
      .then(data=>data.status==true ? alert('Register berhasil') : alert('Register gagal'))
      .catch(error=>console.log(error));
    });
  </script>
</body>
</html>
