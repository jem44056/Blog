
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Forum</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="http://localhost/blog/public/css/style.css" rel="stylesheet">
        <link href="http://localhost/blog/public/css/sweetalert.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
  </head>

  <body>

    @yield('page-content')



     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
     <script src="{{ URL::asset('js/sweetalert.min.js') }}"></script>
     <script type="text/javascript">
       
       @if(notify()->ready())

       swal({
        title: "{!! notify()->message() !!}",
        type: "{{ notify()->type() }}",
        @if(notify()->option('timer'))
          timer:: "{{ notify()->option('timer') }}",
          showConfirmButton: false,
        @endif
        html: true 
       })
       @endif
     </script>
  </body>
</html>