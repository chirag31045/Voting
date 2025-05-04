<?php

$conn = mysqli_connect('localhost', 'root', '', 'voterregisterdatabase');
$name=$_POST['name'];
$password=$_POST['password'];

$check=mysqli_query($conn,"SELECT * FROM adminlogin where name='$name' AND password='$password' ");

if(mysqli_num_rows($check)>0){
    echo '
        <script>
             location= "AdminDashboard.php";
        </script>
    ';

}
else{
    echo '
    <script>
         alert("Incorrect Information !! You are not Admin");
         location= "../dashboard.php";
    </script>
';
}

?>