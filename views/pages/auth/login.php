<!DOCTYPE html>
<html>
<head><title>Login Admin</title></head>
<body>
<h2>Login Admin</h2>
<?php if(isset($_SESSION['error'])): ?>
<p style="color:red; font-weight:bold;"><?= $_SESSION['error']; unset($_SESSION['error']); ?></p>
<?php endif; ?>

<form method="POST" action="/login">
  <label>Username:</label><br>
  <input type="text" name="username" value="admin" required><br><br>
  <label>Password:</label><br>
  <input type="password" name="password" value="password" required><br><br>
  <button type="submit">Login</button>
</form>

<p><small>User: admin / Pass: password</small></p>
</body>
</html>