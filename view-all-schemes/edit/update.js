require="../../ckeditor/ckeditor.js";
console.log("Javascript is working!");
var counter = 0;
var uniqID = 0;
var conditions=[];
var statearray = [];
var gendervalue = [];
var categoryval = [];

$(function(){
    $('#category').change(function(){
        categoryval= $('#category').val();
        var spn_item = document.getElementById('show-cat');
        // spn_item.document.innerHTML = categoryval;
        spn_item.innerText = categoryval +",";
    });
    $('#genvalselected').change(function(){
        gendervalue= $('#genvalselected').val();
        var spn_item = document.getElementById('gender-selected');
        spn_item.innerText = gendervalue +",";
    });

    $('textarea[name="content"]').ckeditor();
    CKEDITOR.config.uiColor = "#66FCF1";
    CKEDITOR.config.height = "50vh";


});


/* function To add states in DOM and store in array */
function addstate() {
    var inputstate = document.getElementById('tags').value;
    if (statelist.includes(inputstate)) {
        if (statearray.includes(inputstate)) {
            alert("State already added");
            document.getElementById('tags').value = "";
        } else {
            if (inputstate != "") {
                statearray.push(inputstate);
                console.log(statearray);
                var spn = document.createElement('span');
                spn.innerHTML = statearray[counter];
                spn.setAttribute('id', "state-" + uniqID);
                spn.className = 'flagstate';
                counter = counter + 1;
                document.getElementById('states-input').appendChild(spn);
                document.getElementById('tags').value = "";
                uniqID = uniqID + 1;      
            }
        }
    } else {
        alert("Please enter a valid state");
    }
}
/* Add state Function End here--- */


/* Functions to delete state from DOM and array */
function deleteall() {
    var elem = document.getElementById('states-input');
    while (elem.firstChild) {
        elem.removeChild(elem.lastChild);
    }
    statearray = [];
    counter = 0;

}
function deletelast(){
    var elem = document.getElementById('states-input');
    elem.removeChild(elem.lastChild);
    statearray.pop();
    counter = counter - 1;
    console.log(statearray);
    console.log(counter);
}
/* Delete Function End's here*/


/* Function to Add button and link  */
function show() {
    var btn = document.getElementById("btn");
    var main = document.getElementById('btn-show-hide')
    if (btn.checked) {
        main.style.display = "flex";
    } else {
        main.style.display = "none";
    }
}
/*  **End Here** Function to Add button and link  */


/* Function to enable Condtion */
function cshow() {
    var cbtn = document.getElementById("condtionbtn");
    var section = document.getElementById("condtion-section");
    if (cbtn.checked) {
        section.style.display = "block";
    } else {
        section.style.display = "none";
    }
}
/*  **End Here** Function to enable Condtion */


/* Function to enable Age Condition */
function agebtnshow() {
    var cagebtn = document.getElementById("agebtn");
    var main = document.getElementById('ageshow');
    if (cagebtn.checked) {
        main.style.display = "block";
    } else {
        main.style.display = "none";
    }
}
/*  **End Here** Function to enable Age Condition */


/*Function to Enable and Disable User Gender Conditon */
function usergenhide() {
    var ubtn = document.getElementById("usergenbtn");
    var main = document.getElementById('dropgen');
    if (ubtn.checked) {
        main.style.display = "block";
    } else {
        main.style.display = "none";
    }
}
/* **End Here** Function to Enable and Disable User Gender Conditon */


/* Function to enable and disable Location Conditon */
function locationhide() {
    var lbtn = document.getElementById("locationbtn");
    var main = document.getElementById('location-section');
    if (lbtn.checked) {
        main.style.display = "block";
    } else {
        main.style.display = "none";
    }
}
/* **End Here** Function to enable and disable Location Conditon */

/* Function to enable and disable Reservation Conditon */
function reservation() {
    var rbtn = document.getElementById("reser");
    var main = document.getElementById('dropdowncat');
    if (rbtn.checked) {
        main.style.display = "block";
    } else {
        main.style.display = "none";
    }
}
/* **End Here** Function to enable and disable Reservation Conditon */


