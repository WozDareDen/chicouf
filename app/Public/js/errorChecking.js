$(document).ready(function () { 
    var $champ = $('.champ');
        $champ.keyup(function () {
        // CHECK FILLED FIELDS
            if ($(this).val().length <= 1) {
                $(this).css({ 
                    borderColor: 'red'
                });
            }
            else {
                $(this).css({
                    borderColor: 'initial'
            });
        }
    });


// PASSWORD VALIDATION
var $mdp = $('#regFormPass');
$mdp.keyup(function(){
    if ($mdp[0].value.match(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[\da-zA-Z]{8,16}$/)) {
        document.getElementById('pop').style.display = 'none';
    }else{
        document.getElementById('pop').style.display = 'block';
    }
});

// PASSWORDS MATCH
$('#regFormPass2').on('keyup',function(){
    if ($('#regFormPass').val() == $('#regFormPass2').val()) {
        $('#message').html('Les mots de passe correspondent').css('color', 'green');
      } else 
        $('#message').html('Les mots de passe ne correspondent pas').css('color', 'red');
});

    var $mail = $('#mail');
    $mail.keyup(function () {
        if ($mail[0].value.match(/^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/)) {
            console.log('mailTrue');
            document.getElementById('popMail').style.display = 'none';
        }else {
            console.log('mailfalse');
            document.getElementById('popMail').style.display = 'block';
            $(this).css({ // on rend le champ rouge
                borderColor: 'red',
                color: 'red'
            });
        }
    });

});


// SHOW/HIDE PASSWORD 1
function watchPW() {
    console.log(x);
    var x = document.getElementById("regFormPass"); 
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }    
} 
// SHOW/HIDE PASSWORD 2
function myFunction2() {
    var y = document.getElementById("regFormPass2");
        if (y.type === "password") {
            y.type = "text";
        } else {
            y.type = "password";
        }
}

var current_list_data = null; 

// AUTOCOMPLETE
$('#myInput').autocomplete({
    source : function(req,reponse){ 
    $.ajax({
            url : 'index.php?action=ajaxMeds&search='+encodeURI(req.term), 
            type : 'GET',
            dataType : 'json', 
            success : function(donnee){
                current_list_data = donnee.map(function(d) {
                    return {label: d.title, value: d.idMeds}
                });
                reponse(current_list_data);
            }    
        });
    },
    _renderMenu: function( ul, items ) {             
          var that = this;
        $.each( items, function( index, item ) {
          that._renderItemData( ul, item );
        });
        $( ul ).find( "li:odd" ).addClass( "odd" );
      },
      select(e, i) {
          var item = current_list_data.find(function(d) {
            return d.title === i.label;
        }), nb_current_meds = $('.meds_container');
        var formGroupMeds = $('<div class="meds_container"><div class="form-group col-lg-12"><label for="meds">Médicament</label></div>');
        var divMedsCo = $('<div class="medsCo"></div>');
        var inputMedsCo = $('<input type="search" disabled />');
        var inputId = $('#myInput').val();
        $(inputMedsCo).attr('id', item.value);
        $(inputMedsCo).attr('name',item.label);
        $(inputMedsCo).val(item.label);
       
        var formGroupPoso = $('<div class="form-group col-lg-12><label for="poso">Fréquences/prises</label></div></div>')
        var divPoso = $('<div class="posoCo"></div>')
        var textareaPoso = $('<br /><textarea rows="2" cols="30" ></textarea>');    
            
        $(formGroupMeds).append(divMedsCo);
        $(divMedsCo).append(inputMedsCo);
        $('.lampost').before(formGroupMeds);
        $(formGroupPoso).append(divPoso);
        $(divPoso).append(textareaPoso);
        $('.lampost').before(formGroupPoso);
    
        $('.startDate').css('display','block');
        setTimeout(function() {
            $('#myInput').val("");

        },100)
      },
    delay:300
})


// OBJECT CHILDREN
var Children = {
    lastname : "",
    firstname :"" , 
    birthdate :"" , 
    gender :"" , 
    parent1 :"" , 
    parent2 :"" , 
    favMeal :"" , 
    hatedMeal :"" , 
    allergies :"",
    startDate: "",
    meds: ""
}

var NewChildren = Children;

// GET INPUTS FROM CREATE-CHILD-FORM
$('#submitChildren').on('click',function(){
    NewChildren.lastname = $('#lastname1').val();
    NewChildren.firstname = $('#firstname1').val();
    NewChildren.birthdate = $('#birthdate').val();
    NewChildren.gender = $('input[name=genderCo]:checked',"#gender").val();
    NewChildren.parent1 = $('#parent1').val();
    NewChildren.allergies = $('#allergies').val();  
    NewChildren.favMeal = $('#favoriteMeal').val();
    NewChildren.hatedMeal = $('#hatedMeal').val();
    NewChildren.parent2 = $('#parent2').val();
    NewChildren.startDate = $('#startDateCo').val();

    NewChildren.meds = [];
    var fuckmyLife = $('.posoCo');
    $('.medsCo').each(function(index){
        var meds ={
            id : null,
            label: null,
            posology: null
        },
        input = $(this).find("input")
        meds.id = input.val(),
        meds.label = input.attr('id'),
        
        meds.posology = $($(fuckmyLife)[index]).find('textarea')[0].value;
        NewChildren.meds.push(meds);
    });
   
    var childrenString = JSON.stringify(NewChildren);

$.ajax({
    url: "index.php",
    data: {data:childrenString,action:"addNewChild"},
    method: "POST",
        success: function(data){
            location.href = "index.php";
        },
        error: function(e){
            console.log(e.message);
        }
    });
})



// OBJECT CHILDREN
var Children2 = {
    idChild: "",
    lastname : "",
    firstname :"" , 
    birthdate :"" , 
    gender :"" , 
    parent1 :"" , 
    parent2 :"" , 
    favMeal :"" , 
    hatedMeal :"" , 
    allergies :"",
    idAllergy : "",
    startDate: "",
    meds: ""
}

var NewChildren2 = Children2;

// GET INPUTS FROM UPDATE-CHILD-FORM
$('#submitChildren2').on('click',function(){
    NewChildren2.idChild = $('#idChildCo').val();
    NewChildren2.lastname = $('#lastname1').val();
    NewChildren2.firstname = $('#firstname1').val();
    NewChildren2.birthdate = $('#birthdate').val();
    NewChildren2.gender = $('input[name=genderCo]:checked',"#gender").val();
    NewChildren2.parent1 = $('#parent1').val();
    NewChildren2.idAllergy = $('#idAllergyCo').val();
    NewChildren2.allergies = $('#allergies').val();  
    NewChildren2.favMeal = $('#favoriteMeal').val();
    NewChildren2.hatedMeal = $('#hatedMeal').val();
    NewChildren2.parent2 = $('#parent2').val();
    NewChildren2.startDate = $('#startDateCo').val();
    NewChildren2.meds = [];
    var posoPoso = $('.posoCo');
    $('.medsCo').each(function(index){
        var meds ={
            id : null,
            label: null,
            posology: null
        },
        input = $(this).find("input")
        meds.id = input.val(),
        meds.label = input.attr('id'),
        
        meds.posology = $($(posoPoso)[index]).find('textarea')[0].value;
        NewChildren2.meds.push(meds);
    });
   
    var childrenString = JSON.stringify(NewChildren2);

$.ajax({
    url: "index.php",
    data: {data:childrenString,action:"updateChild"},
    method: "POST",
        success: function(data){
            location.href = "index.php";
        },
        error: function(e){
            console.log(e.message);
        }
    });
})