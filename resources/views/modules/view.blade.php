<!-- index.blade.php -->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Modules Page</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
    <a href='/static_json_php5/public/modules/view' class="btn btn-warning">Modules</a>
    <a href='/static_json_php5/public/modules/create' class="btn btn-warning">Create</a>
    
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
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($modules as $module)
      <tr>
        <td>{{$module->id}}</td>
        <td>{{$module->name}}</td>
        <td><a href='/static_json_php5/public/modules/edit/{{$module->id}}' class="btn btn-warning">Edit</a></td>
        <td>
          <form action='/static_json_php5/public/modules/delete/{{$module->id}}' method="get">
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