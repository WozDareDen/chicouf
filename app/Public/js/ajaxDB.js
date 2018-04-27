// INSERT MEMBERS IN DASHBOARD
$(document).ready(function(){
        $.ajax({
            url:'admin.php?action=ajaxTest',
            type: 'GET',
            datatype: 'json'
        }).done(function(bite){
            var container=$(".table .table_body");
            bite.forEach(function($members) {
                var templateRow = "<tr><td><span id='idUser'>"+$members['idMember']+"</span></td><td><span id='names'>"+$members['surname']+" "+$members['firstname']+"</span></td><td><span id='cities'>"+$members['city']+"</span></td><td><span id='regDate'>"+$members['registrationDate']+"</span></td></tr>"
                container.append(templateRow)
            })
        });
    });
