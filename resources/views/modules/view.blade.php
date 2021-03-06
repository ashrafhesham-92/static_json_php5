<!-- index.blade.php -->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Modules Page</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
    <a href='/static_json_php5/public/apps/view' class="btn btn-warning">Apps</a>
    <a href='/static_json_php5/public/apps/create' class="btn btn-warning">Create An App</a>
    <a href='/static_json_php5/public/modules/create/{{$app->id}}' class="btn btn-warning">Create Module</a>
    
    <a href='/static_json_php5/public/modules/validations' class="btn btn-warning">Validations</a>
    
    
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
      @foreach($modules as $module)
      <tr>
        <td>{{$module->id}}</td>
        <td>{{$module->name}}</td>
        <td><a href='/static_json_php5/public/modules/edit/{{$module->id}}' class="btn btn-warning">Edit</a></td>
        <td><a href='/static_json_php5/public/lists/view/{{$module->id}}' class="btn btn-success">Lists</a></td>

        <td><a href='/static_json_php5/public/modules/delete/{{$module->id}}' class="btn btn-danger">delete</a></td>
        
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
  </body>
</html>