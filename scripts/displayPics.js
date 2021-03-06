var json = '';
var preview = false;
var currentMovie = 0;

$(document).ready(function () {
  $.ajax({
    type:   "POST",
    url:    "../scripts/img_aggregator.php",
    data:   {
        pic:  "req"
    },
    success: function(data) {
      $('#loading').hide();
      
      if(data.indexOf("Error") > -1){
        $('#pic-wrapper').append('<p class="text-danger message"><br><br><br>'+data.replace('Error', '')+'</p>');
      }
      else{
        console.log("success");
        json = $.parseJSON(data);
        for(var i=0; i<json.length; i++){
          console.log(json[i]);
          $("#pic-wrapper").append('<div class="pic" id="pic'+i+'"><img class="data" id="data'+i+'" src="'+json[i].pic+'"></div>');
        }
      }
    }
  });
});

$(document).on('click', '.pic', function () {
  var start = 0;
  var end = 0;
  currentPic = parseInt($(this).attr('id').replace('pic', ''));

  $( '.pic' ).removeClass('selected');

  $( '.pic' ).each(function( index ) {
    if($('#pic'+(index+1)).length){
      if( $('#pic'+index).offset().top != $('#pic'+(index+1)).offset().top ){
        start = end;
        end = index+1;
        $( '.pic' ).slice(start, index+1).wrapAll("<div class='row-wrapper' style='display:block;overflow:hidden;'></div>");
      }
    }
  });
  $( '.pic' ).slice(end).wrapAll("<div class='row-wrapper' style='display:block;overflow:hidden;'></div>");

  if(!preview){
    $(this).addClass('selected');
    $(this).parent().after("<div id='preview'><div class='poster-container' style='padding-top:1.5%;'><img class='poster-big' src='"+json[currentPic].pic+"'></div></div>");
    $('#preview').hide();

    $( "#preview" ).animate({
        down: "-=50",
        height: "toggle"
    }, {duration: 750, queue: false,complete: function() {}
    });
    preview = true;
  }
  else{
    $( "#preview" ).animate({
        up: "+=75",
        height: "toggle"
    }, {duration: 500, queue: false,complete: function() {$('#preview').remove(); $( '.pic' ).unwrap();}
    });
    preview = false;
  }

});