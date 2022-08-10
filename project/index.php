
<?php include "header.php"; ?>

    <div id="wrapper">

  

        <form class="form" method="POST" action="" enctype="multipart/form-data">        

            <input type="file" name="choosefile" value="" /><br><br>
            <!-- <input type="text" name="uname" placeholder="user name" value="" /><br><br>
            <input type="text" name="email" placeholder="email" value="" /><br><br>
            <textarea name="text" id="" cols="30" rows="10"></textarea> -->

            <div>

                <button class="btn"  type="submit" name="uploadfile">

                UPLOAD

                </button>

            </div>

        </form>

    </div>


<?php

error_reporting(0);

?>

<?php
$msg = ""; 

// check if the user has clicked the button "UPLOAD" 
if (isset($_POST['uploadfile'])) {
    // $username = $_POST['uname'];
    // $uemail = $_POST['email'];
    $filename = $_FILES["choosefile"]["name"];

    $tempname = $_FILES["choosefile"]["tmp_name"];  

        $folder = "image/".$filename;   

    // connect with the database

    $db = mysqli_connect("localhost", "root", "", "Image_Upload"); 

        // query to insert the submitted data

        $sql = "INSERT INTO image (filename) VALUES ('$filename')";

        // function to execute above query

        mysqli_query($db, $sql);       

        // Add the image to the "image" folder"

        if (move_uploaded_file($tempname, $folder)) {

            $msg = "Image uploaded successfully";

        }else{

            $msg = "Failed to upload image";

    }

}

$result = mysqli_query($db, "SELECT * FROM image");

?>
<?php include "footer.php"; ?>