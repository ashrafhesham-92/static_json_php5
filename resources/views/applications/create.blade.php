<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Create An App </title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
    
    </script>

  </head>
  <body> <a href='/static_json_php5/public/apps/view' class="btn btn-warning">Apps</a>
    <a href='/static_json_php5/public/apps/create' class="btn btn-warning">Create An App</a>

    <div class="container">
      <h2>Create An App</h2><br />
      
      
      <form method="post">

           <input type="hidden" name="_token" value="{{ csrf_token() }}">


        <div class="row" >
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name">
          </div>
        </div>


        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">

            <button type="submit" class="btn btn-success" style="margin-left:38px">Create App</button>

          </div>
        </div>
      </form>


    </div>
  </body>
</html>