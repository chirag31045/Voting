<?php

session_start();
$voterdata = $_SESSION['voterdata'];

$conn = mysqli_connect('localhost', 'root', '', 'voterregisterdatabase');

$query= "SELECT * FROM addcandidate";
$result=mysqli_query($conn,$query);

if($_SESSION['voterdata']['status']==0){
  $status ='<b style="color:green;">Not Voted</b>';
}
else{
  $status ='<b style="color:red;">Voted</b>';
}

// ✅ Correct placement: search query logic comes first
if (isset($_GET['search']) && !empty($_GET['search'])) {
  $search = mysqli_real_escape_string($conn, $_GET['search']);
  $query = "SELECT * FROM addcandidate WHERE cname LIKE '%$search%' OR cparty LIKE '%$search%'";
} else {
  $query = "SELECT * FROM addcandidate";
}

// ✅ Execute the query after setting it
$result = mysqli_query($conn, $query);
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

  <style>
    .nav-item a {
      color: white;
    }

    .nav-item a:hover {
      color: whitesmoke;
      background: red;
      border-radius: 7px;
    }

    #main-section {
      box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.9);
    }

    #rightMenu {
    display: none;
    }
 
  </style>

</head>
<body>

  <div class="w3-sidebar w3-bar-block w3-card w3-animate-right" style="display:none;right:0; width:100%" id="rightMenu">
    <button onclick="closeRightMenu()" class="w3-bar-item w3-button w3-large">Close &times;</button>
    <div class="container" style="padding-top:50px;">
      <div class="row">
        <div class="col-sm-4">

        </div>
        <div class="col-sm-4">
          <h2>Admin Login Form</h2><br>
          <p>Please enter your information to process</p><br> <hr><br>
          <form action="Admin Login/AdminLogin.php" method="post">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Name</label>
              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">

            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" class="form-control" id="exampleInputPassword1" name="password">
            </div>
            
            <div class="d-grid gap-2">
              <button class="btn btn-primary" type="submit">Login</button>
           
            </div>
          </form>
        </div>


      </div>

    </div>
  </div>


  <nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand"><i class="fa fa-fw fa-globe"></i>Online Voting System</a>
      <ul class="nav justify-content-center">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#"><i class="fa fa-fw fa-home"></i>Home</a>
        </li>
        <li class="nav-item">
        <form method="GET" class="mb-4">
  <div class="input-group">
    <input type="text" name="search" class="form-control" placeholder="Search by Candidate or Party Name" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
    <button class="btn btn-danger" type="submit">Search</button>
  </div>
</form>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#contactSection"><i class="fa fa-fw fa-envelope"></i>Contact Us</a>
        </li>

      </ul>
      <form class="nav-item">
        <a class="btn btn-outline-success" type="submit" onclick="openRightMenu()"><i class="fa fa-fw fa-user"></i>Admin
          Login</a>
      </form>
    </div>
  </nav>
 
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="Images/download.jpeg" class="d-block w-100" height="350px" alt="...">
        <div class="carousel-caption d-md-block">
          <h2>Welcome to the Online Voting System</h2>
        </div>
        
      </div>
    </div>
  </div>
  </div>
  <br><br><br>

  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-4">
        <div class="card mb-3" style="max-width: 540px;">
          <div class="card-header" style="color:red" ;>
            <marquee>You Can Only Vote One Candidate</marquee>
          </div>
          <div class="row g-0">
            <div class="col-md-4">
              <img src="../VoterImg/<?php echo $voterdata['photo'] ?>" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title" style="color:blue" ;>Voter Detail</h5>
                <p class="card-text">
                  <li>Name :<?php echo $voterdata['name'] ?></li>
                  <li>Mobile No. :<?php echo $voterdata['mobile'] ?></li>
                  <li>Cnic No. :<?php echo $voterdata['cnic'] ?></li>
                </p>
                <h5 class="card-title">Status : <?php echo  $status ?> </h5>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-8">
        <table class="table" id="main-section">
          <thead>
            <tr>
              <th scope="col">Candidate Detail</th>
              <th style="vertical-align: top; text-align: center;"  scope="col">Symbol</th>
              <th style="vertical-align: top; text-align: center;"  scope="col">Photo</th>
            </tr>
          </thead>
          <tbody>
             <?php
                 while($row = mysqli_fetch_assoc($result)){
              ?>
          <tr>
             
             
              <td>
              <div style="white-space: normal; line-height: 1.5;">
                 <strong>Candidate Name:</strong> <?php echo $row['cname']; ?><br>
                <strong>Party Name:</strong> <?php echo $row['cparty']; ?><br>
                <strong>Total Vote:</strong> <?php echo $row['votes']; ?><br>
              </div>

                  <form action="Admin Login/Vote.php" method="post">
                    <input type="hidden" name="gvotes" value="<?php echo $row['votes'] ?>">
                    <input type="hidden" name="gid" value="<?php echo $row['id'] ?>">

                    <?php
                        if($_SESSION['voterdata']['status']==0){
                          ?>
                          <button type="submit" class="btn btn-danger">Vote</button>
                          <?php
                        }
                        else{
                          ?>
                            <button disabled type="button" class="btn btn-danger">Vote</button>
                          <?php

                        } 
                     ?>
                  </form> 
              </td>

              <td style="vertical-align: top; text-align: center;"><img src="Admin Login/Images/<?php echo $row['symbol']?>" width="40%" style="border-radius: 50%;"></td>
              <td style="vertical-align: top; text-align: center;"><img src="Admin Login/Images/<?php echo $row['photo'] ?>" width="70%" style="border-radius: 10px;"></td>
              </tr>

              <?php
              }
              ?>
            
          </tbody>
        </table>

      </div>

    </div>

  </div>


  <script>
    function openRightMenu() {
      document.getElementById("rightMenu").style.display = "block";
    }

    function closeRightMenu() {
      document.getElementById("rightMenu").style.display = "none";
    }
  </script>

<footer class="text-white text-center text-lg-start" style="background: linear-gradient(to right, #0f2027, #203a43, #2c5364); padding-top: 40px;">
  <div class="container p-3">
    <div class="row">
      <div class="col-lg-6 col-md-12 mb-4">
        <h5 class="text-uppercase">Online Voting System</h5>
        <p>Empowering democracy through secure and easy voting. Your voice matters.</p>
      </div>

      <div class="col-lg-3 col-md-6 mb-4">
        <h5 class="text-uppercase">Quick Links</h5>
        <ul class="list-unstyled mb-0">
          <li><a href="#searchSection" class="text-white">Search</a></li>
          <li><a href="#contactSection" class="text-white">Contact Us</a></li>
          <li><a href="#" class="text-white">Privacy Policy</a></li>
        </ul>
      </div>

      <div class="col-lg-3 col-md-6 mb-4">
        <h5 class="text-uppercase" id="contactSection">Contact</h5>
        <p>Email: support@vote.com<br>Phone: +91 99999 99999</p>
      </div>
    </div>
  </div>

  <div class="text-center p-3 bg-dark">
    © 2025 Online Voting System | All rights reserved
  </div>
</footer>

</body>

</html>