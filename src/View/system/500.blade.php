<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Server Error</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>
<body>
<div class="container error-404">
    <div class="error-code m-b-10 m-t-20">500 <i class="fa fa-warning"></i></div>
    <h2 class="font-bold">
        @if(isset($message))
            {{$message}}
        @else
            Error occurred
        @endif
    </h2>
    <div class="error-desc">
        <p>Please check your code or contact your system administrator.</p>
    </div>
</div>
</body>
</html>