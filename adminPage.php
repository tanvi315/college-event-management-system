<?php
// dashboard.php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

include_once 'classes/db1.php';

// Check if the sort parameter is set and valid
$valid_columns = ['event_title', 'participents', 'event_price', 'st_name', 'name', 'Date', 'time', 'location'];
$sort_by = isset($_GET['sort_by']) && in_array($_GET['sort_by'], $valid_columns) ? $_GET['sort_by'] : 'event_title';

// Using validated column name directly in the query for sorting
$query = "SELECT e.event_id, e.event_title, e.participents, e.event_price, st.st_name, s.name, DATE_FORMAT(ef.Date, '%d-%m-%Y') AS Date, ef.time, ef.location 
          FROM staff_coordinator s, event_info ef, student_coordinator st, events e 
          WHERE e.event_id = ef.event_id AND e.event_id = s.event_id AND e.event_id = st.event_id 
          ORDER BY $sort_by";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Campus Events_adminPage</title>
    <!-- Add necessary CSS or other header content -->
</head>

<body>
    <?php include 'utils/adminHeader.php' ?>

    <div class="content">
        <div class="container">
            <h1>EVENT DETAILS</h1>
            <?php if (mysqli_num_rows($result) > 0) { ?>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th><a href="?sort_by=event_title">Event Name</a></th>
                            <th><a href="?sort_by=participents">No. of Participants</a></th>
                            <th><a href="?sort_by=event_price">Price</a></th>
                            <th><a href="?sort_by=st_name">Student Co-ordinator</a></th>
                            <th><a href="?sort_by=name">Staff Co-ordinator</a></th>
                            <th><a href="?sort_by=Date">Date</a></th>
                            <th><a href="?sort_by=time">Time</a></th>
                            <th><a href="?sort_by=location">Location</a></th>
                            <th>Action</th> <!-- Added for Delete action -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result)) { 
                            $formatted_time = date('h:i A', strtotime($row['time']));
                        ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['event_title']); ?></td>
                                <td><?php echo htmlspecialchars($row['participents']); ?></td>
                                <td><?php echo htmlspecialchars($row['event_price']); ?></td>
                                <td><?php echo htmlspecialchars($row['st_name']); ?></td>
                                <td><?php echo htmlspecialchars($row['name']); ?></td>
                                <td><?php echo htmlspecialchars($row['Date']); ?></td>
                                <td><?php echo htmlspecialchars($formatted_time); ?></td>
                                <td><?php echo htmlspecialchars($row['location']); ?></td>
                                <td><a class="delete" href="deleteEvent.php?id=<?php echo $row['event_id']; ?>">Delete</a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } else { ?>
                <p>No events found.</p>
            <?php } ?>
            <br><br> <a class="btn btn-default" href="createEventForm.php">Create Event</a><br><br><br><br>
        </div>
        <a class="btn btn-default" href="Stu_details.php"><span class="glyphicon glyphicon-circle-arrow-right"></span> Student details</a>
        <a class="btn btn-default" href="Stu_cordinator.php"><span class="glyphicon glyphicon-circle-arrow-right"></span> Student Co-ordinator details</a>
        <a class="btn btn-default" href="Staff_cordinator.php"><span class="glyphicon glyphicon-circle-arrow-right"></span> Staff Co-ordinator details</a>
    </div>

    <?php require 'utils/footer.php'; ?>
</body>

</html>
