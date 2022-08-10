<?php include "header.php" ?>




    <?php

 
$db = mysqli_connect("localhost", "root", "", "Image_Upload"); 



    //export data from database
    $query = "SELECT * FROM image";
    $result = mysqli_query($db,$query);

    if($result){
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>
                  <td><img src=img/'" .$row['filename']."' height = '250' width= '200' /> </td></tr>";
    }
  
}else {
    echo "some wonk";
}
?>

<?php include "footer.php"; ?>