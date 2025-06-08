<?php
require_once 'includes/db.php';
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $email = trim($_POST['email']);
    // Sprawdź czy użytkownik lub email już istnieje
    $stmt = $pdo->prepare('SELECT id FROM users WHERE username = ? OR email = ?');
    $stmt->execute([$username, $email]);
    if ($stmt->fetch()) {
        $error = 'Użytkownik lub email już istnieje!';
    } else {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare('INSERT INTO users (username, password, email) VALUES (?, ?, ?)');
        $stmt->execute([$username, $hash, $email]);
        header('Location: login.php');
        exit();
    }
}
?>
<?php include 'includes/header.php'; ?>
<div style="display:flex;justify-content:center;align-items:center;min-height:60vh;">
  <form method="post" action="register.php" class="login-form" style="margin-top:0;">
    <label>Nazwa</label>
    <input type="text" name="username" required>
    <label>Hasło</label>
    <input type="password" name="password" required>
    <label>Email address</label>
    <input type="email" name="email" required>
    <?php if ($error): ?><div style="color:#b00; font-weight:bold; margin-bottom:10px; text-align:center;"> <?= $error ?> </div><?php endif; ?>
    <button type="submit">Zarejestruj</button>
  </form>
</div>
<?php include 'includes/footer.php'; ?> 