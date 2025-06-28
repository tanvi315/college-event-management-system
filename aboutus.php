<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Campus Events</title>
    <?php require 'utils/styles.php'; ?><!-- CSS links. File found in utils folder -->
    <style>
        /* Large rounded green border */
        hr.blueline {
            border: 10px solid #00004d;
        }

        .btn {
            margin-left: 15px;
        }
    </style>
</head>

<body>
    <?php require 'utils/header2.php'; ?>
    <hr class="blueline">
    <div class="col-md-12">
        <h1>About Us</h1>
        <p>
            Our college Mission is to impart quality technical education and higher moral ethics associated with skilled training to suit the modern day technology with innovative concepts, so as to learn to lead the future with full confidence.
        </p>
    </div>
    <hr class="blueline">
    <a class="btn btn-default" href="index.php"><span class="glyphicon glyphicon-circle-arrow-left"></span> Back</a>
    <?php require 'utils/footer.php'; ?>
</body>

</html>
