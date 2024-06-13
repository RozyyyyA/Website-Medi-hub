<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Medi-hub | Supplier Detail</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
    .container {
      margin-top: 50px;
    }
    .card-header {
      background-color: #007bff;
      color: white;
      font-size: 1.5rem;
      font-weight: bold;
      text-align: center;
      padding: 10px 0;
    }
    .form-container {
      max-width: 600px;
      margin: auto;
      background: white;
      padding: 30px;
      border-radius: 0 0 8px 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .form-container h1 {
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 20px;
    }
    .form-table th {
      width: 30%;
    }
    .img-thumbnail {
      width: 150px;
      height: 150px;
      object-fit: cover; 
    }
    .btn-container {
      margin-top: 0px;
      margin-bottom: 40px;
      text-align: center;
      height: 120px,
    }
    .data-empty {
      color: #dc3545;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="card">
      <div class="card-header">
        Supplier Details
      </div>
      <div class="table-responsive">
        <table class="table form-table">
          <tr>
            <th>Foto Profil:</th>
            <td><img id="avatar" src="" alt="Avatar" class="img-thumbnail"></td>
          </tr>
          <tr>
            <th>Nama:</th>
            <td><span id="nama"></span></td>
          </tr>
          <tr>
            <th>Alamat:</th>
            <td><span id="alamat"></span></td>
          </tr>
          <tr>
            <th>Telp:</th>
            <td><span id="telp"></span></td>
          </tr>
          <tr>
            <th>Jenis Pegawai:</th>
            <td><span id="tetap"></span></td>
          </tr>
          <tr>
            <th>Bergabung Sejak:</th>
            <td><span id="created_at"></span></td>
          </tr>
          <tr>
            <th>Data Pendukung:</th>
            <td>
              <div id="dataContainer"></div>
            </td>
          </tr>
        </table>
      </div>
      <div class="btn-container"></div>
    </div>
  </div>

  <script src="/cookies.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      document.body.classList.add('fade-in');
    });

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
    const tetap = document.querySelector('#tetap');
    const created_at = document.querySelector('#created_at');
    const dataContainer = document.querySelector('#dataContainer');
    const btnContainer = document.querySelector('.btn-container');

    const url = new URL(window.location.href);
    const params = new URLSearchParams(url.search);
    const id = params.get('id');

    fetch('http://localhost:8080/api/supplier/single/' + id, {
      headers: {
        'Authorization': 'Bearer ' + getCookie('token')
      }
    })
    .then(res => res.json())
    .then(data => {
      if (data.status == false) {
        alert('Hanya Manajer atau Administrator yang dapat melihat');
        window.location.replace('/');
      } else {
        const supplier = JSON.parse(JSON.stringify(data.data));
        avatar.src = supplier['avatar'] != '' ? 'http://localhost:8080/images/suppliers/avatar/' + supplier['avatar'] : 'http://localhost:8080/images/suppliers/avatar/default.jpg';
        nama.innerHTML = supplier['nama'];
        alamat.innerHTML = supplier['alamat'];
        telp.innerHTML = supplier['telp'];
        tetap.innerHTML = supplier['tetap'] != false ? 'Tetap' : 'Non Tetap';
        created_at.innerHTML = supplier['created_at'];

        if (supplier['data'] != '') {
          const iframe = document.createElement('iframe');
          iframe.src = 'http://localhost:8080/images/suppliers/data/' + supplier['data'];
          iframe.width = '100%';
          iframe.height = '400';
          dataContainer.appendChild(iframe);
        } else {
          const span = document.createElement('span');
          span.innerHTML = 'Data kosong';
          span.className = 'data-empty';
          dataContainer.appendChild(span);
        }

        if (supplier['tetap'] == false) {
          const btn = document.createElement('button');
          btn.innerHTML = 'Terima menjadi pegawai tetap';
          btn.id = 'btn';
          btn.className = 'btn btn-secondary mt-3';
          btnContainer.appendChild(btn);

          btn.addEventListener('click', () => {
            fetch('http://localhost:8080/api/supplier/accept/' + id, {
              headers: {
                'Authorization': 'Bearer ' + getCookie('token'),
                'Content-Type': 'application/x-www-form-urlencoded'
              },
              method: 'POST',
              body: '_method=PUT&pengajuan=0&tetap=1'
            })
            .then(res => res.json())
            .then(data => {
              if (data.status == true) {
                alert('Berhasil diterima');
                btn.remove();
                tetap.innerHTML = 'Tetap';
              } else {
                alert('Gagal diterima');
              }
            });
          });
        }
      }
    });
  </script>
</body>
</html>
