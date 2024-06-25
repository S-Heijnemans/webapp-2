<?php
function upload_image($connection, $city_id): void
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!empty($_FILES['fileToUpload'])) {

            $stmt3 = $connection->prepare("INSERT INTO images (image_url, image, city_id) VALUES (:image_url, :image, :city_id)");

            $target_dir = "../../assets/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $uploadMessage = '';

            // Check if image file is a actual image or fake image
            if ($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg") {
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if ($check !== false) {
                    $uploadMessage .= "File is an image - " . $check["mime"] . ".<br>";
                } else {
                    $uploadMessage .= "File is not an image.<br>";
                    $uploadOk = 0;
                }
            } else {
                $uploadMessage .= "Sorry, only JPG, JPEG, PNG files are allowed.<br>";
                $uploadOk = 0;
            }

            // Check file size
            if ($_FILES["fileToUpload"]["size"] > 500000) {
                $uploadMessage .= "Sorry, your file is too large.<br>";
                $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                $uploadMessage .= "Sorry, your file was not uploaded.<br>";
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    $uploadMessage .= "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.<br>";
                    $target_dir = "/assets/";
                    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

                    try {
                        $stmt3->bindParam(':image_url', $target_file, PDO::PARAM_STR);
                        $stmt3->bindParam(':image', $_FILES["fileToUpload"]["name"], PDO::PARAM_STR);
                        $stmt3->bindParam(':city_id', $city_id, PDO::PARAM_INT);

                        if ($stmt3->execute()) {
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
            $_SESSION['form_errors'] = $uploadMessage;
        } else {
            die("No file uploaded");
        }
    } else {
        header("Location: /");
        die();
    }
}
?>
