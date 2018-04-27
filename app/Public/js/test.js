var i = 0;
$('#addMedsTest').on('click',function(){
    i++;

    var m = $('<div class="form-group col-lg-12"><label for="meds">Médicament</label></div>');
    var m2 = $('<input type="search" />');
    $(m2).attr('id',   "medsCo"+i);
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
})

