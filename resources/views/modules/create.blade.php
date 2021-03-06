<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Create A Module </title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
        $("#add_field_btn").click(function(){
         //   $("#div_2").prepend('#div_1');
        });
       
    });
    </script>

  </head>
  <body><a href='/static_json_php5/public/apps/view' class="btn btn-warning">Apps</a>
    <a href='/static_json_php5/public/apps/create' class="btn btn-warning">Create An App</a>

    <a href='/static_json_php5/public/modules/create/{{$app->id}}' class="btn btn-warning">Create A Module</a>
    <a href='/static_json_php5/public/modules/validations' class="btn btn-warning">Validations</a>


    <div class="container">
      <h2>Create A Module for <a href = "/static_json_php5/public/modules/view/{{$app->id}}" >{{$app->name}} </a>App</h2><br />
      
      
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

            <button type="submit" class="btn btn-success" style="margin-left:38px">Add Module</button>

          </div>
        </div>
      </form>


    </div>
  </body>
</html>