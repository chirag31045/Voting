<?php

$conn = mysqli_connect('localhost', 'root', '', 'voterregisterdatabase');

$query = "SELECT * FROM addcandidate";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <style>
        .nav-item a {
            font-family: sans-serif;
            color: mediumblue;
        }

        .nav-item a:hover {
            background: orange;
            color: white;
            border-radius: 7px;

        }
    </style>

</head>

<body>

    <ul class="nav justify-content-center bg-dark" style="padding:20px">
        <li class="nav-item">
            <h1 style="font-family: sans;color: orange">Online Voting System</h1>
        </li>

    </ul>

    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"> <img src="Images/Admin.jpg" width="10%" alt=""> <b
                    style="color:darkcyan;">Admin Panel</b></a>
            <button class="navbar-toggler navbar-light" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#Header">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#Add Candidate">Add Candidate</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#Total">Total Candidate</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../dashboard.php">Logout</a>
                    </li>


                </ul>
            </div>
        </div>
    </nav>

    <div id="Header">
        <img src="Images/background.jpg" width="100%" height="550px" alt="">
    </div>
    <br><br>

    <div class="container-fluid" id="Add Candidate" style="box-shadow:2px 2px 10px rgba(0,0,0,0.9); padding:40px;">
        <div class="row">
            <div class="col-sm-8">
                <h2 style="text-align:center;"> <span
                        style="background:orange; color:blue; padding:10px; border-radius: 10px;">Add Candidate for
                        Election</span></h2><br>
                <hr><br>
                <div class="row">
                    <div class="col-sm-6">
                        <form action="AddCandidate.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Candidate name</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="cname">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Party Name</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" name="cparty">
                            </div>

                    </div>
                    <div class="col-sm-6">

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Select Symbol</label>
                            <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                name="symbol">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Select Photo</label>
                            <input type="file" class="form-control" id="exampleInputPassword1" name="photo">
                        </div>


                    </div>

                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="col-sm-4">
                <img src="Images/header.webp" width="100%" alt="">
            </div>
        </div>
    </div>
    <br><br>


 
    <div class="container" id="Total">
        <div class="row">
            <div class="col-sm-10">
                <h2 style="text-align:center;"> <span
                        style="background:orange; color:blue; padding:10px; border-radius: 10px;">Total List Of
                        Candidate
                    </span></h2><br>
                <hr><br>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Candidate Name</th>
                            <th scope="col">Party</th>
                            <th scope="col">Photo</th>
                        </tr>
                    </thead>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tbody>
                            <tr>
                                <td><?php echo $row['cname'] ?></td>
                                <td class="text-center"><?php echo $row['cparty'] ?></td>
                                <td><img src="Images/<?php echo $row['photo'] ?> " width="50%" class="d-block mx-auto"></td>
                            </tr>

                            <?php
                    }
                    ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <!-- Footer Start -->
<footer class="text-white text-center text-lg-start" style="background: linear-gradient(to right, #0f2027, #203a43, #2c5364); padding-top: 40px;">
  <div class="container p-4">
    <div class="row">

      <!-- About -->
      <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
        <h5 class="text-uppercase" style="color: orange;">Online Voting System</h5>
        <p style="font-family: sans-serif;">
          Empowering democracy through secure and easy-to-use online voting. Transparent, efficient, and built for the future.
        </p>
      </div>

      <!-- Quick Links -->
      <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
        <h5 class="text-uppercase" style="color: orange;">Quick Links</h5>
        <ul class="list-unstyled mb-0">
          <li><a href="#Header" class="text-white text-decoration-none">Home</a></li>
          <li><a href="#Add Candidate" class="text-white text-decoration-none">Add Candidate</a></li>
          <li><a href="#Total" class="text-white text-decoration-none">Total Candidate</a></li>
          <li><a href="../dashboard.php" class="text-white text-decoration-none">Logout</a></li>
        </ul>
      </div>

      <!-- Contact -->
      <div class="col-lg-4 col-md-12 mb-4 mb-md-0">
        <h5 class="text-uppercase" style="color: orange;">Contact Us</h5>
        <p><i class="bi bi-telephone-fill"></i> Phone: +91 84420 70655</p>
        <p><i class="bi bi-envelope-fill"></i> Email: chiragkumawat457@gmail.com</p>
        <p><i class="bi bi-geo-alt-fill"></i> Location: New Delhi, India</p>
      </div>

    </div>
  </div>

  <!-- Footer Bottom -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © <?php echo date("Y"); ?> Online Voting System. All rights reserved.
  </div>
</footer>
<!-- Footer End -->

<!-- Bootstrap Icons CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">


</body>

</html>