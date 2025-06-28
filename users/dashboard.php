<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

echo "Welcome, " . $_SESSION['username'] . "!";

?>

<a href="logout.php">Logout</a>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Campus Events</title>
    <link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css">
<link rel = "stylesheet" type = "text/css" href = "css/style.css"> <!-- Include CSS links from utils/styles.php -->

</head>

<body>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Campus Events</title>
    <style>
        .bgImage {
            background-image: url('images/bg5.jpg');
            background-size: cover;
            background-position: center center;
            height: 100vh;
            margin-bottom: 25px;
        }
    
    </style>
</head>
<body>
    <header class="bgImage">
        <nav class="navbar">
            <div class="container">
                <div class="navbar-header " >
                    <a class="navbar-brand">
                    <h1 style="color:white; font-family:'Times New Roman', serif; font-style: italic; word-spacing: 20px; font-weight: bold; ">COLLEGE EVENTS</h1>
                    </a>
                </div>
                <ul class="nav navbar-nav navbar-right " >
                    <li><a href="./index.php"><strong>Home</strong></a></li>
                    <li><a href="./usn.php"><strong>Already registered</strong></a></li>
                    <li><a href="./contact.php"><strong>Contact Us</strong></a></li>
                    <li><a href="./aboutus.php"><strong>About Us</strong></a></li>
                    <li><a href="./Requestevent/index.html"><strong>Request An Event </strong></a></li>
                </ul>
            </div>
        </nav>
    </header>
</body>
</html>


 <!-- Include header content from utils/header.php -->
    <div class="content"><!-- Body content holder -->
        <div class="container">
            <div class="col-md-12"><!-- Body content title holder with 12 grid columns -->
                <h1 style="color:#000080; font-size:42px; font-weight:bold;">REGISTER YOUR FAVORITE EVENTS</h1><!-- Body content title -->
            </div>

            <!-- Technical Events Section -->
            <div class="container">
                <div class="col-md-12">
                    <hr>
                </div>
            </div>

            <div class="row">
                <section>
                    <div class="container">
                        <div class="col-md-6">
                            <img src="images/technical.jpg" class="img-responsive">
                        </div>
                        <div class="subcontent col-md-6">
                            <h1 style="color:#003300; font-size:38px;"><u><strong>Technical Events</strong></u></h1>
                            <p>
                                EMBRACE YOUR TECHNICAL SKILLS BY PARTICIPATING IN OUR DIFFERENT TECHNICAL EVENTS!
                            </p>
                            <br><br>
                            <a class="btn btn-default" href="viewEvent.php?id=1"><span class="glyphicon glyphicon-circle-arrow-right"></span> View Technical Events</a>
                        </div>
                    </div>
                </section>
            </div>

            <!-- Gaming Events Section -->
            <div class="container">
                <div class="col-md-12">
                    <hr>
                </div>
            </div>

            <div class="row">
                <section>
                    <div class="container">
                        <div class="col-md-6">
                            <img src="images/gaming.jpg" class="img-responsive">
                        </div>
                        <div class="subcontent col-md-6">
                            <h1 style="color:#003300; font-size:38px;"><u><strong>Gaming Events</strong></u></h1>
                            <p>
                                EMBRACE YOUR GAMING SKILLS BY PARTICIPATING IN OUR DIFFERENT GAMING EVENTS!
                            </p>
                            <br><br>
                            <a class="btn btn-default" href="viewEvent.php?id=2"><span class="glyphicon glyphicon-circle-arrow-right"></span> View Gaming Events</a>
                        </div>
                    </div>
                </section>
            </div>

            <!-- On-Stage Events Section -->
            <div class="container">
                <div class="col-md-12">
                    <hr>
                </div>
            </div>

            <div class="row">
                <section>
                    <div class="container">
                        <div class="col-md-6">
                            <img src="images/onstage.jpg" class="img-responsive">
                        </div>
                        <div class="subcontent col-md-6">
                            <h1 style="color:#003300; font-size:38px;"><u><strong>On-Stage Events</strong></u></h1>
                            <p>
                                EMBRACE YOUR CONFIDENCE BY PARTICIPATING IN OUR DIFFERENT ON-STAGE EVENTS!
                            </p>
                            <br><br>
                            <a class="btn btn-default" href="viewEvent.php?id=3"><span class="glyphicon glyphicon-circle-arrow-right"></span> View On-Stage Events</a>
                        </div>
                    </div>
                </section>
            </div>

            <!-- Off-Stage Events Section -->
            <div class="container">
                <div class="col-md-12">
                    <hr>
                </div>
            </div>

            <div class="row">
                <section>
                    <div class="container">
                        <div class="col-md-6">
                            <img src="images/offstage.jpg" class="img-responsive">
                        </div>
                        <div class="subcontent col-md-6">
                            <h1 style="color:#003300; font-size:38px;"><u><strong>Off-Stage Events</strong></u></h1>
                            <p>
                                EMBRACE YOUR TALENT BY PARTICIPATING IN OUR DIFFERENT OFF-STAGE EVENTS!
                            </p>
                            <br><br>
                            <a class="btn btn-default" href="viewEvent.php?id=4"><span class="glyphicon glyphicon-circle-arrow-right"></span> View Off-Stage Events</a>
                        </div>
                    </div>
                </section>
            </div>

        </div><!-- End of body content container -->

        <hr class="footerline"><!--css modified horizontal line-->
<footer>
    <div class="container">
        <h5 style="text-align: center;">&copy; 2024 BY: T S W</h5>
        <br>
    </div>
</footer>
 <!-- Include footer content from utils/footer.php -->
    </div><!-- End of body content -->

</body>

</html>
