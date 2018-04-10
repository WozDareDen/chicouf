$(document).ready(function () { // on s'assure que le document est chargé


    var $mdp1 = $('#pass'),
        $mdp2 = $('#pass2'),
        $champ = $('.champ'),
        $mail = $('#mail');


    $champ.keyup(function () {// si la chaîne de caractères est inférieure ou égale à 1
        if ($(this).val().length <= 1) {
            $(this).css({ // on rend le champ rouge
                borderColor: 'red',
                color: 'red'
            });
        }

        else {
            $(this).css({ // si tout est bon, on le rend vert
                borderColor: 'green',
                color: 'green',
            });
        }
    });

    $mdp1.keyup(function (){
        if ($($mdp1)[0].value.match(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[\da-zA-Z]{8,16}$/)) {//verification conformitée du mot de passe
            console.log('true');
            document.getElementById('pop').style.display = 'none';
        }

        else{
            console.log('false');
            document.getElementById('pop').style.display = 'block';
            $(this).css({ // on rend le champ rouge
                borderColor: 'red',
                color: 'red'
            });
        }
    });

    $mdp2.keyup(function () {// si la confirmation est différente du mot de passe
        if ($(this).val() != $mdp1.val()) {
            $(this).css({ // on rend le champ rouge
                borderColor: 'red',
                color: 'red'
            });
        }
        else {// si tout est bon, on le rend vert
            $(this).css({
                borderColor: 'green',
                color: 'green'
            });
        }


    });
    
    $mail.keyup(function () { //
        if ($($mail)[0].value.match(/^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/)) { //verification conformitée du mail
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

