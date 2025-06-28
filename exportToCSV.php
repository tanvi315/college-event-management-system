<?php
include 'classes/db1.php';

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=report.csv');
$output = fopen('php://output', 'w');

// Output the column headers
fputcsv($output, array('Event ID', 'Event Title', 'Event Date', 'Time', 'Location'));

// Fetch the data from the database
$query = "SELECT event_id, event_title, Date, time, location FROM event_info";
$result = $conn->query($query);

// Output each row as a CSV line
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        fputcsv($output, $row);
    }
}

fclose($output);
$conn->close();
?>
