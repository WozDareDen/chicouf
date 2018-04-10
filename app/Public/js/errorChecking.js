$(document).ready(function () { // on s'assure que le document est chargé


    var $mdp1 = $('#pass'),
        $mdp2 = $('#pass2'),
        $champ = $('.champ');


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
                color: 'green'
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

    /*var password = document.getElementById('pass').value;
    if (/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[\da-zA-Z]{8,16}$/.test(password)){
        document.getElementById('pop').style.display  ='block';
    }else {

    }*/

    var expr = document.getElementById('pass').textContent;

    var r1 = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[\da-zA-Z]{8,16}$/;

    var rest = r1.test(expr);

    var resultat = document.getElementById('pop');

    resultat.innerHTML = console.log('resulatat' + rest );

});

