<!DOCTYPE html>
    <html lang="en">
    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Nghean-Aptech Laravel 7 CRUD</title>
      <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
      <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
      
      
    </head>
    <body>
      <div class="container">
        @yield('content') 
      </div>
      <script src="{{ asset('js/app.js') }}" type="text/js"></script>
      <script> CKEDITOR.replace('editor1'); </script>
    </body>
    </html>