<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-4">
                <h4>Name: {{ $mailInfo['name'] }}</h4>
            </div>
            <div class="col-4">
                <h4>Email Address: {{ $mailInfo['email'] }}</h4>
            </div>
            <div class="col-4">
                <h4>Phone Number: {{ $mailInfo['phone'] }}</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-12"></div>
            <div class="col-12">
                <p>Message: {{ $mailInfo['message'] }}</p>
            </div>
        </div>
    </div>
</body>

</html>
