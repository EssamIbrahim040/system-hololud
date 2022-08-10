<?php
    include "header.php";
?>
<?php
    session_start();
    if(isset($_SESSION["user"])){
        header("location: dashbord.php");
    }
    if(isset($_POST["Send"])){
        $user = $_POST["name"];
        $pass = $_POST["pass"];


        $host ='localhost';
        $user ='root';
        $password ='';
        $dbName = 'Image_Upload';
   
      $conn =   mysqli_connect($host, $user, $password, $dbName);
      $query = "INSERT INTO duser(username,password)VALUE('$user','$pass')";
       mysqli_query($conn,$query);
       mysqli_close(  $conn );
    //    header("locstion: dashbord.php");
    }

?>
<div class="container">
<div id="wrapper">
<form class="form" action="login.php" method="post">        
        <h2 class="text-center">Sing Up </h2>
            <input type="text" name="name" placeholder="user name" value="" /><br><br>
            <input type="password" name="pass" placeholder="Enter the password" value="" /><br><br>
            <input type="password" name="pass-confi" placeholder="Config your password" value="" /><br><br>
            <div>
            <button class="btn"  type="submit" name="Send"> Sing up </button>
            <p>Do you have acount <a href="login.php">Click Here</a></p>
        </div>
        </form>
        </div>
        </div>
   
    </form></div></div>