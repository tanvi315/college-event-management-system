<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Campus Events_adminPage</title>
    <style>
        .bgImage {
            background-image: url('images/bg5.jpg');
            background-size: cover;
            background-position: center center;
            height: 50vh;
            margin-bottom: 29px;
        }
    </style>
</head>
<body>
    <?php require 'utils/styles.php'; ?><!--css links. file found in utils folder-->

    <header class="bgImage">
        <nav class="navbar">
            <div class="container">
                <ul class="nav navbar-nav navbar-right"><!--navigation-->
                    <li><a href="adminPage.php"><strong>Home</strong></a></li>
                    <li><a href="Stu_details.php"><strong>Student Details</strong></a></li>
                    <li><a href="Stu_cordinator.php"><strong>Student Co-ordinator</strong></a></li>
                    <li><a href="Staff_cordinator.php"><strong>Staff-Co-ordinator</strong></a></li>
                    <li><a href="createEventForm.php"><strong>Create Event</strong></a></li>
                    <li><a href="./Requestevent/admin.php"><strong>Proposal list</strong></a></li>
                    <li><a href="generateReport.php"><strong>Generate Report</strong></a></li>
                    <li><a class="logout-btn" href="logout.php"><strong>Logout</strong></a></li>
                </ul>
            </div><!--container div-->
        </nav>
    </header>
</body>
</html>
