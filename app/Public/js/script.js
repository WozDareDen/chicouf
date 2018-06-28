// ALL CHECKINGS
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
    // $mail.keyup(function () {
    //     if ($mail[0].value.match(/^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/)) {
    //         document.getElementById('popMail').style.display = 'none';
    //     }else {
    //         document.getElementById('popMail').style.display = 'block';
    //         $(this).css({ 
    //             borderColor: 'red',
    //             color: 'red'
    //         });
    //     }
    // });
    $mail.keyup(function () {
        if ($mail[0].value.match(/^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/) == false) {
            document.getElementById('popMail').style.display = 'block';
            $(this).css({ 
                borderColor: 'red',
                color: 'red'
            });
        }else {
             document.getElementById('popMail').style.display = 'none';
            
        }
    });
});
// SHOW/HIDE PASSWORD 1
function watchPW() {
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
// (UN)-MASK NOTES
$('#mask').click(function(){
    $('.reminder').slideToggle("fast")
});
// AUTOCOMPLETE
var current_list_data = null;
$('#myInput').length && $('#myInput').autocomplete({
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
    select: function(event,ui) {
        nb_current_meds = $('.meds_container');
        var formGroupMeds = $('<div class="meds_container"><div class="form-group col-lg-12"><label for="meds">Médicament</label></div></div>');
        var divMedsCo = $('<div class="medsCo"></div>');
        var inputMedsCo = $('<input type="search" disabled />');
        var inputId = $('#myInput').val();
        $(inputMedsCo).attr('id', ui.item.value);
        $(inputMedsCo).attr('name',ui.item.label);
        $(inputMedsCo).val(ui.item.label);
        
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
    bulk :"",
    bulkDate :"",
    gender :"" , 
    parent1 :"" , 
    parent2 :"" , 
    favMeal :"" , 
    hatedMeal :"" , 
    allergies :"",
    startDate: "",
    meds: "",
    idChild: "",
    idAllergy : "",
    startDate: ""
}
var NewChildren = Children;

// GET INPUTS FROM CREATE-CHILD-FORM
$('#submitChildren').on('click',function(){
    NewChildren.lastname = $('#lastname1').val();
    NewChildren.firstname = $('#firstname1').val();
    NewChildren.birthdate = $('#birthdate').val();
    NewChildren.bulk = $('#weightCo').val();
    NewChildren.bulkDate = $('#weightDateCo').val();
    NewChildren.gender = $('input[name=genderCo]:checked',"#gender").val();
    NewChildren.allergies = $('#allergies').val();  
    NewChildren.favMeal = $('#favoriteMeal').val();
    NewChildren.hatedMeal = $('#hatedMeal').val();
    NewChildren.startDate = $('#startDateCo').val();

    NewChildren.meds = [];
    var getTextArea = $('.posoCo');
    $('.medsCo').each(function(index){
        var meds ={
            id : null,
            label: null,
            posology: null
        },
        input = $(this).find("input")
        meds.id = input.val(),
        meds.label = input.attr('id'),
        
        meds.posology = $($(getTextArea)[index]).find('textarea')[0].value;
        NewChildren.meds.push(meds);
    });
   
    var childrenString = JSON.stringify(NewChildren);
$.ajax({
    url: "index.php",
    data: {data:childrenString,action:"addNewChild"},
    method: "POST",
        success: function(data){
            location.href = "index.php?action=memberView";
        },
        error: function(e){
            console.log(e.message);
        }
    });
})


var NewChildren2 = Children;

// GET INPUTS FROM UPDATE-CHILD-FORM
$('#submitChildren2').on('click',function(){
    NewChildren2.idChild = $('#idChildCoUp').val();
    NewChildren2.lastname = $('#lastname1Up').val();
    NewChildren2.firstname = $('#firstname1Up').val();
    NewChildren2.birthdate = $('#birthdateUp').val();
    NewChildren2.bulk = $('#weightUp').val();
    NewChildren2.bulkDate = $('#weightDateUp').val();
    NewChildren2.idAllergy = $('#idAllergyCoUp').val();
    NewChildren2.allergies = $('#allergiesUp').val();  
    NewChildren2.favMeal = $('#favoriteMealUp').val();
    NewChildren2.hatedMeal = $('#hatedMealUp').val();
    NewChildren2.startDate = $('#startDateCoUp').val();
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
            
            location.href = "index.php?action=memberView";
        },
        error: function(e){
            console.log(e.message);
        }
    });
})

// OBJECT WRITE STUFF
var writeStuff = {
    contentA: ""
}
// GET VALUE FROM TIPS-FORM
$('#entry').on('click',function(){
    writeStuff.contentA = $('#writeStuff').val();
    var writeString = JSON.stringify(writeStuff);
$.ajax({
    url: "admin.php",
    data: {data:writeString,action:"writeStuff"},
    method: "POST",
        success: function(data){          
            location.href = "admin.php?action=goToWriteStuff";
        },
        error: function(e){
            console.log(e.message);
        }
    });
})

// OBJECT FAMILY NAME
var familyName = {
    contentB: ""
}
// GET VALUE FROM MODO-FORM
$('#validNameModo').on('click',function(){
    familyName.contentB = $('#familyNameModo').val();
    var familyString = JSON.stringify(familyName);  
$.ajax({  
    url: "index.php",
    data: {data:familyString,action:"changeFamilyName"},
    method: "POST",
        success: function(data){          
            location.href = "index.php";
        },
        error: function(e){
            console.log(e.message);
        }
    });
})