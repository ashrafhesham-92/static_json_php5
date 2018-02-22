<!-- index.blade.php -->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Actions Page</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
   <a href='/static_json_php5/public/apps/view' class="btn btn-warning">Apps</a>
    <a href='/static_json_php5/public/apps/create' class="btn btn-warning">Create An App</a>
      
    <div class="container">
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
    <a href='/static_json_php5/public/lists/createaction' class="btn btn-warning">Add Action</a>
    <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($actions as $action)
      <tr>
        <td>{{$action->id}}</td>
        <td>{{$action->name}}</td>
        <td>
          <form action='/static_json_php5/public/lists/deleteaction/{{$action->id}}' method="get">
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