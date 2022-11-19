function call(x,y){
  const obj = "./places.json";
  $(document).ready(function(){
    let data;
    $.getJSON(obj, function (info) {
      data=info;
      if(x!="")
      {
        $('#state').append('<option value="' + x + '" selected>' + x + 
        '</option>');
        console.log(x);
      }
      $.each(data, function (index, value) {
        $('#state').append('<option value="' + value.state + '">' + value.state + 
        '</option>');       
      }); 
    });
  });
  $("#state").change(function(){
    var state = $("#state").val();
    $.getJSON(obj,function(info){
      $.each(info,function(index,value){
              if(value.state==state || x==value.state){
                $("#district").empty();
                $("#district").append('<option disabled="true" selected="true">Select Your District</option>');
                $.each(value.districts,function(index,value){
                  $("#district").append('<option value="'+value+'" >'+value+'</option>');
                });
              }
            });
          });
        });  
    if(x!="")
    {
     var state = $("#state").val();
      $.getJSON(obj,function(info){
        $.each(info,function(index,value){
                if(value.state==state || x==value.state){
                  $("#district").empty();
                  $("#district").append('<option disabled="true" selected="true">Select Your District</option>');
                  if(y!="")
                  {
                    $("#district").append('<option value="'+y+'" selected>'+y+'</option>');
                  }
                  $.each(value.districts,function(index,value){
                    $("#district").append('<option value="'+value+'" >'+value+'</option>');
                  });
                }
              });
            });
            $("#state").change(function(){
              $("#district").empty();
            });
    }
}