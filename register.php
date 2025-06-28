<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Campus Events - Register</title>
    <?php require 'utils/styles.php'; ?>
    <!-- CSS links from utils folder -->
    <style>
        .form-control::placeholder {
            color: #ccc; /* Placeholder text color */
            font-style: italic; /* Italicize placeholder text */
        }
    </style>
</head>

<body>
    <?php
    session_start();
    // Moving session_start() to the top of the script
    if (isset($_POST["register"])) {
        $usn = $_POST["usn"];
        $name = $_POST["name"];
        $branch = $_POST["branch"];
        $sem = $_POST["sem"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $college = $_POST["college"];
        $events = $_POST["events"]; // Get the selected events

        // Server-side validation
        if (!empty($usn) && !empty($name) && !empty($branch) && !empty($sem) && !empty($email) && !empty($phone) && !empty($college) && !empty($events)) {
            include 'classes/db1.php';

            // Escape user inputs for security
            $usn = $conn->real_escape_string($usn);
            $name = $conn->real_escape_string($name);
            $branch = $conn->real_escape_string($branch);
            $sem = (int) $sem; // Ensure semester is an integer
            $email = $conn->real_escape_string($email);
            $phone = $conn->real_escape_string($phone);
            $college = $conn->real_escape_string($college);

            // Check if the participant already exists by usn
            $check_query = "SELECT * FROM participent WHERE usn = '$usn'";
            $check_result = $conn->query($check_query);

            if ($check_result->num_rows > 0) {
                // Participant already exists, get their id
                $participant = $check_result->fetch_assoc();
                $participant_id = $participant['id'];
            } else {
                // Insert participant info if they don't exist
                $insert_participant = "INSERT INTO participent (usn, name, branch, sem, email, phone, college) 
                                      VALUES ('$usn', '$name', '$branch', $sem, '$email', '$phone', '$college')";
                
                if ($conn->query($insert_participant) === TRUE) {
                    $participant_id = $conn->insert_id;
                } else {
                    echo "<script>
                            alert('Failed to register participant.');
                            window.location.href='register.php';
                          </script>";
                    exit;
                }
            }

            // Register selected events for the participant, handling duplicates
            $errors = [];
            foreach ($events as $event_id) {
                // Check if the participant is already registered for this event
                $check_registration_query = "SELECT * FROM registered WHERE usn = '$usn' AND event_id = $event_id";
                $check_registration_result = $conn->query($check_registration_query);

                if ($check_registration_result->num_rows > 0) {
                    $errors[] = $event_id;
                } else {
                    // Register the participant for the event
                    $insert_event = "INSERT INTO registered (usn, event_id) 
                                     VALUES ('$usn', $event_id)";
                    if (!$conn->query($insert_event)) {
                        echo "<script>
                                alert('Failed to register for event.');
                                window.location.href='register.php';
                              </script>";
                        exit;
                    }
                }
            }

            if (!empty($errors)) {
                echo "<script>
                        alert('You are already registered for one or more selected events.');
                        window.location.href='register.php';
                      </script>";
            } else {
                echo "<script>
                        alert('Registered Successfully!');
                        window.location.href='usn.php';
                      </script>";
            }

            $conn->close();
        } else {
            echo "<script>
                    alert('All fields are required.');
                    window.location.href='register.php';
                  </script>";
        }
    }
    ?>

    <?php require 'utils/header3.php'; ?>
    <!-- Header content from utils folder -->
    <div class="content">
        <!-- Body content holder -->
        <div class="container">
            <div class="col-md-6 col-md-offset-3">
                <h1 style="color:#000080; font-size:39px; font-weight:bold"><strong>Register:</strong></h1>
                <hr>
                <form method="POST" action="">
                    <!-- Registration form -->
                    <label>Student USN:</label><br>
                    <input type="text" name="usn" class="form-control" placeholder="Enter Your USN" required><br>

                    <label>Student Name:</label><br>
                    <input type="text" name="name" class="form-control" placeholder="Enter Your Name" required><br>

                    <label>Branch:</label><br>
                    <input type="text" name="branch" class="form-control" placeholder="Enter Your Branch" required><br>

                    <label>Semester:</label><br>
                    <input type="text" name="sem" class="form-control" placeholder="Enter Your Semester" required><br>

                    <label>Email:</label><br>
                    <input type="email" name="email" class="form-control" placeholder="Enter Your Email" required><br>

                    <label>Phone:</label><br>
                    <input type="tel" name="phone" class="form-control" placeholder="Enter Your Phone Number"  pattern="[0-9]{10}" maxlength="10" required><br>

                    <label>College:</label><br>
                    <input type="text" name="college" class="form-control" placeholder="Enter Your College Name" required><br>

                    <label>Events:</label><br>
                    <?php
                    include 'classes/db1.php';
                    $result = mysqli_query($conn, "SELECT event_id, event_title FROM events ORDER BY event_title ASC");
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<input type='checkbox' name='events[]' value='{$row['event_id']}'> {$row['event_title']}<br>";
                    }
                    ?>
                    <br>
                    <button type="submit" name="register" class="btn btn-primary">Submit</button><br><br>
                    <a href="usn.php"><u>Already registered?</u></a>
                </form>
                <a class="btn btn-default" href="index.php"><span class="glyphicon glyphicon-circle-arrow-left"></span> Back</a>
            </div>
        </div>
    </div>

    <?php require 'utils/footer.php'; ?>
    <!-- Footer content from utils folder -->

</body>

</html>
