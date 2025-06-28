<?php
// Include database connection
include 'classes/db1.php';

// Initialize variables
$pdf_export_link = ''; // Variable to hold the PDF export link

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    // Validate that the end date is after the start date
    if ($start_date > $end_date) {
        echo "Error: Start date cannot be later than end date.";
        exit();
    }

    // SQL query to fetch records between the selected date range
    $sql = "SELECT event_id, event_title, Date, time, location, student_cordinator, staff_cordinator FROM event_info WHERE Date BETWEEN ? AND ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $start_date, $end_date);

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<h2>Report from $start_date to $end_date</h2>";
        echo "<table border='1'>";
        echo "<tr>
                <th>Event ID</th>
                <th>Event Title</th>
                <th>Date</th>
                <th>Time</th>
                <th>Location</th>
                <th>Student Coordinator</th>
                <th>Staff Coordinator</th>
              </tr>";
    
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['event_id'] . "</td>";
            echo "<td>" . $row['event_title'] . "</td>";
            echo "<td>" . $row['Date'] . "</td>"; 
            echo "<td>" . $row['time'] . "</td>";
            echo "<td>" . $row['location'] . "</td>";
            echo "<td>" . $row['student_cordinator'] . "</td>";  // Updated
            echo "<td>" . $row['staff_cordinator'] . "</td>";    // Updated
            echo "</tr>";
        }
        echo "</table>";
    
        // Create PDF export link
        $pdf_export_link = "exporttopdf.php?start_date=$start_date&end_date=$end_date";
        echo '<a href="' . $pdf_export_link . '" class="button">Download PDF</a>';  // Updated link
    } else {
        echo "No events found in this date range.";
    }
    
    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Report</title>
    <link rel="stylesheet" href="report.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        .button {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Generate Report for Specific Time Period</h2>
        <form id="reportForm" method="POST" action="generateReport.php">
            <label for="start_date">Start Date:</label>
            <input type="date" id="start_date" name="start_date" required>

            <label for="end_date">End Date:</label>
            <input type="date" id="end_date" name="end_date" required>

            <input type="submit" value="Generate Report">
        </form>
    </div>

    <!-- JavaScript to validate date -->
    <script>
        document.getElementById('reportForm').addEventListener('submit', function(event) {
            const startDate = document.getElementById('start_date').value;
            const endDate = document.getElementById('end_date').value;

            if (startDate > endDate) {
                alert('Error: Start date cannot be later than end date.');
                event.preventDefault(); // Prevent the form from being submitted
            }
        });
    </script>
</body>
</html>
