<?php
if (isset($_GET['cat_id']) && !empty($_GET['cat_id'])) {
    $catIdToDelete = $_GET['cat_id'];
    $xmlFile = 'cats.xml';

    if (file_exists($xmlFile)) {
        $xml = simplexml_load_file($xmlFile);
        $catToDelete = null;

        foreach ($xml->cat as $index => $cat) {
            if ((string)$cat->cat_id === $catIdToDelete) {
                $catToDelete = $cat;
                break;
            }
        }

        if ($catToDelete) {
            $imagePath = (string)$catToDelete->img;

            $dom = dom_import_simplexml($catToDelete);
            $dom->parentNode->removeChild($dom);

            $xml->asXML($xmlFile);

            if (!empty($imagePath) && strpos($imagePath, 'images/') === 0 && file_exists($imagePath)) {
                unlink($imagePath);
            }

            header('Location: moning.php?message=Cat+deleted+successfully');
            exit;
        } else {
            echo 'Error: Cat with ID ' . htmlspecialchars($catIdToDelete) . ' not found.';
        }
    } else {
        echo 'Error: XML file not found.';
    }
} else {
    echo 'Error: No cat ID provided.';
}
?>


