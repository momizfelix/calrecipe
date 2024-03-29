<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["apk_file"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["apk_file"]["name"]);

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
    } else {
        // Upload file
        if (move_uploaded_file($_FILES["apk_file"]["tmp_name"], $target_file)) {
            echo "The file " . basename($_FILES["apk_file"]["name"]) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>APK File Uploader</title>
</head>
<body>
    <h2>Upload APK File</h2>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="apk_file" required>
        <button type="submit" name="submit">Upload</button>
    </form>
</body>
</html>
