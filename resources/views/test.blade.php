<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>test </title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
    
      <form method="post" enctype="multipart/form-data" files = "true">
        
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <input type="textbox" name="module" value="">
        <input type="textbox" name="name" value="">
        <input type="textbox" name="age" value="">
        <input type="textbox" name="date" value="">
        <input type="file" name="file">
        <input type="password" name="password" value="">
        <input type="password" name="password_confirmation" value="">
          <button type = "submit">sub</button>

      </form>

      

  </body>
</html>