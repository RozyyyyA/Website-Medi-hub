<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medi-hub | Home</title>
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
            font-size: 13px;
            font-weight: 800;
            line-height: 27px;
            text-transform: uppercase;
        }
        .btn-container {
            margin-right: 40px;
        }
        h1 {
            color: white;
        } 
        h2, h3 {
            color: black;
        }
        .hero {
            background-image: url('images/banner1.jpg');
            background-size: cover;
            background-position: center;
            color: white;
            text-align: center;
            padding: 100px 0;
            margin-bottom: 60px;
        }
        .hero h1 {
            font-size: 48px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .hero p {
            font-size: 24px;
            margin-bottom: 40px;
        }
        .container {
            margin-top: 40px;
        }
        .services h2, .products h2, .news h2 {
            margin-bottom: 20px;
            text-align: center;
        }
        .service-item, .product-item, .news-item {
            margin-bottom: 20px;
            border-radius: 8px;
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .service-item img, .product-item img, .news-item img {
            max-width: 100%;
            height: auto;
        }
        .icon {
            font-size: 24px;
            color: #5bc0de;
            margin-right: 10px;
        }
        .service-item:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
        }
        .product-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        }
        .news-item:hover {
            transform: translateX(10px);
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
        }
        .news-carousel .carousel-item {
            display: flex;
            justify-content: center;
        }
        .news-carousel .news-item {
            margin: 10px;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            width: 300px;
        }
        .news-carousel .news-item
        img {
            max-width: 100%;
            height: 150px;
            object-fit: cover;
        }
        .news-carousel .news-content {
            padding: 15px;
        }
        .news {
            margin: 20px;
        }
        .fas {
            margin: 15px;
        }
    </style>
</head>
<body class="page-transition">

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Medi-Hub</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
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
            <div class="d-flex btn-container">
                <a href="/login" class="btn btn-outline-dark me-2">Login</a>
                <a href="/register" class="btn btn-dark">Register</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="container-fluid p-0">
        <div class="hero">
            <div class="container">
                <h1>Selamat Datang di Medi-hub</h1>
                <p>Platform Terpercaya untuk Solusi Medis</p>
            </div>
        </div>
    </div>

    <!-- Services Section -->
    <div class="container services" style="margin: 60px;">
        <h2 style="margin-top: 20px; margin-bottom: 20px;">Layanan Kami</h2>
        <div class="row">
            <div class="col-md-4 service-item">
                <img src="images/banner1.jpg" alt="Service 1">
                <h3>Pengelolaan Produk</h3>
                <p>Menyediakan solusi pengelolaan produk medis yang efisien dan terpercaya.</p>
            </div>
            <div class="col-md-4 service-item">
                <img src="images/banner2.jpg" alt="Service 2">
                <h3>Distribusi Cepat</h3>
                <p>Distribusi produk medis yang cepat dan aman ke seluruh penjuru.</p>
            </div>
            <div class="col-md-4 service-item">
                <img src="images/banner3.jpg" alt="Service 3">
                <h3>Dukungan Pelanggan</h3>
                <p>Dukungan pelanggan 24/7 untuk memastikan kepuasan dan bantuan yang dibutuhkan.</p>
            </div>
        </div>
    </div>

    <!-- Products Section -->
    <div class="container products" style="margin: 60px;">
        <h2 style="margin-top: 20px; margin-bottom: 20px;">Produk Kami</h2>
        <div class="row">
            <div class="col-md-4 product-item">
                <img src="images/banner1.jpg" alt="Product 1">
                <h3>Alat Medis</h3>
                <p>Berbagai alat medis berkualitas tinggi untuk berbagai keperluan.</p>
            </div>
            <div class="col-md-4 product-item">
                <img src="images/banner2.jpg" alt="Product 2">
                <h3>Peralatan Bedah</h3>
                <p>Peralatan bedah terbaru dengan teknologi mutakhir.</p>
            </div>
            <div class="col-md-4 product-item">
                <img src="images/banner3.jpg" alt="Product 3">
                <h3>Farmasi</h3>
                <p>Produk farmasi yang lengkap dan terpercaya untuk semua kebutuhan medis.</p>
            </div>
        </div>
    </div>

    <!-- News Section -->
    <div class="container news">
        <h2>Berita Terbaru</h2>
        <div id="news" class="row news"></div>
    </div>

    <!-- JavaScript -->
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

        // Fetch and display news
        const news = document.querySelector('#news');
        fetch('http://localhost:8080/api/news/list')
            .then(res => res.json())
            .then(data => {
                JSON.parse(JSON.stringify(data.data)).forEach(n => {
                    const col = document.createElement('div');
                    col.className = 'col-md-4 news-item';
                    const card = document.createElement('div');
                    card.className = 'card mb-4 shadow-sm';
                    const img = document.createElement('img');
                    img.src = 'images/news/' + n['image'];
                    img.className = 'card-img-top';
                    card.appendChild(img);
                    const cardBody = document.createElement('div');
                    cardBody.className = 'card-body';
                    const h3 = document.createElement('h5');
                    h3.className = 'card-title';
                    h3.innerHTML = n['title'];
                    cardBody.appendChild(h3);
                    const p = document.createElement('p');
                    p.className = 'card-text';
                    p.innerHTML = n['description'];
                    cardBody.appendChild(p);
                    card.appendChild(cardBody);
                    col.appendChild(card);
                    news.appendChild(col);
                });
            });
    </script>

    <?php include 'footer.php'; ?>
</body>
</html>
