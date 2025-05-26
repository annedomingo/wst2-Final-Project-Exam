<?php
session_start();

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (file_exists('users.xml')) {
        $xml = simplexml_load_file('users.xml');
        $found = false;

        foreach ($xml->user as $user) {
            if ((string)$user->username === $username && password_verify($password, (string)$user->password)) {
                $found = true;
                $_SESSION['username'] = (string)$user->username;
                $_SESSION['fullname'] = (string)$user->fullname;
                header('Location: home.php');
                exit;
            }
        }

        if (!$found) {
            $error = "Invalid username or password.";
        }
    } else {
        $error = "User data file not found.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@400;600;700;800&display=swap" rel="stylesheet" />
  <style>
    body {
  font-family: 'Montserrat Alternates', sans-serif;
  background: linear-gradient(135deg,black, #357ABD,black);
  min-height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  margin: 0;
}

.login-container {
  max-width: 400px;
  width: 100%;
  background: rgba(255, 255, 255, 0.95);
  padding: 30px;
  border-radius: 15px;
  box-shadow: 0 6px 20px rgba(0, 0, 0, 0.25);
  backdrop-filter: blur(10px);
  -webkit-backdrop-filter: blur(10px);
}

h2 {
  font-size: 1.8rem;
  font-weight: 600;
  margin-bottom: 20px;
  color: #1B3A8C;
}

button {
  font-size: 0.9rem;
  font-weight: 700;
  outline: none;
  border: none;
  background-color: #1B3A8C;
  color: white;
  padding: 13px 30px;
  text-transform: uppercase;
  cursor: pointer;
  transition: 0.3s ease;
  border-radius: 6px;
}

button:hover {
  background-color #295F98;
}

.form-control:focus {
  box-shadow: none;
  border-color: #295F98;
}

.error {
  color: #F2385A;
  font-size: 0.9rem;
}

  </style>
</head>
<body>

<div class="login-container">
  <h2 class="text-center">Login</h2>
  
  <?php if (!empty($error)): ?>
    <p class="error text-center"><?php echo $error; ?></p>
  <?php endif; ?>

  <form method="POST" action="">
    <div class="mb-3">
      <label for="username" class="form-label">Username</label>
      <input type="text" name="username" id="username" class="form-control" required />
    </div>
    <div class="mb-4">
      <label for="password" class="form-label">Password</label>
      <input type="password" name="password" id="password" class="form-control" required />
    </div>
    <div class="d-grid mb-2">
      <button type="submit">Login</button>
    </div>
    <p class="text-center mt-3">Don’t have an account? <a href="signup.php">Sign up</a></p>
  </form>
</div>

</body>
</html>