/* Function to Double Select radio button */
$(function() {
    $('input[name="states"]').click(function() {
        var $radio = $(this);

        if ($radio.data('waschecked') == true) {
            $radio.prop('checked', false);
            $radio.data('waschecked', false);
        } else
            $radio.data('waschecked', true);

        $radio.siblings('input[type="radio"]').data('waschecked', false);
    });
});
/* **End Here** Functio  to Double Select radio button */


/*Function for States Suggestion */
$(document).ready(function() {
    BindControls();
});
var statelist = [];
var districtlist = [];
function BindControls() {
    const obj = "places.json";
    $.getJSON(obj, function(info) {
        $.each(info, function(index, value) {
            {
                statelist.push(value.state);
                districtlist.push(value.district);
            }
        });
        $('#tags').autocomplete({
            source: statelist,
            scroll: true,
            autoFocus: true,
            delay:100,
        }).focus(function() {
            $(this).autocomplete("search", "");
        });

    });
} 
/* **End Here** Function for States Suggestion */

/* Function for Age slider */
var age_min = 0;
var age_max = 200;
$( function() {
    $( "#slider-range" ).slider({
        range: true,
        min: 0,
        max: 200,
        values: [ age_min, age_max ],
        slide: function( event, ui ) {
            $("#amount").val("Age need to be in Between "+ui.values[0] + " and " + ui.values[1] );
            age_min = ui.values[ 0 ];
            age_max = ui.values[ 1 ];
        }
    });
    $("#amount").val("Age need to be in Between " +$("#slider-range").slider("values", 0 ) +
    " and " + $("#slider-range").slider("values", 1));
});
/* **End Here** Function for Age slider */


// // Remove Ctrl form select
// window.onmousedown = function (e) {
//     var el = e.target;
//     if (el.tagName.toLowerCase() == 'option' && el.parentNode.hasAttribute('multiple')) {
//         e.preventDefault();

//         // toggle selection
//         if (el.hasAttribute('selected')) el.removeAttribute('selected');
//         else el.setAttribute('selected', '');

//         // hack to correct buggy behavior
//         var select = el.parentNode.cloneNode(true);
//         el.parentNode.parentNode.replaceChild(select, el.parentNode);
//     }
// }

var schemeTitle,schemeDescription,BtnShow,BtnShowlabel,BtnShowlink,conditionCheck,Ageconditionbtn,userReservation,userGender;
/* Function to save data in server */
var run=0;

