<!DOCTYPE html>
<html lang="en">

  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="Sketch your own door.">
      <meta name="author" content="Evan Klein">
      <link rel="stylesheet" href="/css/main.css">
      <link href="/css/bootstrap.min.css" rel="stylesheet">
      <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
      <title>Door Creator</title>
  </head>
  
  <body>
    <div class="container">
      <div id="page-wrapper">
        <div id="pic-wrapper">
          <div id="loading">
            <p class="message" style="font-size:200%;"><br><i class="fa fa-cog fa-5x fa-spin"></i>Loading...</p>
          </div>
        </div>
        <form id="invisible_form" action="/play.php" method="post" target="_blank">
          <input id="title" name="title" type="hidden" value="">
        </form>
        <div id="footer"></div>
      </div>
    </div>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="/scripts/displayPics.js"></script>
  </body>
</html>