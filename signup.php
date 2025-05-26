<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Signup - CAT-ipunan Adoption Center</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@400;600;700;800&display=swap" rel="stylesheet" />
  <style>
       body {
      font-family: 'Montserrat Alternates', sans-serif;
      background: linear-gradient(135deg, #4a90e2, #357ABD, #1B3A8C);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0;
    }

    .signup-card {
      width: 100%;
      max-width: 450px;
      background: rgba(255, 255, 255, 0.95);
      border-radius: 15px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.25);
      padding: 30px;
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
    }

    .signup-card h4 {
      margin-bottom: 25px;
      font-weight: 700;
      color: #1B3A8C;
    }

    .form-control {
      border-radius: 10px;
    }

    .form-control:focus {
      box-shadow: none;
      border-color: #295F98;
    }

    .btn-signup {
      background-color: #1B3A8C;
      color: #fff;
      border-radius: 10px;
      font-weight: 600;
      text-transform: uppercase;
      transition: background-color 0.3s ease;
    }

    .btn-signup:hover {
      background-color: #295F98;
    }

    .form-text {
      font-size: 0.9rem;
      color: #555;
    }

    a {
      color: #1B3A8C;
      text-decoration: none;
    }

    a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

<div class="signup-card">
  <h4 class="text-center">Create an Account</h4>

  <form action="signup_process.php" method="POST">
    <div class="mb-3">
      <label for="fullname" class="form-label">Full Name</label>
      <input type="text" class="form-control" id="fullname" name="fullname" required>
    </div>

    <div class="mb-3">
      <label for="username" class="form-label">Username</label>
      <input type="text" class="form-control" id="username" name="username" required>
    </div>

    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control" id="password" name="password" required>
    </div>

    <div class="mb-3">
      <label for="confirm_password" class="form-label">Confirm Password</label>
      <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
    </div>

    <button type="submit" class="btn btn-signup w-100 mt-3">Sign Up</button>

    <p class="form-text text-center mt-3">Already have an account? <a href="index.php">Login here</a></p>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