function validate(){
    schemeTitle = $('#schemeTitle').val();
    schemeDescription = $('textarea[name="content"]').val();   
    BtnShow = $('#btn').is(':checked');
    BtnShowlabel = $('#btn-label').val();
    BtnShowlink = $('#btn-link').val();
    conditionCheck = $('#condtionbtn').is(':checked');
    Ageconditionbtn = $('#agebtn').is(':checked');
    userResveration = $('#reser').is(':checked');
    userGender=$('#usergenbtn').is(':checked');
    StateCondtion=$('#states').is(':checked');

    if(schemeTitle == '' || schemeTitle==null)       // This will check if schemeTitle is empty or not
    {
        alert('Please enter scheme title');
        run=run+1;
    }
    else 
    if(schemeDescription == '' || schemeDescription==null)    // This will check if schemeDescription is empty or not
    {
        alert('Please enter scheme description');
        run=run+1;
    }
    else if(schemeDescription.length < 10)                   // This will check if schemeDescription is less than 10 characters
    {
        alert('Please enter minimum 10 characters');
        run=run+1;
    }
    else if(schemeTitle.length > 1000)
    {
        alert('Please enter maximum 1000 characters');       // This will check if schemeTitle is less than 1000 characters
        run=run+1;
    }
    else if(BtnShow == true)                                // This  Show Button is checked or not
    {
        
        if(BtnShowlabel == '' || BtnShowlabel==null)        // This will check if Button title is empty or not
        {
            alert('Please enter button label');
            run=run+1;
        }
        else if(BtnShowlink == '' || BtnShowlink==null)     // This will check if Button link is empty or not
        {
            alert('Please enter button link');
            run=run+1;
        }
        else{
            run=0;
        }
    }
    else{
        run=0;
    }
    
    if(conditionCheck == true)                              // This  Condtion is checked or not
    {
        if(Ageconditionbtn == true)                         // This  Age Condtion is checked or not
        {
            if(age_min == 0 && age_max == 200)             // This will check if Age is empty or not
            {
                alert('Please select age range\nOr\nUncheck Age Condition to make all age Group Users Eligible');
                run=run+1;
            }
            else{
                run=0;
            }
        }
        else
        {
             // This will check if Age is empty or not and make required changes in form
            if(age_min != 0 && age_max != 200)            
            {
                age_min = 0;
                age_max = 200;
                console.log(age_min);
                $( function() {
                    $( "#slider-range" ).slider({
                        range: true,
                        min: 0,
                        max: 200,
                        values: [ age_min, age_max ],
                        slide: function( event, ui ) {
                            age_min = ui.values[ 0 ];
                            age_max = ui.values[ 1 ];
                        }
                    });
                    $("#amount").val("Age need to be in Between " +$("#slider-range").slider("values", 0 ) +
                    " and " + $("#slider-range").slider("values", 1));
                });
            }
            run=0;
            // **End Here** This will check if Age is empty or not and make required changes in form
        }


        if(userResveration == true)                         // This  Reservation is checked or not
        {
            if(categoryval.length==0)
            {
                alert('Please select Reservation Category');
                run=run+1;
            }
            else
            {
                run=0;
            }
        } 
        else if(userResveration == false)
        {
            $('#category').val(0);
            categoryval = [];
        }
        if(userGender == true)
        {
            if($('#genvalselected').val() == '' || $('#genvalselected').val()==null)
            {
                alert('Please select Gender');
                run=run+1;
            }
            else
            {
                run=0
            }
        }
        else if(userGender == false)
        {
            $('genvalselected').val(0);
            gendervalue=[]
        }
        // state condtion will be come here
    }
    else if(conditionCheck == false)
    {
        deleteall();
        statearray = [];
        gendervalue = [];
        categoryval = [];
        age_min = 0;
        age_max = 200;
    }
    if(run==0)
    {
       return conditionCheck;
    }
}

function save(){
    if(validate()) generateConditions();
    if(run==0)send();
}

function generateConditions(){
    // console.log("onclick");
    conditions = [];
    if(age_min!=0||age_max!=200){
        conditions.push({
            "parameter":"age",
            "condition":`$param >= ${age_min} && $param <= ${age_max}`
        });
    }
    if($('#usergenbtn').is(':checked'))addArrayCondition('gender',gendervalue);

    let states_radio = $('input[name="states"]:checked').val();
    let stateExcept = false;
    let stArray = statearray;
    if(states_radio=="allut"){
        stArray=statelist.filter(function(st){
            return st.includes('(UT)');
        });
    }
    if(states_radio=="nout"){
        stArray=statelist.filter(function(st){
            return (!st.includes('(UT)'));
        });
    }
    if(states_radio=="except-state") stateExcept=true;
    if($('#locationbtn').is(':checked'))addArrayCondition('state',stArray,stateExcept);

    if($('#reser').is(':checked'))addArrayCondition('category',categoryval);

    function addArrayCondition(param,arr,except=false){
        if(except){
            conditions.push({
                "parameter":param,
                "array":arr,
                "condition":`!in_array($param,$arr)`
            })
        }else{
            conditions.push({
                "parameter":param,
                "array":arr,
                "condition":`in_array($param,$arr)`
            })
        }
    }
    
    console.log(conditions);
    
}

function send(){
    $.post("update.php",
        {
            id:id,
            schemeTitle: schemeTitle,
            schemeDescription:schemeDescription,
            show_Btn:BtnShow,
            show_Btnlabel:BtnShowlabel,
            show_Btnlink:BtnShowlink,
            conditions: JSON.stringify(conditions)
        },
        function(data, status){
            console.log("Data: " + data + "\nStatus: " + status);
            // $('#output').html(data);
            alert('Update Successfully');
            reload();
        }
    );

}
function reload(){
    console.log("../main.php");
    window.location="../main.php";
}