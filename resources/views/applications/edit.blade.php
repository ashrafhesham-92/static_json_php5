<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>EEdit App </title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
     <a href='/static_json_php5/public/apps/view' class="btn btn-warning">Apps</a>
    <a href='/static_json_php5/public/apps/create' class="btn btn-warning">Create An App</a>
    <div class="container">
      <h2>Edit An App</h2><br  />
      @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div><br />
      @endif

      

      <form method="get" action = "/static_json_php5/public/apps/update/{{$app->id}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <input name="_method" type="hidden" value="PATCH">
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name" value="{{$app->name}}">
           
          </div>
        </div>
       
       
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <button type="submit" class="btn btn-success" style="margin-left:38px">Update App</button>
          </div>
        </div>
      </form>

      
          </div>
  </body>
</html>