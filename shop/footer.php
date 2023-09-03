<!DOCTYPE html>
<html>
<head>
    <title>Image Upload and Display</title>
</head>
<body>
    <h2>Upload an Image</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="image" accept="image/*">
        <input type="submit" name="upload" value="Upload Image">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['upload'])) {
        // Database connection parameters
        $hostname = 'localhost';
        $username = 'root';
        $password = '';
        $database = 'imagetest';

        // Create a database connection
        $conn = mysqli_connect($hostname, $username, $password, $database);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Handle image upload
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            // Read the image file content
            $imageData = file_get_contents($_FILES['image']['tmp_name']);

            // Insert the image data into the database as a BLOB
            $sql = "INSERT INTO images (img) VALUES (?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("b", $imageData);

            if ($stmt->execute()) {
                echo "Image uploaded and stored in the database successfully!";
            } else {
                echo "Error storing image in the database: " . $conn->error;
            }
        } else {
            echo "No file uploaded or file upload error occurred.";
        }

        // Close the database connection
        mysqli_close($conn);
    }
    ?>

    <h2>Uploaded Images</h2>
    <?php
    // Database connection parameters
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'imagetest';

    // Create a database connection
    $conn = mysqli_connect($hostname, $username, $password, $database);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Retrieve the images from the database
    $sql = "SELECT image_data FROM images  ";
    $result = $conn->query($sql);

    // Display the images
    while ($row = $result->fetch_assoc()) {
        echo '<img src="data:image/jpeg;base64,' . base64_encode($row['img']) . '" alt="Image">';
    }

    // Close the database connection
    mysqli_close($conn);
    ?>
</body>
</html>

<div class="orders">
        <table>
          <tr>
            <th>product</th>
            <th>username</th>
            <th>email</th>
            <th>adress</th>
            <th>quantity</th>
          </tr>
          <tr>
            <td>product title</td>
            <td>kirigayaa</td>
            <td>kirigayakasuto@gmail.com</td>
            <td>hay arrajaa filah rue 06 N 07 </td>
            <td>5</td>
          </tr>
          <tr>
            <td>product title</td>
            <td>kirigayaa</td>
            <td>kirigayakasuto@gmail.com</td>
            <td>hay arrajaa filah rue 06 N 07 </td>
            <td>5</td>
          </tr>
          <tr>
            <td>product title</td>
            <td>kirigayaa</td>
            <td>kirigayakasuto@gmail.com</td>
            <td>hay arrajaa filah rue 06 N 07 </td>
            <td>5</td>
          </tr>
          <tr>
            <td>product title</td>
            <td>kirigayaa</td>
            <td>kirigayakasuto@gmail.com</td>
            <td>hay arrajaa filah rue 06 N 07 </td>
            <td>5</td>
          </tr>

        </table>
        
      </div>