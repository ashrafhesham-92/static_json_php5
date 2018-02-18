<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Edit lists </title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
    <a href='/static_json_php5/public/lists/view' class="btn btn-warning">Lists</a>
    <a href='/static_json_php5/public/lists/create' class="btn btn-warning">Create</a>
    <div class="container">
      <h2>Edit A List</h2><br  />
      @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div><br />
      @endif

      

      <form method="get" action = "/static_json_php5/public/lists/update/{{$list->id}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <input name="_method" type="hidden" value="PATCH">
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="list_name" value="{{$list->name}}">
            <table>
              <tr>

            <th><label for="name">New Row:</label></th>
            <th><input type="checkbox" name="newrow" value = "checked"></th>
            </tr>
            <tr>
            <th><label for="name">New Header:</label></th>
            <th><input type="text" class="form-control" name="n_head" value=""></th>
          </tr>
          </table>
          </div>
        </div>
       
       
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <button type="submit" class="btn btn-success" style="margin-left:38px">Update List</button>
          </div>
        </div>
      </form>

      
      <table border = '4'>
        <tr>

        <th>
         
            <div class="form-group col-md-4">

            </div>
          </th>
          
          @foreach($headers as $header)

          <th> 
            <div class="form-group col-md-4">
            header:{{$header->label}}

            <form method = 'get' action = '/static_json_php5/public/lists/updateheader/{{$header->id}}'>
              <input type="text" class="" name="n_head">
              <button type="submit" class="btn btn-success" style="margin-left:38px">change value</button>
            </form>

            <a href='/static_json_php5/public/lists/deleteheader/{{$header->id}}' class="btn btn-danger">Delete</a>
            </div>
          </th>
          @endforeach

        


        </tr>

        @foreach($rows as $row)

          <tr>
            <th>
              <div class="form-group col-md-4">
              {{$row->id}}
              </div>


              <a href='/static_json_php5/public/lists/deleterow/{{$row->id}}' class="btn btn-danger">Delete</a>
              

            </th>

            @foreach($row->cells as $cell)
            <th>
            <div class="form-group col-md-4">
            cell:{{$cell->name}}
            
            <form method = 'get' action = '/static_json_php5/public/lists/updatecell/{{$cell->id}}'>
              <input type="text" class="" name="name">
              <button type="submit" class="btn btn-success" style="margin-left:38px">change value</button>
            </form>

            <a href='/static_json_php5/public/lists/deletecell/{{$cell->id}}' class="btn btn-warning ">Delete</a>

            </div>

            </th>
            @endforeach
            <th>
            
            <form method = 'get' action = '/static_json_php5/public/lists/addcell/{{$row->id}}'>
              <input type="text" class="" name="name">
              <button type="submit" class="btn btn-success" style="margin-left:38px">add cell</button>
            </form>

            </th>
          </tr>
        @endforeach

      </table>
    </div>
  </body>
</html>