<html>
<head></head>
<body>
<?php
  $page = $_GET['page'];

  if ($page == 'login')
  {
    require $page . '.php';
  }


?>
<body>
</html>
