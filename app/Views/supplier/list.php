<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Medi-Hub | Supplier List</title>
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
      background-color: skyblue;
      background-image: url('igambar1.jpg');
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
      background-image: url('banner1.jpg');
      margin: 40px;
    }
    table {
      margin-top: 10px;
      margin-bottom: 30px;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    th, td {
      border: 1px solid #ddd;
      padding: 12px; 
      text-align: center;
      vertical-align: middle;
    }        
    .delete {
      color: white;
      cursor: pointer;
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
        <h1 class="display-4">Supplier List</h1>
        <p><a href="<?= base_url('/') ?>" class="home-link btn btn-unstyled">Home</a> > Supplier List</p>
    </div>
  </div>

  <div class="container">
    <h2>Supplier List</h2>
    <hr>
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th scope="col" style="background-color: #212529; color: white;">No</th>
            <th scope="col" style="background-color: #212529; color: white;">Nama</th>
            <th scope="col" style="background-color: #212529; color: white;">Jenis</th>
            <th scope="col" style="background-color: #212529; color: white;">Status</th>
            <th scope="col" style="background-color: #212529; color: white;">Aksi</th>
          </tr>
        </thead>
        <tbody id="table">
          <!-- Data supplier akan ditampilkan di sini -->
        </tbody>
      </table>
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

    const tableBody = document.querySelector('#table')
    fetch('http://localhost:8080/api/supplier/list', {
      headers: {'Authorization': 'Bearer ' + getCookie('token')},
      method: 'GET'
    })
    .then(res => res.json())
    .then(data => {
      if (data.status == false) {
        alert('Hanya Manajer atau Administrator yang dapat melihat')
        window.location.replace('/')
      } else {
        let num = 0
        data.data.forEach(supplier => {
          const tr = document.createElement('tr')

          const tdNo = document.createElement('td')
          tdNo.textContent = ++num

          const tdNama = document.createElement('td')
          tdNama.textContent = supplier.nama || 'Tidak diketahui'

          const tdTetap = document.createElement('td')
          tdTetap.textContent = supplier.tetap ? 'Tetap' : 'Non Tetap'

          const tdStatus = document.createElement('td')
          tdStatus.textContent = supplier.pengajuan ? 'Mengajukan' : ''

          const btnDetail = document.createElement('a')
          btnDetail.textContent = 'Detail'
          btnDetail.href = '/supplier/detail?id=' + supplier.supplier_id
          btnDetail.classList.add('btn', 'btn-primary', 'btn-sm', 'me-2')

          const btnDelete = document.createElement('a')
          btnDelete.textContent = 'Delete'
          btnDelete.href = '#'
          btnDelete.value = supplier.supplier_id
          btnDelete.classList.add('btn', 'btn-danger', 'btn-sm', 'delete')

          const tdAksi = document.createElement('td')
          tdAksi.appendChild(btnDetail)
          tdAksi.appendChild(btnDelete)

          tr.appendChild(tdNo)
          tr.appendChild(tdNama)
          tr.appendChild(tdTetap)
          tr.appendChild(tdStatus)
          tr.appendChild(tdAksi)
          tableBody.appendChild(tr)

          btnDelete.addEventListener('click', () => {
            fetch('http://localhost:8080/api/supplier/delete/' + btnDelete.value, {
              headers: { 'Authorization': 'Bearer ' + getCookie('token') },
              method: 'DELETE'
            })
            .then(res => res.json())
            .then(data => {
              if (data.status == false) {
                alert('Data gagal dihapus')
              } else {
                alert('Data berhasil dihapus')
                window.location.replace('/supplier/list')
              }
            })
          })
        })
      }
    })
  </script>

  <?php include 'footer.php'; ?>
</body>
</html>

