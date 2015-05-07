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
            <br>
            <canvas id="colors_sketch" width="230" height="456" style="background: url(img/door.jpg) no-repeat center center;"></canvas>
            <div class="tools">
                <a href="#colors_sketch" class="btn btn-success btn-outline" data-tool="marker" id="marker">Marker</a>
                <a href="#colors_sketch" class="btn btn-success btn-outline" data-tool="eraser" id="clear">Clear</a>
                <a href="#colors_sketch" class="btn btn-success btn-outline" data-download="png" id="submit">Submit</a>
                <a href='#colors_sketch' style='display:none;' data-color='' id='color'></a>
                <input href='#colors_sketch' type="color" id="color-picker">
            </div>
        </div>
    </div>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="scripts/sketch.js"></script>
    <script type="text/javascript">
        $("#color-picker").change(function(){
          $("#color").attr('data-color', $(this).val());
          $("#color").click();
        });

        $('#colors_sketch').sketch();
    </script>
</body>

</html>