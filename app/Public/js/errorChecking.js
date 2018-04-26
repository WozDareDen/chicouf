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
// $(".photoChild").on("click",function(e){
//     $(e.target).css("transform","rotate(1turn)");
//     console.log(e.target);
//  });
 
// var divs = $('.social');
// $(window).scroll(function(){
//    var percent = $(document).scrollTop() / ($(document).height() - $(window).height());
//    divs.css('opacity', 1 - percent);
// });








$('#myInput').autocomplete({
    source : function(req,reponse){ // la fonction anonyme permet de maintenir une requête AJAX directement dans le plugin
    $.ajax({
            url : 'index.php?action=ajaxMeds&search='+encodeURI(req.term), // on appelle le script JSON
            type : 'GET',
            dataType : 'json', // on spécifie bien que le type de données est en JSON

            success : function(donnee){
                console.log(donnee);
                reponse(donnee.map(function(d) {
                    return {label:d.title, value: d.title}
                })) 
                // on se prépare à renvoyer les données réceptionnées grâce à l'évènement de succès 
            }
        });
    },
    delay:300
})

$('#addMeds').on('click',function(){
    $('.posology').css("display","block");
    $('#meds1').val($('#myInput').val())
})

$('#addMeds').on('click',function(){
    $('.posology2').val($('#myInput').val())
})