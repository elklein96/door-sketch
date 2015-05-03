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
            <canvas id="colors_sketch" width="230" height="456" style="background: url(img/door.jpg) no-repeat center center;"></canvas>
            <div class="tools">
                <a href="#colors_sketch" class="btn btn-success btn-outline" data-tool="marker" id="marker">Marker</a>
                <a href="#colors_sketch" class="btn btn-success btn-outline" data-tool="eraser" id="clear">Clear</a>
                <a href="#colors_sketch" class="btn btn-success btn-outline" data-download="png" id="submit">Submit</a>
                <input href='#colors_sketch' type="color" data-color='' id="color-picker">
            </div>
        </div>
    </div>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="scripts/sketch.js"></script>
    <script type="text/javascript">
        $(function() {
            $.each(['#f00', '#ff0', '#0f0', '#0ff', '#00f', '#f0f', '#000', '#fff'], function() {
                $('.tools').append("<a href='#colors_sketch' data-color='"+this+"' style='background:"+this+";'></a> ");
            });
            $.each([3, 5, 10, 15], function() {
                $('.tools').append("<a href='#colors_sketch' data-size='"+this+"' style='background: #ccc'>"+this+"</a> ");
            });
            $('#colors_sketch').sketch();
        });

        $("#colorChoice").change(function(){
          $("#color-picker").attr('data-color', $(this).val());
        });
    </script>
</body>

</html>