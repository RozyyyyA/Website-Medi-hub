<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Medi-Hub | Manager Register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Poppins', sans-serif;
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
  </style>
</head>
<body>
  <div class="container">
    <div class="card">
      <div class="card-header">
        Manajer Register
      </div>
      <div class="card-body">
        <form id="form">
          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" id="username" name="username" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" name="password" class="form-control" required>
          </div>
          <button type="submit" class="btn btn-primary">Register</button>
        </form>
      </div>
    </div>
  </div>

  <script src="/cookies.js"></script>
  <script>
    const form = document.querySelector('#form');
    form.addEventListener('submit', (e) => {
      e.preventDefault();
      const formData = new FormData(form);
      const data = new URLSearchParams(formData);
      fetch('http://localhost:8080/api/manajer/register', {
        headers: {
          'Authorization': 'Bearer ' + getCookie('token'),
          'Content-Type': 'application/x-www-form-urlencoded'
        },
        method: 'POST',
        body: data
      })
      .then(res => res.json())
      .then(data => data.status == true ? alert('Register berhasil') : alert('Register gagal'))
      .catch(err => console.log(err));
    });
  </script>
</body>
</html>
