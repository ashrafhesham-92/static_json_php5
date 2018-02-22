<!-- index.blade.php -->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Apps Page</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
    <a href='/static_json_php5/public/apps/view' class="btn btn-warning">Apps</a>
    <a href='/static_json_php5/public/apps/create' class="btn btn-warning">Create An App</a>
    
     <p align = 'center'><b>Apps</b></p>
    
    <div class="container">
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
    <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
      
      </tr>
    </thead>
    <tbody>

      @foreach($apps as $app)
      <tr>
        <td>{{$app->id}}</td>
        <td>{{$app->name}}</td>


        <td><a href='/static_json_php5/public/apps/edit/{{$app->id}}' class="btn btn-warning">Edit</a></td>
        <td>


        <td><a href='/static_json_php5/public/modules/view/{{$app->id}}' class="btn btn-success">Modules</a></td>
        <td>

          <form action='/static_json_php5/public/apps/delete/{{$app->id}}' method="get">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
  </body>
</html>