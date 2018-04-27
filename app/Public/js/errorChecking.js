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

// AUTOCOMPLETE
$('#myInput').autocomplete({
    source : function(req,reponse){ 
    $.ajax({
            url : 'index.php?action=ajaxMeds&search='+encodeURI(req.term), 
            type : 'GET',
            dataType : 'json', 
            success : function(donnee){
                reponse(donnee.map(function(d) {
                    return {label:d.title, value: d.title}
                }))  
            }
        });
    },
    delay:300
})

// CREATE BLOCKS FOR MEDS
var i = 0;
$('#addMeds').on('click',function(){
    i++;

    var m = $('<div class="form-group col-lg-12"><label for="meds">Médicament</label></div>');
    var m2 = $('<input type="search" />');
    $(m2).attr('id', "medsCo"+i);
    $(m2).attr('name', "medsCo"+i);
    $(m2).val($('#myInput').val());
   
    var f = $('<div class="form-group col-lg-12><label for="poso">Fréquences/prises</label></div>')
    var f2 = $('<br /><textarea rows="2" cols="30" ></textarea>');
    $(f2).attr('id', "posoCo"+i);
    $(f2).attr('name', "posoCo"+i);
    
    var d = $('<div class="form-group col-lg-12 "><label for="startDate">Date de début du traitement</label></div>')
    var d2 = $('<br /><input type="date" id="startDate" name="startDateCo" ><br />');
    $(d2).attr('id', "startDate"+i);
    $(d2).attr('name', "startDate"+i);

    $(m).append(m2);
    $('.lampost').before(m);
    $(f).append(f2);
    $('.lampost').before(f);
    $(d).append(d2);
    $('.lampost').before(d);

    $('#myInput').val("");
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
    allergies :"" 

}
var NewChildren = Children;




$('#submitChildren').on('click',function(){
    NewChildren.lastname = $('#lastname').val();
    NewChildren.firstname = $('#firstname').val();
    NewChildren.birthdate = $('#birthdate').val();
    NewChildren.gender = $('input[name=genderCo]:checked',"#gender").val();
    NewChildren.parent1 = $('#parent1').val();
    NewChildren.allergies = $('#allergies').val();  
    NewChildren.favMeal = $('#favoriteMeal').val();
    NewChildren.hatedMeal = $('#hatedMeal').val();
    NewChildren.parent2 = $('#parent2').val();

    var childrenString = JSON.stringify(NewChildren);
    console.log(childrenString);

$.ajax({
    url: "index.php",
    data: {data:childrenString,action:"addNewChild"},
    method: "POST",
    success: function(data){
        console.log('banane');
        return data;
    },
    error: function(e){
        console.log('baneeeane');
        console.log(e.message);
    }

    });



})