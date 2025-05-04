<?php
$conn = mysqli_connect('localhost', 'root', '', 'voterregisterdatabase');

$cname=$_POST['cname'];
$cparty=$_POST['cparty'];

$images=$_FILES['symbol']['name'];
$tmp_name=$_FILES['symbol']['tmp_name'];


$image=$_FILES['photo']['name'];
$tmp_name1=$_FILES['photo']['tmp_name'];

$insert=mysqli_query($conn,"INSERT INTO addcandidate (cname,cparty,symbol,photo) VALUES('$cname','$cparty','$images','$image')");

if($insert==true){
    move_uploaded_file($tmp_name,"Images/$images");
    move_uploaded_file($tmp_name1,"Images/$image");

    echo '
       <script>
          alert("Candidate Added Successfully");
          loaction="../AdminDashboard.php";
       </script>
    ';

}
else{
    echo "Some Error";
}




?>