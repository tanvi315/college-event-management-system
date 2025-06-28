<?php
// Start output buffering to prevent any accidental output before generating the PDF
ob_start();

// Require the TCPDF library (adjust path if necessary)
require_once('tcpdf/tcpdf.php');
include 'classes/db1.php'; // Database connection

// Get start and end date from query parameters
$start_date = $_GET['start_date'] ?? '';
$end_date = $_GET['end_date'] ?? '';

// Create a new PDF document
$pdf = new TCPDF();

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Event Report');
$pdf->SetSubject('Event Report');
$pdf->SetKeywords('TCPDF, PDF, report, event');

// Set default header data
$pdf->SetHeaderData('', 0, 'Event Report', "From: $start_date To: $end_date");

// Set header and footer fonts
$pdf->setHeaderFont([PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN]);
$pdf->setFooterFont([PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA]);

// Set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// Set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// Set auto page breaks
$pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);

// Add a page to the PDF
$pdf->AddPage();

// Set the font for the PDF
$pdf->SetFont('helvetica', '', 12);

// Fetch the event data from the database
$sql = "SELECT event_id, event_title, Date, time, location, student_cordinator, staff_cordinator FROM event_info WHERE Date BETWEEN ? AND ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $start_date, $end_date);
$stmt->execute();
$result = $stmt->get_result();

// Check if there are records found
if ($result->num_rows > 0) {
    // Create HTML content for the table
    $html = '<h2>Report from ' . $start_date . ' to ' . $end_date . '</h2>';
    $html .= '<table border="1" cellspacing="3" cellpadding="4">';
    $html .= '<tr>
                <th>Event ID</th>
                <th>Event Title</th>
                <th>Date</th>
                <th>Time</th>
                <th>Location</th>
                <th>Student Coordinator</th>
                <th>Staff Coordinator</th>
              </tr>';

    // Output data for each row
    while ($row = $result->fetch_assoc()) {
        $html .= '<tr>';
        $html .= '<td>' . $row['event_id'] . '</td>';
        $html .= '<td>' . $row['event_title'] . '</td>';
        $html .= '<td>' . $row['Date'] . '</td>';
        $html .= '<td>' . $row['time'] . '</td>';
        $html .= '<td>' . $row['location'] . '</td>';
        $html .= '<td>' . $row['student_cordinator'] . '</td>';  // Updated
        $html .= '<td>' . $row['staff_cordinator'] . '</td>';    // Updated
        $html .= '</tr>';
    }
    $html .= '</table>';
} else {
    $html = '<h2>No events found in this date range.</h2>';
}


// Clean the output buffer before sending the PDF
ob_end_clean();

// Output the HTML content to the PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Close and output PDF document for download
$pdf->Output('event_report.pdf', 'D'); // 'D' means the file will be downloaded

// Close the statement and database connection
$stmt->close();
$conn->close();
?>
