<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Campus Events</title>
    <?php require 'utils/styles.php'; ?> <!-- Include CSS links from utils/styles.php -->

</head>

<body>
    <?php require 'utils/header.php'; ?> <!-- Include header content from utils/header.php -->
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

        <?php require 'utils/footer.php'; ?> <!-- Include footer content from utils/footer.php -->
    </div><!-- End of body content -->

</body>

</html>
