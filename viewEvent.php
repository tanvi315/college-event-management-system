<?php
require 'classes/db1.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$result = mysqli_query($conn, "SELECT * FROM events 
                               INNER JOIN event_info ef1 ON events.event_id = ef1.event_id 
                               INNER JOIN event_info ef2 ON events.event_title = ef2.event_title
                               INNER JOIN student_coordinator s ON events.event_id = s.event_id 
                               INNER JOIN staff_coordinator st ON events.event_id = st.event_id 
                               WHERE type_id = $id");
?>


<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>college events</title>
    <?php require 'utils/styles.php'; ?><!-- CSS links. File found in utils folder -->
</head>
<body>
    <?php require 'utils/header2.php'; ?><!-- Header content. File found in utils folder -->
    
    <div class="content"><!-- Body content holder -->
        <div class="container">
            <div class="col-md-12"><!-- Full width content holder -->
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                        include 'events.php';  
                    }
                ?>
                    <div class="col-md-12">
                        <hr>
                    </div>
                <?php } else { ?>
                    <p>No events found.</p>
                <?php } ?>
                
                <a class="btn btn-default" href="index.php"><span class="glyphicon glyphicon-circle-arrow-left"></span> Back</a>
            </div><!-- End col-md-12 -->
        </div><!-- End container -->
    </div><!-- End content -->
    
    <?php require 'utils/footer.php'; ?><!-- Footer content. File found in utils folder -->
</body>
</html>
