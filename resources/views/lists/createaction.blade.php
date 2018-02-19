<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Create A List </title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   /
  </head>
  <body><a href='/static_json_php5/public/lists/view' class="btn btn-warning">Lists</a>
    <a href='/static_json_php5/public/lists/create' class="btn btn-warning">Create</a>
    <a href='/static_json_php5/public/lists/actions' class="btn btn-warning">Actions</a>

    <div class="container">
      <h2>Create An Action</h2><br />
      
      
      <form method="post">

           <input type="hidden" name="_token" value="{{ csrf_token() }}">


        <div class="row" >
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name">
            
            <label for="name">Title:</label>
            <input type="text" class="form-control" name="title">

            <label for="name">target action id:</label>
            <input type="text" class="form-control" name="target_action_id">

            <label for="name">target type:</label>
            <input type="text" class="form-control" name="target_type">

            <label for="name">target content:</label>
            <input type="text" class="form-control" name="target_content">
            
            <label for="name">content id:</label>
            <input type="text" class="form-control" name="content_id">

            <label for="name">target lay out id:</label>
            <input type="text" class="form-control" name="target_lay_out_id">

            <label for="name">url:</label>
            <input type="text" class="form-control" name="url">

            <label for="name">Icon id:</label>
            <input type="text" class="form-control" name="icon_id">

          </div>
        </div>


        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">

            <button type="submit" class="btn btn-success" style="margin-left:38px">Add Action</button>

          </div>
        </div>
      </form>


    </div>
  </body>
</html>