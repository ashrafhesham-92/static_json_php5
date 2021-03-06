<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Create A List </title>
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
  <body>

 <a href='/static_json_php5/public/modules/view/{{$module->application_id}}' class="btn btn-warning">Modules</a>
    <a href='/static_json_php5/public/modules/create/{{$module->application_id}}' class="btn btn-warning">Create A Module</a>
    <a href='/static_json_php5/public/lists/actions' class="btn btn-warning">Actions</a>

    <div class="container">
      <h2>Create A List For <a href='/static_json_php5/public/lists/view/{{$module->id}}'>{{$module->name}}</a> Module</h2><br />
      
      
      <form method="post" action ="/static_json_php5/public/lists/create">

           <input type="hidden" name="_token" value="{{ csrf_token() }}">
           <input type="hidden" name="module_id" value="{{ $module->id }}">

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

            <button type="submit" class="btn btn-success" style="margin-left:38px">Add List</button>

          </div>
        </div>
      </form>


    </div>
  </body>
</html>