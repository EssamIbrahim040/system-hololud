<?php
    include "header.php";
?>

<?php
    session_start();
    if(isset($_SESSION["user"])){
        // header("location: index.php");
    }
    if(isset($_POST["Send"])){
        $user = $_POST["name"];
        $pass = $_POST["pass"];


        $host ='localhost';
        $user ='root';
        $password ='';
        $dbName = 'Image_Upload';
   
      $conn =   mysqli_connect($host, $user, $password, $dbName);
      $query = "SELECT * FROM duser WHERE user='$user' AND password='$pass'";
      $result = mysqli_query($conn,$query);
      $row = mysqli_nuw_rows($result);
      if($rows == 1){
        $_SESSION["user"]= $user;
        // header("location: index.php");
      }
      $error = true;
       mysqli_close(  $conn );
    
    }

?>
<div class="container">
<div id="wrapper">
<form class="form" action="index.php" method="post">        
        <h2 class="text-center">Login </h2>
            <input type="text" name="name" placeholder="user name" value="" /><br><br>
            <input type="password" name="pass" placeholder="Enter the password" value="" /><br><br>
            <div>
            <button class="btn"  type="submit" name="Send"> Login </button>
            <p>if yout have acount <a href="singup.php">Click Here</a></p>
        </div>
        </form>
        </div>
        </div>
    <?php
    if(isset($error)){
        echo "An error occurred, try again";
    }
    ?>