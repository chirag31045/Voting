<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'voterregisterdatabase');

$cnic = $_POST['cnic'];
$mobile = $_POST['mobile'];
$pass = $_POST['pass'];

$check=mysqli_query($conn,"SELECT * FROM voterregistrer where cnic='$cnic' AND mobile='$mobile' AND pass='$pass' ");

if(mysqli_num_rows($check)>0){
    $voterdata=mysqli_fetch_array($check);

    $_SESSION['voterdata']=$voterdata;
    
    echo '
        <script >
            location="../Dashboard/dashboard.php";
        </script>
    ';

}
else{
    echo "some error";
}

?>