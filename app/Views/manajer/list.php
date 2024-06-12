<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Medi-Hub | Manajer List</title>
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
      background-image: url('images/banner3.jpg');
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
    .profile-card {
      background: white;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      padding: 30px;
      margin-top: 20px;
      display: flex;
      align-items: center;
    }
    .profile-card img {
      width: 150px;
      height: 150px;
      object-fit: cover;
      margin-right: 30px;
    }
    .profile-card .profile-info {
      flex: 1;
    }
    .profile-card .profile-info span {
      display: block;
      font-size: 16px;
      margin: 10px 0;
    }
    .profile-card .profile-links {
      display: flex;
      justify-content: space-around;
      margin-top: 20px;
    }
    .profile-card .btn-custom {
      width: 45%;
      font-size: 16px;
      font-weight: 500;
    }
    .breadcrumb {
      background: none;
      padding: 0;
      margin-bottom: 0;
    }
    .breadcrumb-item a {
      text-decoration: none;
      color: #007bff;
    }
    .breadcrumb-item.active {
      color: #6c757d;
    }
    .container h1 {
      font-size: 2rem; 
    }

    .container hr {
      border-color: #007bff; 
    }

    .container a button {
      background-color: #007bff; 
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      text-decoration: none;
    }

    .container a button:hover {
      background-color: #0056b3; 
    }

    table {
      margin-top: 10px;
      margin-bottom: 30px;
      width: 100%;
      border-collapse: collapse;
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
    th {
      background-color: #212529;
      color: white;
    }
    .delete {
      background-color: #dc3545;
      color: white;
      border: none;
      padding: 8px 16px;
      border-radius: 5px;
      cursor: pointer;
    }

    .delete:hover {
      background-color: #c82333;
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
        <h1 class="display-4">Manager List</h1>
        <p><a href="<?= base_url('/') ?>" class="home-link btn btn-unstyled">Home</a> > Manager List</p>
    </div>
  </div>

  <div class="container">
    <h1>Manajer List</h1>
    <hr>
    <a href="/manajer/register" class="btn btn-primary mb-1">Tambah Manajer</a>
    <br>
    <table id="table">
      <Thead>
        <tr>
          <th>No</th>
          <th>Username</th>
          <th>Aksi</th>
        </tr>
      </Thead>
    </table>
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
    const table = document.querySelector('#table')
    fetch('http://localhost:8080/api/manajer/list', {
      headers: {'Authorization': 'Bearer ' + getCookie('token')},
      method: 'GET'
    })
    .then(res=>res.json())
    .then(data=>{
      if(data.status==false) {
        alert('Hanya Aministrator yang dapat melihat')
        window.location.replace('/')
      }else {
        let num = 0
        JSON.parse(JSON.stringify(data.data)).forEach(manajer => {

          const tdNo = document.createElement('td')
          tdNo.innerHTML = num+=1

          const tdUsername = document.createElement('td')
          tdUsername.innerHTML = manajer['username']!='' ? manajer['username'] : 'Tidak diketahui'

          const btnDelete = document.createElement('button')
          btnDelete.innerHTML = 'Delete'
          btnDelete.value = manajer['id']
          btnDelete.classList.add('delete')

          const tdAksi = document.createElement('td')
          tdAksi.appendChild(btnDelete)
          
          const tr = document.createElement('tr')
          tr.appendChild(tdNo)
          tr.appendChild(tdUsername)
          tr.appendChild(tdAksi)
          table.appendChild(tr)

          const btnDeletes = document.querySelectorAll('.delete')
          btnDeletes.forEach(btnDelete => {
            btnDelete.addEventListener('click', () => {
              fetch('http://localhost:8080/api/manajer/delete/' + btnDelete.value, {
                headers:{
                  'Authorization': 'Bearer ' + getCookie('token')
                },
                method: 'DELETE'
              })
              .then(res=>res.json())
              .then(data=>{
                if(data.status==false) {
                  alert('Data gagal dihapus')
                }else {
                  alert('Data berhasil dihapus')
                }
                window.location.href.replace('/manajer/list')
              })
            })
          })
        })
      }})
  </script>

  <?php include 'footer.php'; ?>
</body>
</html>
