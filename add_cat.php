<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $xml = simplexml_load_file('cats.xml');

    $cat_id = $_POST['cat_id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $rescued_date = $_POST['rescued_date'];
    $breed = $_POST['breed'];
    $class = $_POST['class'];

    $imagePath = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'images/';
        $filename = basename($_FILES['image']['name']);
        $targetFile = $uploadDir . time() . '_' . $filename;

        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
            $imagePath = $targetFile;
        }
    }

    $newCat = $xml->addChild('cat');
    $newCat->addChild('cat_id', $cat_id);
    $newCat->addChild('name', $name);
    $newCat->addChild('age', $age);
    $newCat->addChild('rescued_date', $rescued_date);
    $newCat->addChild('breed', $breed);
    $newCat->addChild('class', $class);
    $newCat->addChild('img', $imagePath);

    $xml->asXML('cats.xml');
    header('Location: moning.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Cat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background: #f8f9fa;
        }

        .form-wrapper {
            background: #ffffff;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
            max-width: 700px;
            margin: auto;
        }

        .form-title {
            font-weight: bold;
            margin-bottom: 30px;
            color: #343a40;
        }

        label {
            font-weight: 500;
        }

        .btn-success {
            width: 100%;
            padding: 12px;
            font-weight: bold;
        }

        .form-control:focus {
            box-shadow: 0 0 0 0.25rem rgba(25, 135, 84, 0.25);
        }
    </style>
</head>
<body>

<?php include('navbar.php'); ?>

<div class="container py-5">
    <div class="form-wrapper">
        <h2 class="form-title text-center">Add a New Cat</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="cat_id" class="form-label">Cat ID</label>
                <input type="text" name="cat_id" id="cat_id" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Cat Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="age" class="form-label">Age</label>
                <input type="number" name="age" id="age" class="form-control" min="0" required>
            </div>
            <div class="mb-3">
                <label for="rescued_date" class="form-label">Rescued Date</label>
                <input type="date" name="rescued_date" id="rescued_date" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="breed" class="form-label">Breed</label>
                <input type="text" name="breed" id="breed" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="class" class="form-label">Classification</label>
                <select name="class" id="class" class="form-select" required>
                    <option value="kitten">Kitten</option>
                    <option value="rescued">Rescued</option>
                    <option value="senior">Senior</option>
                    <option value="disabled">Disabled</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="image" class="form-label">Cat Picture</label>
                <input type="file" name="image" id="image" class="form-control" accept="image/*" required>
            </div>
            <button type="submit" class="btn btn-success">Add Cat</button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

