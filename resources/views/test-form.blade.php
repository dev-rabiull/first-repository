<!DOCTYPE html>
<html lang="en">
<head>
  <title>Simple Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    .card{
        box-shadow: 1px 1px 11px 0px black;
        width: 400px;
        margin: 100px auto;
        padding: 20px;
        border-radius: 5px;
    }
  </style>
</head>
<body>

    <div class="container pt-5">
        <div class="card mx-auto">
            <div class="card-body">
                <h2 class="text-center">Simple Form</h2>
                <form action="/check-data" method="post">
                    
                    <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                    </div>
                    <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
