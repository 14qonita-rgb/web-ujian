<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Playful Goods - Persis Contoh</title>
    <!-- Import Font Poppins & Icon dari FontAwesome -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        * { box-sizing: border-box; font-family: 'Poppins', sans-serif; }
        body { margin: 0; background-color: #F8FAF5; color: #333; }
        
        /* HEADER / NAVIGATION (Atas) */
        header { 
            background-color: #FFEA7F; 
            padding: 15px 50px; 
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
            position: sticky; top: 0; z-index: 1000;
        }
        .logo { font-weight: 700; font-size: 1.5em; color: #333; }
        nav { display: flex; gap: 25px; }
        nav a { text-decoration: none; color: #333; font-weight: 500; font-size: 0.95em; }
        .header-icons { display: flex; gap: 20px; font-size: 1.2em; }
        .btn-tambah-header { background: #fff; color: #333; padding: 7px 15px; border-radius: 20px; text-decoration: none; font-weight: 600; font-size: 0.85em; }

        /* PROMOTIONAL BANNER (Banner Kuning) */
        .promo-banner { 
            background: #FFED99; /* Kuning soft */
            padding: 30px 60px; 
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
            margin-top: 20px;
        }
        .promo-text { max-width: 600px; }
        .promo-tag { background: #fff; padding: 5px 10px; border-radius: 20px; font-size: 0.75em; font-weight: 600; text-transform: uppercase; }
        .promo-text h1 { font-size: 2.2em; margin: 15px 0 10px 0; color: #222; line-height: 1.2; }
        .promo-text p { color: #666; font-size: 0.95em; }
        .promo-text button { background-color: #000; color: #fff; border: none; padding: 10px 20px; border-radius: 20px; cursor: pointer; font-weight: 600; }
        .promo-image { 
            width: 200px; height: 200px; 
            background-color: #fff; border-radius: 50%; 
            display: flex; align-items: center; justify-content: center; font-size: 5em; color: #333; 
        }

        /* CATEGORIES (Kategori Bulat) */
        .categories-section { padding: 40px 60px; }
        .section-title { font-weight: 700; font-size: 1.4em; margin-bottom: 30px; }
        .categories-grid { 
            display: grid; 
            grid-template-columns: repeat(auto-fill, minmax(130px, 1fr)); 
            gap: 20px; justify-items: center; text-align: center;
        }
        .category-card { 
            background: #E8F7F0; /* Hijau mint muda */
            border-radius: 50%; width: 130px; height: 130px; 
            display: flex; flex-direction: column; align-items: center; justify-content: center; 
            transition: all 0.3s ease;
        }
        .category-card:hover { transform: scale(1.05); cursor: pointer; }
        .category-icon { font-size: 2.5em; color: #333; margin-bottom: 5px; }
        .category-name { font-size: 0.8em; font-weight: 600; text-transform: uppercase; color: #555; }

        /* PRODUCT GRID (Daftar Produk) */
        .products-section { padding: 0 60px 50px 60px; }
        .product-grid { 
            display: grid; 
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); 
            gap: 25px; 
        }
        .product-card { 
            background-color: #fff; border-radius: 15px; 
            overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.03); 
            transition: all 0.3s;
        }
        .product-card:hover { transform: translateY(-3px); }
        .p-image-box { 
            width: 100%; height: 220px; 
            display: flex; align-items: center; justify-content: center; 
            background-color: #F8FAF5; overflow: hidden; padding: 15px;
        }
        .p-image-box img { max-width: 90%; max-height: 90%; object-fit: contain; }
        .p-info { padding: 20px; }
        .p-title { font-weight: 600; font-size: 1.1em; color: #333; margin: 0; }
        .p-price { color: #000; font-weight: 700; font-size: 1em; margin: 8px 0; }
        .p-footer { display: flex; justify-content: space-between; align-items: center; margin-top: 15px; }
        .p-rating { color: #FFEA7F; font-size: 0.9em; }
        .p-btn-cart { border: none; background: none; font-size: 1.2em; cursor: pointer; color: #333; }
        .btn-hapus { font-size: 0.75em; text-decoration: none; color: #888; margin-top: 10px; display: inline-block; }

        /* RESPONSIVE (Untuk HP) */
        @media (max-width: 768px) {
            header { padding: 15px 20px; flex-direction: column; gap: 10px; text-align: center; }
            nav { flex-wrap: wrap; justify-content: center; gap: 10px; }
            .promo-banner { padding: 20px; flex-direction: column-reverse; text-align: center; }
            .promo-image { width: 150px; height: 150px; font-size: 4em; }
            .promo-text h1 { font-size: 1.8em; }
            .categories-section, .products-section { padding: 20px; }
        }
    </style>
</head>
<body>

    <!-- NAVIGASI ATAS -->
    <header>
        <div class="logo">Playful Goods</div>
        <nav>
            <a href="#">Beranda</a>
            <a href="#">Semua Produk</a>
            <a href="#">Kategori</a>
            <a href="tambah.php" class="btn-tambah-header">Add Product</a>
        </nav>
        <div class="header-icons">
            <i class="fas fa-search"></i>
            <i class="fas fa-user"></i>
            <i class="fas fa-shopping-bag"></i>
        </div>
    </header>

    <!-- BANNER PROMO KUNING -->
    <div class="promo-banner">
        <div class="promo-text">
            <span class="promo-tag">Koleksi Terbaru</span>
            <h1>Temukan Kebutuhan Harian Jadi Ceria!</h1>
            <p>Kelola data produk toko dengan mudah dan cepat. Tambah barang sesukamu.</p>
            <button>Belanja Sekarang</button>
        </div>
        <div class="promo-image">
            <i class="fas fa-shopping-cart"></i>
        </div>
    </div>

    <!-- SEKSI KATEGORI BULAT -->
    <div class="categories-section">
        <div class="section-title">Categories</div>
        <div class="categories-grid">
            <div class="category-card">
                <i class="fas fa-box-open category-icon"></i>
                <span class="category-name">Box</span>
            </div>
            <div class="category-card">
                <i class="fas fa-tshirt category-icon"></i>
                <span class="category-name">Fashion</span>
            </div>
            <div class="category-card">
                <i class="fas fa-coffee category-icon"></i>
                <span class="category-name">Coffee</span>
            </div>
            <div class="category-card">
                <i class="fas fa-couch category-icon"></i>
                <span class="category-name">Home</span>
            </div>
            <div class="category-card">
                <i class="fas fa-headphones category-icon"></i>
                <span class="category-name">Gadget</span>
            </div>
            <div class="category-card">
                <i class="fas fa-ice-cream category-icon"></i>
                <span class="category-name">Snack</span>
            </div>
        </div>
    </div>

    <!-- SEKSI DAFTAR PRODUK (GRID) -->
    <div class="products-section">
        <div class="section-title">Katalog Produk</div>
        <div class="product-grid">
            <?php
            // FITUR SELECT: Mengambil data dari MySQL
            $sql = mysqli_query($koneksi, "SELECT * FROM produk") or die(mysqli_error($koneksi));
            while ($row = mysqli_fetch_assoc($sql)) {
            ?>
            <div class="product-card">
                <div class="p-image-box">
                    <img src="uploads/<?= $row['gambar']; ?>" alt="Foto Produk">
                </div>
                <div class="p-info">
                    <h3 class="p-title"><?= $row['nama_produk']; ?></h3>
                    <div class="p-rating">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                    </div>
                    <p class="p-price">Rp <?= number_format($row['harga'], 0, ',', '.'); ?></p>
                    <div class="p-footer">
                        <button class="p-btn-cart"><i class="fas fa-shopping-basket"></i></button>
                        <a href="hapus.php?id=<?= $row['id']; ?>" class="btn-hapus" onclick="return confirm('Hapus produk <?= $row['nama_produk']; ?>?')">hapus</a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>

</body>
</html>