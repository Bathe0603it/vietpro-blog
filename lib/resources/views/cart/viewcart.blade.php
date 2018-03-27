<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <div class="row">
    <div class="col-md-6">
      <h2>Cart</h2>
      <form method="post">
        <div class="row">
          <div class="col-md-6">
            <img src="http://www.w3schools.com/w3css/img_temp_architect.jpg" width="200px">
          </div>
          <div class="col-md-3">
            <p class="alert alert-info">San pham 1</p>
          </div>
          <div class="col-md-3">
            <input type="" name="id" value="1" type="number"><a href="{{asset('addcart/1')}}">add</a>
          </div>
        </div><br>
        <div class="row">
          <div class="col-md-6">
            <img src="http://www.w3schools.com/w3css/img_temp_architect.jpg" width="200px">
          </div>
          <div class="col-md-3">
            <p class="alert alert-info">San pham 2</p>
          </div>
          <div class="col-md-3">
            <input type="" name="id" value="2" type="number"><a href="{{asset('addcart/2')}}">add</a>
          </div>
        </div>
        {{csrf_field()}}
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div>
    
  </div>
  <hr>
  <div class="row">
    <div class="col-md-12">
      
    </div>
  </div>
</div>

</body>
</html>

