
$(document).on('click','#update_image',function(e){
    e.preventDefault();
    if(!$("#photo").length){ 

  $("#oldimage").html('<br><input type="file" onchange="readURL(this)"  name="photo" id="photo" > ');
  $("#update_image").hide();
  $("#cancel_update_image").show();


    }



});


$(document).on('click','#cancel_update_image',function(e){
    e.preventDefault();
  
 $("#update_image").show();
$("#cancel_update_image").hide();
  $("#oldimage").html('');
});
