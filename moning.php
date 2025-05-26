<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Meet the Monings</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="style.css" />
    <style>
        .btn-view {
            background-color: #79adcc !important;
            color: #000 !important;
            text-transform: none !important;
        }
        .btn-delete {
            background-color: #F2385A !important;
            color: #fff !important;
        }
        .btn-add {
            background-color: #adf7b6 !important;
            color: #000 !important;
        }
        .btn-update {
            background-color: #ffee93 !important;
            color: #000 !important;
        }
    </style>
</head>
<body>

<?php include('navbar.php'); ?>

<?php
$xml = simplexml_load_file('cats.xml');

$search_query = isset($_GET['search']) ? strtolower(trim($_GET['search'])) : '';
$filteredCats = [];

foreach ($xml->cat as $cat) {
    $id = strtolower((string)$cat->cat_id);
    $name = strtolower((string)$cat->name);
    $age = strtolower((string)$cat->age);
    $rescued = strtolower((string)$cat->rescued_date);
    $breed = strtolower((string)$cat->breed);
    $class = strtolower((string)$cat->class);

    if (
        $search_query === '' ||
        strpos($id, $search_query) !== false ||
        strpos($name, $search_query) !== false ||
        strpos($age, $search_query) !== false ||
        strpos($rescued, $search_query) !== false ||
        strpos($class, $search_query) !== false ||
        strpos($breed, $search_query) !== false
    ) {
        $filteredCats[] = $cat;
    }
}
?>

<section id="adopt" class="container mt-5 py-5">
    <div class="product-section">
        <div class="container">
            <h3>Monings</h3>
            <hr />
            <p>Meet the Most adorable Monings</p>

            <div class="mb-4">
                <a href="add_cat.php" class="btn btn-add">+ Add Cat</a>
            </div>

            <form action="" method="GET" class="mb-4">
                <div class="input-group">
                    <input
                        type="text"
                        class="form-control"
                        name="search"
                        placeholder="Search by ID, name, age, date, breed..."
                        value="<?php echo htmlspecialchars($search_query); ?>"
                    />
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>
        </div>

        <div class="row mx-auto container">
            <?php foreach ($filteredCats as $cat): ?>
                <div class="product text-center col-md-4 col-sm-12 mb-4">
                    <img
                        class="img-fluid mb-3"
                        src="<?php echo htmlspecialchars($cat->img); ?>"
                        alt="<?php echo htmlspecialchars($cat->name); ?>"
                        style="object-fit: cover; aspect-ratio: 1 / 1;"
                    />
                    <h5 class="p-name">
                        <?php echo htmlspecialchars($cat->name); ?> (<?php echo htmlspecialchars($cat->class); ?>)
                    </h5>

                    <div class="d-flex justify-content-center gap-2">
                        <button
                            class="btn btn-view btn-sm"
                            onclick="showCatModal(
                                '<?php echo addslashes($cat->name); ?>',
                                '<?php echo addslashes($cat->class); ?>',
                                '<?php echo addslashes($cat->breed); ?>',
                                '<?php echo addslashes($cat->age); ?>',
                                '<?php echo addslashes($cat->rescued_date); ?>',
                                '<?php echo addslashes($cat->img); ?>'
                            )">
                            View
                        </button>
                        <a href="update_cat.php?cat_id=<?php echo urlencode($cat->cat_id); ?>" class="btn btn-update btn-sm">Update</a>
                        <a
                            href="delete_cat.php?cat_id=<?php echo $cat->cat_id; ?>"
                            class="btn btn-delete btn-sm"
                            onclick="return confirm('Are you sure you want to delete this cat?');"
                        >
                            Delete
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php include('footer.php'); ?>

<div
    class="modal fade"
    id="catModal"
    tabindex="-1"
    aria-labelledby="catModalLabel"
    aria-hidden="true"
>
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="catModalLabel">Cat Profile</h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body row">
                <div class="col-md-6">
                    <img
                        id="CatImage"
                        src=""
                        class="img-fluid rounded"
                        alt="Cat Image"
                        style="object-fit: cover; aspect-ratio: 1 / 1;"
                    />
                </div>
                <div class="col-md-6">
                    <h4 id="CatName"></h4>
                    <p><strong>Class:</strong> <span id="CatClass"></span></p>
                    <p><strong>Breed:</strong> <span id="CatBreed"></span></p>
                    <p><strong>Age:</strong> <span id="CatAge"></span> years</p>
                    <p><strong>Rescued Date:</strong> <span id="CatRescue"></span></p>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function showCatModal(name, catClass, breed, age, rescuedDate, imgSrc) {
        document.getElementById('CatName').innerText = name;
        document.getElementById('CatClass').innerText = catClass;
        document.getElementById('CatBreed').innerText = breed;
        document.getElementById('CatAge').innerText = age;
        document.getElementById('CatRescue').innerText = rescuedDate;
        document.getElementById('CatImage').src = imgSrc;

        let catModal = new bootstrap.Modal(document.getElementById('catModal'));
        catModal.show();
    }
</script>
</body>
</html>
