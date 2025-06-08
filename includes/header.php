<?php
if (session_status() === PHP_SESSION_NONE) session_start();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>shopg</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap" rel="stylesheet">
</head>
<body>
<div class="header banner-header">
  <nav>
    <div class="nav-left">
      <a href="index.php">Strona Główna</a>
      <a href="cart.php">Koszyk</a>
      <a href="about.php">O nas</a>
    </div>
    <div class="nav-right">
      <?php if (!empty($_SESSION['user'])): ?>
        <span style="color:#fff; background:#000; border-radius:7px; padding:12px 28px; font-weight:700; font-size:1.1rem;">Zalogowano: <?= htmlspecialchars($_SESSION['user']['username']) ?></span>
        <a href="logout.php">Wyloguj</a>
      <?php else: ?>
        <a href="login.php">Zaloguj</a>
        <a href="register.php">Zarejestruj</a>
      <?php endif; ?>
    </div>
  </nav>
  <img src="assets/img/logo.png" class="logo" alt="shopg logo" style="margin-top:60px;">
</div> 