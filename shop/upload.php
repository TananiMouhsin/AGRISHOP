<?php
if (isset($_FILES['image1']) && isset($_FILES['image2']) && isset($_FILES['image3'])) {
    $conn = mysqli_connect('localhost', 'root', '', 'shop');

    // Process and move the uploaded image files
    $img1 = uploadImage($_FILES['image1'], 'images/');
    $img2 = uploadImage($_FILES['image2'], 'images/');
    $img3 = uploadImage($_FILES['image3'], 'images/');

    // Check if all images were uploaded successfully
    if ($img1 !== false && $img2 !== false && $img3 !== false) {
        // Store the image filenames in the database (adjust SQL query accordingly)
        $sql = "INSERT INTO product (UserID, img1, img2, img3) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $userid, $img1, $img2, $img3);

        if ($stmt->execute()) {
            echo "Images uploaded and added to the database successfully!";
        } else {
            echo "Error adding images to the database: " . $conn->error;
        }
    } else {
        echo "Error uploading one or more images.";
    }
}

function uploadImage($file, $targetDir) {
    $targetFile = $targetDir . basename($file["name"]);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if the file is an actual image
    $check = getimagesize($file["tmp_name"]);
    if ($check === false) {
        return false;
    }

    // Check file size (adjust as needed)
    if ($file["size"] > 5000000) {
        return false;
    }

    // Allow only specific image file types (you can adjust this list)
    if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png") {
        return false;
    }

    // Move the uploaded file to the target directory
    if (move_uploaded_file($file["tmp_name"], $targetFile)) {
        return basename($targetFile);
    } else {
        return false;
    }
}
?>
