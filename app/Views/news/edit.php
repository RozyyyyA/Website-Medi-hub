<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Medi-Hub | Edit News</title>
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
      font-size: 1.25rem;
      font-weight: bold;
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
    #preview {
      max-width: 200px;
      margin-bottom: 15px;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="card">
      <div class="card-header">
        Edit News
      </div>
      <div class="card-body">
        <form id="form">
          <div class="mb-3">
            <img id="preview" src="" alt="News Image" class="img-fluid">
            <input id="old-image" type="hidden">
          </div>
          <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input id="image" type="file" accept=".jpg, .png" name="image" class="form-control">
          </div>
          <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input id="title" type="text" name="title" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input id="description" type="text" name="description" class="form-control" required>
          </div>
          <button type="submit" class="btn btn-primary">Edit</button>
        </form>
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
    const preview = document.querySelector('#preview');

    const url = new URL(window.location.href);
    const params = new URLSearchParams(url.search);
    const id = params.get('id');

    fetch('http://localhost:8080/api/news/single/' + id, {
      headers: {
        'Authorization': 'Bearer ' + getCookie('token')
      }
    })
    .then(res => res.json())
    .then(data => {
      if (data.status == false) {
        alert('Hanya Administrator yang dapat mengedit');
        window.location.replace('/');
      } else {
        const news = JSON.parse(JSON.stringify(data.data));
        preview.src = news['image'] != '' ? 'http://localhost:8080/images/news/' + news['image'] : '';

        document.querySelector('#old-image').value = news['image'];
        document.querySelector('#title').value = news['title'];
        document.querySelector('#description').value = news['description'];

        form.addEventListener('submit', e => {
          e.preventDefault();

          const oldImage = document.querySelector('#old-image').value;
          const image = document.querySelector('#image').files[0];
          const title = document.querySelector('#title').value;
          const description = document.querySelector('#description').value;

          const formData = new FormData();
          formData.append('_method', "PUT");
          formData.append('old-image', oldImage);
          formData.append('image', image);
          formData.append('title', title);
          formData.append('description', description);

          fetch('http://localhost:8080/api/news/update/' + id, {
            headers: {
              'Authorization': 'Bearer ' + getCookie('token'),
            },
            method: 'POST',
            body: formData
          })
          .then(res => res.json())
          .then(data => data.status == true ? alert('News berhasil diupdate') : alert('News gagal diupdate'))
          .catch(err => console.log(err));
        });
      }
    });
  </script>
</body>
</html>
