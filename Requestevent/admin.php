<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "event_management";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $event_id = $_POST['event_id'];
    $event_title = $_POST['event_title'];
    $dept = strtoupper($_POST['dept']);
    $event_price = $_POST['event_price'];
    $img_link = $_POST['img_link'];
    $type_id = $_POST['type_id'];
    $event_date = $_POST['Date'];
    $event_time = $_POST['time'];
    $location = $_POST['location'];
    $staff_name = $_POST['sname'];
    $staff_phone = $_POST['phone'];
    $student_name = $_POST['st_name'];
    $student_phone = $_POST['st_phone'];
    $rules = $_POST['rules'];

    // Insert event data into database
    $sql = "INSERT INTO events (event_id, event_title, dept, event_price, img_link, type_id, event_date, event_time, location, staff_name, staff_phone, student_name, student_phone, rules) 
            VALUES ('$event_id', '$event_title', '$dept', '$event_price', '$img_link', '$type_id', '$event_date', '$event_time', '$location', '$staff_name', '$staff_phone', '$student_name', '$student_phone', '$rules')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Event created successfully!');</script>";
    } else {
        echo "<script>alert('Error: " . $sql . "\n" . $conn->error . "');</script>";
    }
}

// Fetch event proposals
$sql = "SELECT * FROM event_request";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proposal List</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <h2>Event Proposals</h2>
    <table style="border-collapse: collapse; width: 100%; border: 1px solid black;">
    <tr>
        <th style="border: 1px solid black;">event_title</th>
        <th style="border: 1px solid black;">dept</th>
        <th style="border: 1px solid black;">event_price</th>
        <th style="border: 1px solid black;">img_link</th>
        <th style="border: 1px solid black;">type_id</th>
        <th style="border: 1px solid black;">Date</th>
        <th style="border: 1px solid black;">time</th>
        <th style="border: 1px solid black;">location</th>
        <th style="border: 1px solid black;">sname</th>
        <th style="border: 1px solid black;">phone</th>
        <th style="border: 1px solid black;">st_name</th>
        <th style="border: 1px solid black;">st_phone</th>
        <th style="border: 1px solid black;">rules</th>
        <th style="border: 1px solid black;">Proposal</th>
        <th style="border: 1px solid black;">Status</th>
        <th style="border: 1px solid black;">Action</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td style='border: 1px solid black;'>{$row['event_title']}</td>
                    <td style='border: 1px solid black;'>{$row['dept']}</td>
                    <td style='border: 1px solid black;'>{$row['event_price']}</td>
                    <td style='border: 1px solid black;'>{$row['img_link']}</td>
                    <td style='border: 1px solid black;'>{$row['type_id']}</td>
                    <td style='border: 1px solid black;'>{$row['Date']}</td>
                    <td style='border: 1px solid black;'>{$row['time']}</td>
                    <td style='border: 1px solid black;'>{$row['location']}</td>
                    <td style='border: 1px solid black;'>{$row['sname']}</td>
                    <td style='border: 1px solid black;'>{$row['phone']}</td>
                    <td style='border: 1px solid black;'>{$row['st_name']}</td>
                    <td style='border: 1px solid black;'>{$row['st_phone']}</td>
                    <td style='border: 1px solid black;'>{$row['rules']}</td>
                    <td style='border: 1px solid black;'>{$row['proposal']}</td>
                    <td style='border: 1px solid black;'>{$row['status']}</td>
                    <td style='border: 1px solid black;'>
                        <form action='update_status.php' method='post'>
                            <input type='hidden' name='event_id' value='{$row['event_id']}'>
                            <button type='submit' name='status' value='Accepted'>Accept</button>
                            <button type='submit' name='status' value='Declined'>Decline</button>
                        </form>
                    </td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='16' style='border: 1px solid black; text-align: center;'>No proposals found</td></tr>";
    }
    ?>
</table>


</body>
</html>

<?php
$conn->close();
?>
