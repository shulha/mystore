<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>404</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>
<body>
<div class="container error-404">
    <div class="error-code m-b-10 m-t-20">404 <i class="fa fa-warning"></i></div>
    <h2 class="font-bold">Oops 404! That page can’t be found.</h2>

    <div class="error-desc">
        Sorry, but the page you are looking for was either not found or does not exist. <br/>
        Try refreshing the page or click the button below to go back to the Homepage.
        <div><br/>
            <!-- <a class=" login-detail-panel-button btn" href="http://vultus.de/"> -->
            <a href="<?php echo route('root'); ?>" class="btn btn-primary"><span class="glyphicon glyphicon-home"></span> Go back to Homepage</a>
        </div>
    </div>
</div>
</body>
</html>