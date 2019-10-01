<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
 
    <title>DigitalStore</title>
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
  <body>
      
     
      <div id="notfound">
          <div class="notfound">
              <div class="notfound-404">
                  <h1>Oops!</h1>
                  <h2>403 - Unauthorized Page</h2>
              </div>
              <a id="buttoniError" href="{{ URL::previous() }}">Go Back</a>
          </div>
      </div>
  </body>
</html>