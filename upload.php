<?php

$the_msg = "";

if(isset($_POST['submit'])){

    $upload_errors = array(
        UPLOAD_ERR_OK           => "There is no error!",
        UPLOAD_ERR_INI_SIZE     => "The uploaded file exceeds max file size!",
        UPLOAD_ERR_FORM_SIZE    => "The uploaded file exceeds MAX_FILE_SIZE directive.",
        UPLOAD_ERR_PARTIAL      => "The uploaded file was only partially uploaded.",
        UPLOAD_ERR_NO_FILE      => "No file was uploaded",
        UPLOAD_ERR_NO_TMP_DIR   => "Missing a temporary folder.",
        UPLOAD_ERR_CANT_WRITE   => "Failed to write file to disk.",
        UPLOAD_ERR_EXTENSION    => "A php extension stops the file upload."
    );

        $temp_name  = $_FILES['file_upload']['tmp_name'];       //getting temp path
        $the_file   = $_FILES['file_upload']['name'];           //getting file name
        $directory  = "uploads";                                //our upload file-name

        if(move_uploaded_file($temp_name, $directory."/".$the_file)) {
            //first parameter     => source
            //and the second one  => destination

            $the_msg   = "<h3> This file uploaded successfully!</h3>";

        } else {
            $the_error = $_FILES['file_upload']['error'];
            $the_msg   = $upload_errors[$the_error];
        }
          
        /*
        file info array // we use print_r for displaying arrays.
        echo "<pre>";
        print_r($_FILES['file_upload']);  
        echo "</pre>";
        */
    
}

?>


<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="utf-8">
    <title>File Uploading with PHP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

    <h2>
    
        <?php
            if(!empty($upload_errors)) {
                echo $the_msg;
            }


        ?>
    
    </h2>

    <!-- form to uploading files UI  // if type is file enctype must be added -->
    <form action ="upload.php" enctype="multipart/form-data" method="post">
        <input type="file" name="file_upload" />
        <input type="submit" name="submit" value="upload" />
    
    </form>

</body>

</html>