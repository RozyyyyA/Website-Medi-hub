<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Supplier Profile | Edit Supplier Profile</title>
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
    .form-label {
      font-weight: bold;
    }
    .btn-primary {
      background-color: #007bff;
      border: none;
    }
    .btn-primary:hover {
      background-color: #0056b3;
    }
   
    #image {
      width: 100%;
      height: auto;
      object-fit: cover;
      aspect-ratio: 1/1; /* Rasio aspek 1:1 untuk menjaga gambar tetap persegi */
    }
    /* Custom styling */
    @media (max-width: 576px) {
      .col-md-4 {
        text-align: center;
        margin-bottom: 20px;
      }
      .card-body {
        padding: 20px;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="card">
      <div class="card-header">
        Edit Supplier Profile
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-4">
            <img id="image" src="" alt="Avatar">
          </div>
          <div class="col-md-8">
            <form id="form">
              <input id="old-avatar" type="hidden">
              <div class="mb-3">
                <label for="avatar" class="form-label">Avatar</label>
                <input id="avatar" type="file" class="form-control">
              </div>
              <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input id="nama" type="text" class="form-control">
              </div>
              <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input id="alamat" type="text" class="form-control">
              </div>
              <div class="mb-3">
                <label for="telp" class="form-label">Telp</label>
                <input id="telp" type="text" class="form-control">
              </div>
              <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Edit</button>
              </div>
            </form>
          </div>
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
    const image = document.querySelector('#image');

    fetch('http://localhost:8080/api/supplier/profile', {
      headers: {
        'Authorization': 'Bearer ' + getCookie('token')
      }
    })
    .then(res => res.json())
    .then(data => {
      if (data.status == false) {
        alert('Hanya Supplier yang dapat mengedit');
        window.location.replace('/');
      } else {
        const supplier = JSON.parse(JSON.stringify(data.data));
        image.src = supplier['avatar'] != '' ? 'http://localhost:8080/images/suppliers/avatar/' + supplier['avatar'] : 'http://localhost:8080/images/suppliers/avatar/default.jpg';
        document.querySelector('#old-avatar').value = supplier['avatar'];
        document.querySelector('#nama').value = supplier['nama'];
        document.querySelector('#alamat').value = supplier['alamat'];
        document.querySelector('#telp').value = supplier['telp'];
      }
    });

    form.addEventListener('submit', e => {
      e.preventDefault();
      
      const oldAvatar = document.querySelector('#old-avatar').value;
      const avatar = document.querySelector('#avatar').files[0];
      const nama = document.querySelector('#nama').value;
      const alamat = document.querySelector('#alamat').value;
      const telp = document.querySelector('#telp').value;

      const formData = new FormData();
      formData.append('_method', "PUT");
      formData.append('old-avatar', oldAvatar);
      formData.append('avatar', avatar);
      formData.append('nama', nama);
      formData.append('alamat', alamat);
      formData.append('telp', telp);

      fetch('http://localhost:8080/api/supplier/update',  {
        headers: {
          'Authorization': 'Bearer ' + getCookie('token'),
        },
        method: 'POST',
        body: formData
      })
      .then(res => res.json())
      .then(data => data.status == true ? alert('Data berhasil diupdate') : alert('Data gagal diupdate'))
      .catch(err => console.log(err));
    });
  </script>
</body>
</html>

