<?php
include("config/config.php");

$api_key = "176e3373bf8e4d978cf5fbe52d696dc7";
$url = "https://newsapi.org/v2/top-headlines?country=us&apiKey=" . $api_key;

$data = http_request_get($url);
$hasil = json_decode($data, true);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Berita Indonesia - Rico Aditio</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <style>
.card {
  transition: transform 0.3s ease, box-shadow 0.3s ease; /* Animasi halus */
  cursor: pointer; /* Kursor berubah menjadi pointer */
}

.card:hover {
  transform: scale(1.05); /* Membesarkan seluruh card */
  z-index: 10;
  box-shadow: 0 15px 30px rgba(0,0,0,0.3); /* Bayangan lebih menonjol */
}

.card-img-top {
  transition: transform 0.3s ease;
}

.card:hover .card-img-top {
  transform: scale(1.1); /* Zoom gambar sedikit lebih besar dari card */
}
</style>

</head>
<body>

<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-info">
  <a class="navbar-brand" href="#">Portal Berita Rico Aditio</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
      <li class="nav-item active"><a class="nav-link" href="news.php">News</a></li>
      <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
    </ul>
  </div>
</nav>

<div class="container" style="margin-top:80px;">
  <div class="row">
  <?php 
  if (!empty($hasil['articles'])) {
    foreach ($hasil['articles'] as $row) { 
      if (!empty($row['urlToImage'])) {
  ?>
    <div class="col-md-4 mb-4">
      <div class="card">
        <img src="<?php echo $row['urlToImage']; ?>" class="card-img-top" alt="Gambar Berita" height="200px">
        <div class="card-body">
          <h6 class="card-title"><?php echo $row['title']; ?></h6>
          <p class="card-text"><i><?php echo $row['author'] ?: 'Anonim'; ?></i></p>
          <a href="<?php echo $row['url']; ?>" class="btn btn-info btn-sm" target="_blank">Baca Selengkapnya</a>
        </div>
      </div>
    </div>
  <?php 
      } 
    } 
  } else {
      echo "<p>Tidak ada berita yang dapat ditampilkan.</p>";
  }
  ?>
  </div>
</div>

<script src="js/jquery-3.4.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
