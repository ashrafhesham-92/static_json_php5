<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Edit Modules </title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

  </head>
  <body>
    <a href='/static_json_php5/public/apps/view' class="btn btn-warning">Apps</a>
    <a href='/static_json_php5/public/apps/create' class="btn btn-warning">Create An App</a>
    <a href='/static_json_php5/public/modules/view/{{$module->application_id}}' class="btn btn-warning">Modules</a>

    <a href='/static_json_php5/public/modules/validations' class="btn btn-warning">Validations</a>
    <div class="container">
      <h2>Edit A Module</h2><br  />
      @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div><br />
      @endif

      

      <form method="get" action = "/static_json_php5/public/modules/update/{{$module->id}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <input name="_method" type="hidden" value="PATCH">
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="module_name" value="{{$module->name}}">
          </div>
        </div>
       
       <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="name">Field:</label>
            <input type="text" class="form-control" name="field">

            <select name = "validation">
               <option value = '' ></option>
               @foreach($field_validations as $validation)
                <option value = '{{$validation->id}}' > {{$validation->name}} </option>
               @endforeach
              </select>

          </div>
        </div>
       
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <button type="submit" class="btn btn-success" style="margin-left:38px">Update Module</button>
          </div>
        </div>
      </form>



      @foreach($fields as $field)
      <tr>
        <td><b>{{$field->name}}</b></td>
        <td>
        

        @foreach($field->validations as $validation)
        <td>(
          {{$validation->name}}

          <b><a href='/static_json_php5/public/modules/rmvval/{{$field->id}}/{{$validation->id}}'>x</a></b>

        )</td>
        @endforeach
        </td>
        <td>
          <form method = 'post' action = '/static_json_php5/public/modules/addvalidation/{{$field->id}}'>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <select name = "validation">
               @foreach($field_validations as $validation)
                <option value = '{{$validation->id}}' > {{$validation->name}} </option>
               @endforeach
              </select>
              <button type="submit" class="btn btn-success">+</button>
          </form>
          
       
        </td>
          <form action='/static_json_php5/public/modules/deletefield/{{$field->id}}' method="get">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach


    </div>
  </body>
</html>