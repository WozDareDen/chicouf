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