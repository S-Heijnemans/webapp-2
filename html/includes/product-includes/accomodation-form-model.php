<?php


$target_dir = "assets/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$uploadMessage = '';

// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        $uploadMessage .= "File is an image - " . $check["mime"] . ".<br>";
        $uploadOk = 1;
    } else {
        $uploadMessage .= "File is not an image.<br>";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    $uploadMessage .= "Sorry, file already exists.<br>";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    $uploadMessage .= "Sorry, your file is too large.<br>";
    $uploadOk = 0;
}

// Allow certain file formats
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif") {
    $uploadMessage .= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $uploadMessage .= "Sorry, your file was not uploaded.<br>";
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $uploadMessage .= "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.<br>";

        // Database insertion part
        try {
            require_once '../conn.php';
            $sql = "INSERT INTO images (image_url, image) VALUES (:image_url, :image)";
            $stmt5 = $connection->prepare($sql);
            $stmt5->bindParam(':image_url', $target_file, PDO::PARAM_STR);
            $stmt5->bindParam(':image', $_FILES["fileToUpload"]["name"], PDO::PARAM_STR);
            if ($stmt5->execute()) {
                $uploadMessage .= "Image information saved in the database.<br>";
            } else {
                $uploadMessage .= "Failed to save image information in the database.<br>";
            }
        } catch (PDOException $e) {
            $uploadMessage .= 'Query failed: ' . $e->getMessage() . '<br>';
        }

    } else {
        $uploadMessage .= "Sorry, there was an error uploading your file.<br>";
    }
}
echo $uploadMessage;

?>