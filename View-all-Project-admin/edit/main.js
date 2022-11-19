function call(x,y){
    const obj = "../../config/places.json";
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
          $( function() {
            var dateFormat = "mm/dd/yy",
            from = $( "#from" )
                .datepicker({
                defaultDate: "+1w",
                changeMonth: true,
                numberOfMonths: 1
                })
                .on( "change", function() {
                to.datepicker( "option", "minDate", getDate( this ) );
                }),
            to = $( "#to" ).datepicker({
                defaultDate: "+1w",
                changeMonth: true,
                numberOfMonths: 1
            })
            .on( "change", function() {
                from.datepicker( "option", "maxDate", getDate( this ) );
            });
        
            function getDate( element ) {
            var date;
            try {
                date = $.datepicker.parseDate( dateFormat, element.value );
            } catch( error ) {
                date = null;
            }
        
            return date;
            }
        } );
        function verifyPincode(event){
                var pincode = event.target.value;
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        var response = JSON.parse(this.responseText);
                        if(response[0].Status == "Success"){
                            let po = response[0].PostOffice[0];
                            //printing the data
                            console.log(po.District+','+po.State+','+po.Name);
                            document.getElementById('location').value = po.Name;
                            console.log('Pincode is valid');
                            
                            // document.getElementById('district').value = po.District;
                        }else{
                            document.getElementById('location').value = "";
                            document.getElementById('pincode').value = "";
                            console.log('Pincode is invalid');
                            alert('Pincode is invalid');
    
                        }
                    }
                };
                xhttp.open("GET", "https://api.postalpincode.in/pincode/"+pincode, true);
                xhttp.send();
            }
            function preview_image() 
{
 var total_file=document.getElementById("upload_file").files.length;
 for(var i=0;i<total_file;i++)
 {
  $('#image_preview').append("<img src='"+URL.createObjectURL(event.target.files[i])+"'>");
 }
}

var PostTitle = $('#postTitle');
var PostDescription = $('#postDescription');
var PostStartDate = $('#from');
var PostEndDate = $('#to');
var CompanyName = $('#companyName');
var ProjectBudget = $('#budget');
var ProjectState = $('#sate');
var ProjectDistrict = $('#district');
var ProjectPincode = $('#pincode');
var ProjectLocation = $('#location');

// $('#submit').click(function(){
//   console.log(ProjectDistrict.val());
// });

function checksub(e){
  var test = document.getElementById("upload_file").files.length;
  // if(test == 0){
  //   alert("Please upload atleast one image");
  //   e.preventDefault();
  // }
  // else 
  if(PostTitle.val() == ""){
    alert("Please enter the title");
    e.preventDefault();
  }
  else if(PostDescription.val() == ""){
    alert("Please enter the description");
    e.preventDefault();
  }
  else if(PostStartDate.val() == ""){
    alert("Please enter the start date");
    e.preventDefault();
  }
  else if(PostEndDate.val() == ""){
    alert("Please enter the end date");
    e.preventDefault();
  }
  else if(CompanyName.val() == ""){
    alert("Please enter the company name");
    e.preventDefault();
  }
  else if(ProjectBudget.val() == ""){
    alert("Please enter the budget");
    e.preventDefault();
  }
  else if(ProjectState.val() == ""){
    alert("Please Select the state");
    e.preventDefault();
  }
  else if(ProjectDistrict.val() == ""){
    alert("Please Select the district");
    e.preventDefault();
  }
  else if(ProjectPincode.val() == ""){
    alert("Please enter the pincode");
    e.preventDefault();
  }
  else{
    console.log("Submitted");
  }
}