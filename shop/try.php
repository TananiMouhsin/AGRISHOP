<!DOCTYPE html>
<html>
<head>
    <title>Image Upload</title>
    <style>
        /* Add some CSS to style the drop zone */
        #drop-zone {
            border: 2px dashed #ccc;
            padding: 20px;
            text-align: center;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Upload an Image</h1>
    
    <!-- Create a drop zone for the image -->
    <div id="drop-zone">
        <p>Drag and drop an image here, or click to select one.</p>
        <input type="file" id="image-input" style="display: none;">
        <button id="upload-button" style="display: none;">Upload</button>
    </div>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" style="display: none;">
        <input type="file" name="image" id="image">
        <input type="submit" value="Upload">
    </form>

    <?php
    $targetDirectory = "images/";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // ... (rest of your PHP code remains unchanged)
    }
    ?>

    <script>
        // JavaScript to handle the drag and drop functionality
        const dropZone = document.getElementById('drop-zone');
        const imageInput = document.getElementById('image-input');
        const uploadButton = document.getElementById('upload-button');

        dropZone.addEventListener('dragover', (e) => {
            e.preventDefault();
            dropZone.style.border = '2px dashed #aaa';
        });

        dropZone.addEventListener('dragleave', () => {
            dropZone.style.border = '2px dashed #ccc';
        });

        dropZone.addEventListener('drop', (e) => {
            e.preventDefault();
            dropZone.style.border = '2px dashed #ccc';
            const files = e.dataTransfer.files;
            if (files.length > 0) {
                imageInput.files = files;
                uploadButton.style.display = 'block';
            }
        });

        // Open the file input when the drop zone is clicked
        dropZone.addEventListener('click', () => {
            imageInput.click();
        });

        // Show the button when a file is selected using the input
        imageInput.addEventListener('change', () => {
            uploadButton.style.display = 'block';
        });

        // Trigger form submission when the button is clicked
        uploadButton.addEventListener('click', () => {
            document.querySelector('form').style.display = 'block';
            document.querySelector('form').submit();
        });
    </script>
</body>
</html>
