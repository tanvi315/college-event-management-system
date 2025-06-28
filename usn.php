<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Campus Events</title>
    <?php require 'utils/styles.php'; ?><!-- CSS links. File found in utils folder -->

    <!-- Add style for watermark -->
    <style>
        .form-control::placeholder {
            color: #ccc; /* Color of the placeholder text */
            font-style: italic; /* Italicize the placeholder text */
        }
    </style>
</head>
<body>
    <?php require 'utils/header3.php'; ?><!-- Header content. File found in utils folder -->

    <div class="content"><!-- Body content holder -->
        <div class="container">
            <div class="col-md-6 col-md-offset-3">
                <form action="RegisteredEvents.php" class="form-group" method="POST">
                    <div class="form-group">
                        <label for="usn">Student USN:</label>
                        <!-- Add watermark text inside the input field -->
                        <input type="text" id="usn" name="usn" class="form-control" placeholder="Enter USN" required>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-default">Login</button>
                </form>
                <br> <a class="btn btn-default" href="index.php"><span class="glyphicon glyphicon-circle-arrow-left"></span> HOME</a>
            </div>
        </div>
    </div>
    <br>
    <?php require 'utils/footer.php'; ?><!-- Footer content. File found in utils folder -->
</body>
</html>
