<!-- index.blade.php -->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Lists Page</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
    
      <a href='/static_json_php5/public/modules/view/{{$module->application_id}}' class="btn btn-warning">Modules</a>
    <a href='/static_json_php5/public/modules/create/{{$module->application_id}}' class="btn btn-warning">Create A Module</a>
    <a href='/static_json_php5/public/lists/actions' class="btn btn-warning">Actions</a>

      <b>Lists in <a href='/static_json_php5/public/modules/edit/{{$module->id}}'>{{$module->name}}</a></b>
    <p align = "center"><a href='/static_json_php5/public/lists/create/{{$module->id}}' class="btn btn-warning">Create A List</a></p>
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
      @foreach($lists as $list)
      <tr>
        <td>{{$list->id}}</td>
        <td>{{$list->name}}</td>
        <td><a href='/static_json_php5/public/lists/edit/{{$list->id}}' class="btn btn-warning">Edit</a></td>
        <td>
          <form action='/static_json_php5/public/lists/delete/{{$list->id}}' method="get">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>

          <a href='/static_json_php5/public/lists/getjson/{{$list->id}}' class="btn btn-success">get json</a></td>

        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
  </body>
</html>