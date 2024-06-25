<?php
//function upload_image($connection, $city_id): void
{


    // Count total files
    $countfiles = count($_FILES['files']['name']);

    // Prepared statement
    $query = "INSERT INTO images (image_url,image) VALUES(?,?)";

    $statement = $connection->prepare($query);

    // Loop all files
    for ($i = 0; $i < $countfiles; $i++) {

        // File name
        $filename = $_FILES['files']['name'][$i];

        // Location
        $target_file1 = '../assets/' . $filename;
        $target_file = '/assets/' . $filename;

        // file extension
        $file_extension = pathinfo(
            $target_file, PATHINFO_EXTENSION);

        $file_extension = strtolower($file_extension);

        // Valid image extension
        $valid_extension = array("png", "jpeg", "jpg");

        if (in_array($file_extension, $valid_extension)) {

            // Upload file
            if (move_uploaded_file(
                $_FILES['files']['tmp_name'][$i],
                $target_file1)
            ) {
                // Execute query
                $statement->execute(array($target_file, $filename));
            }
        }
    }

    echo "File upload successfully";

}


?>