<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Supplier Profile</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-vNXtrXZBjg+Ruj48FO/OsnR3T9fL94+NTTW6o/0Od59TTVvlL7avX7T2yZ5q3N57s8f6mLtB/RMv7sVQRBbbfw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Poppins', sans-serif;
      opacity: 0;
      transition: opacity 0.5s ease-in-out;
    }
    .fade-in {
      opacity: 1;
    }
    .fade-out {
      opacity: 0;
    }
    .navbar-brand {
      margin-left: 40px;
      font-size: 1.5rem;
      font-weight: bold;
      color: black; 
    }
    .navbar-nav {
      margin-right: 40px;
      font-size: 13px;
      font-weight: 800;
      line-height: 27px;
      text-transform: uppercase;
      position: relative;
    }
    .header {
      background-image: url('images/banner2.jpg');
      background-size: cover;
      background-position: center;
      color: white;
      text-align: center;
      padding: 50px 0;
      height: 200px;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }
    .header h1 {
      font-size: 32px; 
      font-weight: bold; 
      color: white; 
      margin: 0; 
    }
    .header p {
      font-size: 18px; 
      margin: 0; 
    }
    .container {
      margin: 40px;
    }
    .profile-links {
      display: flex;
      justify-content: space-between;
      margin-top: 20px;
    }
    .profile-card {
      background: white;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      padding: 20px;
      margin-top: 20px;
      display: flex;
      align-items: center;
    }
    .profile-card img {
      width: 200px;
      height: 200px;
      object-fit: cover;
      margin-right: 20px;
    }
    .profile-card .profile-info {
      flex: 1;
    }
    .profile-card .profile-info span {
      display: block;
      font-size: 16px;
      margin: 10px 0;
    }
    .profile-card .profile-info .profile-detail {
      display: flex;
      align-items: center;
      margin: 5px 0;
    }
    .profile-card .profile-info .profile-detail span {
      margin-left: 10px;
    }
    .btn-custom {
      width: 45%;
      font-size: 16px;
      font-weight: 500;
    }
    .btn-unstyled {
      background-color: transparent;
      color: inherit;
      border: none;
      text-decoration: none;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">Medi-Hub</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="/supplier">Supplier</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/supplier/list">List Supplier</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/manajer">List Manajer</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/news">List News</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="header">
    <div class="container">
        <h1 class="display-4">Supplier Profile</h1>
        <p><a href="<?= base_url('/') ?>" class="home-link btn btn-unstyled">Home</a> > Supplier Profile</p>
    </div>
  </div>

  <div class="container">
    <h2>Supplier Profile</h2>
    <hr>
    <div class="profile-card">
      <img id="avatar" src="" alt="Supplier Avatar">
      <div class="profile-info">
        <div class="profile-detail">
          <strong>Nama:</strong> <span id="nama"></span>
        </div>
        <div class="profile-detail">
          <strong>Alamat:</strong> <span id="alamat"></span>
        </div>
        <div class="profile-detail">
          <strong>Telp:</strong> <span id="telp"></span>
        </div>
        <div class="profile-detail">
          <strong>Jenis Pegawai:</strong> <span id="jenis"></span>
        </div>
        <div class="profile-links">
          <a href="/supplier/edit" class="btn btn-primary btn-custom">Edit Profile</a>
          <a href="/supplier/data-penunjang" class="btn btn-secondary btn-custom">+ Data Penunjang</a>
        </div>
      </div>
    </div>
  </div>

  <script src="/cookies.js"></script>
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
    const avatar = document.querySelector('#avatar');
    const nama = document.querySelector('#nama');
    const alamat = document.querySelector('#alamat');
    const telp = document.querySelector('#telp');
    const jenis = document.querySelector('#jenis');

    fetch('http://localhost:8080/api/supplier/profile', {
      headers: {
        'Authorization': 'Bearer ' + getCookie('token')
      }
    })
    .then(res => res.json())
    .then(data => {
      if (data.status == false) {
        alert('Hanya Supplier yang dapat melihat');
        window.location.replace('/');
      } else {
        const supplier = data.data;
        avatar.src = supplier.avatar ? 'http://localhost:8080/images/suppliers/avatar/' + supplier.avatar : 'http://localhost:8080/images/suppliers/avatar/default.jpg';
        nama.innerText = supplier.nama;
        alamat.innerText = supplier.alamat;
        telp.innerText = supplier.telp;
        jenis.innerText = supplier.tetap ? 'Tetap' : 'Non Tetap';
      }
    });
  </script>

  <?php include 'footer.php'; ?>
</body>
</html>
