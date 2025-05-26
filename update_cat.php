<?php
$xml = simplexml_load_file('cats.xml');

if (!isset($_GET['cat_id'])) {
    die('Cat ID not specified.');
}

$target_id = $_GET['cat_id'];
$catToUpdate = null;

foreach ($xml->cat as $cat) {
    if ((string)$cat->cat_id === $target_id) {
        $catToUpdate = $cat;
        break;
    }
}

if (!$catToUpdate) {
    die('Cat not found.');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $catToUpdate->name = $_POST['name'];
    $catToUpdate->age = $_POST['age'];
    $catToUpdate->rescued_date = $_POST['rescued_date'];
    $catToUpdate->breed = $_POST['breed'];
    $catToUpdate->class = $_POST['class'];

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'images/';
        $filename = basename($_FILES['image']['name']);
        $targetFile = $uploadDir . time() . '_' . $filename;

        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
            $catToUpdate->img = $targetFile;
        }
    }

    $xml->asXML('cats.xml');
    header('Location: moning.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Cat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
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
        <h2 class="form-title text-center">Update Cat Details</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Cat ID (readonly)</label>
                <input type="text" class="form-control" value="<?php echo htmlspecialchars($catToUpdate->cat_id); ?>" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Cat Name</label>
                <input type="text" name="name" class="form-control" value="<?php echo htmlspecialchars($catToUpdate->name); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Age</label>
                <input type="number" name="age" class="form-control" value="<?php echo htmlspecialchars($catToUpdate->age); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Rescued Date</label>
                <input type="date" name="rescued_date" class="form-control" value="<?php echo htmlspecialchars($catToUpdate->rescued_date); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Breed</label>
                <input type="text" name="breed" class="form-control" value="<?php echo htmlspecialchars($catToUpdate->breed); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Classification</label>
                <select name="class" class="form-select" required>
                    <?php
                    $options = ['kitten', 'rescued', 'senior', 'disabled'];
                    foreach ($options as $option) {
                        $selected = ($catToUpdate->class == $option) ? 'selected' : '';
                        echo "<option value='$option' $selected>" . ucfirst($option) . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-4">
                <label class="form-label">Update Picture</label>
                <input type="file" name="image" class="form-control" accept="image/*">
                <div class="mt-2">
                    <img src="<?php echo htmlspecialchars($catToUpdate->img); ?>" alt="Current image" style="max-height: 150px; border-radius: 8px;">
                </div>
            </div>
            <button type="submit" class="btn btn-success">Update Cat</button>
        </form>
    </div>
</div>

</body>
</html>
