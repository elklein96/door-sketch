<!DOCTYPE html>
<html lang="en">

  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="Sketch your own door.">
      <meta name="author" content="Evan Klein">
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <title>Door Creator</title>
  </head>
  
  <body>
    <div class="container">
      <div id="page-wrapper">
        <div id="pic-wrapper">
          <div id="loading">
            <p class="message" ><br><br><br>Loading...</p>
          </div>
        </div>
        <form id="invisible_form" action="/play.php" method="post" target="_blank">
          <input id="title" name="title" type="hidden" value="">
        </form>
        <div id="footer"></div>
      </div>
    </div>
  </body>
</html>