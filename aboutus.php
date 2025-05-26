<?php
$hoomans = simplexml_load_file('hooman.xml');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>About Us</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f4f7f9;
      margin: 0;
    }

    .team-section {
      padding: 60px 20px;
    }

    .team-header {
      text-align: center;
      margin-bottom: 50px;
    }

    .team-header h2 {
      font-size: 2.5rem;
      font-weight: bold;
      color: #2a2d34;
    }

    .team-header p {
      font-size: 1.1rem;
      color: #666;
      max-width: 600px;
      margin: 0 auto;
    }

    .team-card {
      background: #fff;
      border-radius: 15px;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
      overflow: hidden;
      transition: transform 0.3s ease;
    }

    .team-card:hover {
      transform: translateY(-10px);
    }

    .team-card img {
      width: 100%;
      height: 300px;
      object-fit: cover;
    }

    .team-card-body {
      padding: 20px;
    }

    .team-card-body h4 {
      font-size: 1.25rem;
      margin-bottom: 5px;
      color: #2a2d34;
    }

    .team-card-body small {
      color: #888;
    }

    .team-card-body p {
      font-size: 0.95rem;
      color: #555;
      margin-top: 10px;
    }
  </style>
</head>
<body>

<?php include('navbar.php'); ?>

<section class="team-section container">
  <div class="team-header">
    <h2>Meet the Team</h2>
    <p>These are the dedicated individuals who keep CAT-ipunan Adoption Center running with love and compassion.</p>
  </div>

  <div class="row g-4">
    <?php foreach ($hoomans->hooman as $h): ?>
      <div class="col-md-4">
        <div class="team-card">
          <img src="<?php echo htmlspecialchars($h->picture); ?>" alt="<?php echo htmlspecialchars($h->name); ?>">
          <div class="team-card-body">
            <h4><?php echo htmlspecialchars($h->name); ?></h4>
            <small>ID: <?php echo htmlspecialchars($h->emp_id); ?> | Age: <?php echo htmlspecialchars($h->age); ?></small><br>
            <small>Birthday: <?php echo htmlspecialchars($h->birthday); ?></small>
            <p><?php echo htmlspecialchars($h->bio); ?></p>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>

</body>
</html>
