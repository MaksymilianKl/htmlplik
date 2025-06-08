<?php
session_start();
require_once 'includes/db.php';
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $stmt = $pdo->prepare('SELECT * FROM users WHERE username = ?');
    $stmt->execute([$username]);
    $user = $stmt->fetch();
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = [
            'id' => $user['id'],
            'username' => $user['username']
        ];
        header('Location: index.php');
        exit();
    } else {
        $error = 'Nieprawidłowa nazwa lub hasło!';
    }
}
?>
<?php include 'includes/header.php'; ?>
<div style="display:flex;justify-content:center;align-items:center;min-height:60vh;">
  <form method="post" action="login.php" class="login-form" style="margin-top:0;">
    <label>Nazwa</label>
    <input type="text" name="username" required>
    <label>Hasło</label>
    <input type="password" name="password" required>
    <?php if ($error): ?><div style="color:#b00; font-weight:bold; margin-bottom:10px; text-align:center;"> <?= $error ?> </div><?php endif; ?>
    <button type="submit">Zaloguj</button>
  </form>
</div>
<?php include 'includes/footer.php'; ?> 