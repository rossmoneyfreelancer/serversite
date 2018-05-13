<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>{{ $title }} - Dev</title>

  <link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">
</head>
<body>
  @yield("content")

  <script type="text/javascript" src="scripts/main.js"></script>
</body>
</html>