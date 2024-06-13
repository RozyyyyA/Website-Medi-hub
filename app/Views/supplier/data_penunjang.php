<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Supplier Profile | Tambah Data Pendukung</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
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
    h1 {
      font-size: 24px;
      margin-bottom: 20px;
    }
    .container {
      margin-top: 50px;
      max-width: 600px;
    }
    .card-header {
      background-color: #007bff;
      color: white;
      font-size: 1.5rem;
      font-weight: bold;
      text-align: center;
      padding: 10px 0;
    }
    .form-label {
      font-weight: bold;
    }
    button[type="submit"] {
      width: 100%;
    }
    .card-body {
      padding: 20px;
    }
    .preview-section {
      margin-top: 20px;
    }
    .preview-section iframe {
      width: 100%;
      height: 400px;
      border: none;
      margin-bottom: 20px;
    }
    .btn-submit {
      width: 100%;
      margin-top: 10px;
    }
  </style>
</head>
<body>
<div class="container">
  <div class="card">
    <div class="card-header">
      Tambah Data Pendukung
    </div>
    <div class="card-body">
      <form id="form">
        <input id="old-data" type="hidden">
        <div class="mb-3">
          <label for="data" class="form-label">Data Pendukung</label>
          <input id="data" type="file" accept=".pdf" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
      </form>
      <div class="preview-section">
        <iframe id="data-preview" src="" style="display: none;"></iframe>
        <button id="btn-submit" class="btn btn-primary btn-submit" style="display: none;">Mengajukan menjadi pegawai tetap</button>
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

  const form = document.querySelector('#form');
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
          const supplier = JSON.parse(JSON.stringify(data.data));
          document.querySelector('#old-data').value = supplier['data'];

          if (supplier['data']) {
              const iframe = document.querySelector('#data-preview');
              iframe.src = 'http://localhost:8080/images/suppliers/data/' + supplier['data'];
              iframe.style.display = 'block';

              const btn = document.querySelector('#btn-submit');
              if (supplier['tetap'] == false) {
                  btn.style.display = 'block';
              }
          }

          document.querySelector('#btn-submit').addEventListener('click', () => {
              fetch('http://localhost:8080/api/supplier/update', {
                  headers: {
                      'Authorization': 'Bearer ' + getCookie('token'),
                      'Content-Type': 'application/x-www-form-urlencoded'
                  },
                  method: 'POST',
                  body: '_method=PUT&pengajuan=1'
              })
              .then(res => res.json())
              .then(data => data.status == true ? alert('Berhasil mengajukan') : alert('Gagal mengajukan'));
          });
      }
  });

  form.addEventListener('submit', e => {
      e.preventDefault();
      const oldData = document.querySelector('#old-data').value;
      const data = document.querySelector('#data').files[0];
      const formData = new FormData();
      formData.append('_method', "PUT");
      formData.append('old-data', oldData);
      formData.append('data', data);

      fetch('http://localhost:8080/api/supplier/update', {
          headers: {
              'Authorization': 'Bearer ' + getCookie('token')
          },
          method: 'POST',
          body: formData
      })
      .then(res => res.json())
      .then(data => data.status == true ? alert('Data berhasil diupload') : alert('Data gagal diupload'))
      .catch(err => console.log(err));
  });
</script>
</body>
</html>
