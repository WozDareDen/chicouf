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


// OBJECT WRITE STUFF
var writeStuff = {
  contentA: ""
}
// GET VALUE FROM TIPS-FORM
$('#entry').on('click',function(){
  writeStuff.contentA = $('#writeStuff').val();

  var writeString = JSON.stringify(writeStuff);
  console.log(writeStuff);
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



$('#getaway').click(function(){
$.ajax({
  url : 'index.php?action=getWeight'+encodeURI(req.term), 
  type : 'GET',
  dataType : 'json', 
  success : function(donnee){
      current_list_data = donnee.map(function(d) {
          return {value: d.bulk}
      });
      reponse(current_list_data);
  }    
});

});









/**
 * Settings
 */
var xLegendValues = ["01/18", "02/18", "03/18", "04/18", "05/18", "06/18", "07/18", "08/18", "09/18", "10/18", "11/18", "12/18"];
var elementHeight = 300;
var canvasUpperCap = 45;
var canvas = document.getElementById("graphCanvas");
var context = canvas.getContext("2d");
var xBaseDistance = 10;
var yBaseDistance = 6;
var scaleFactorX = 7;
var scaleFactorY = 7;
var xStartShowingFromPosition = 0;

/**
 * Draw single graph line on canvas
 */
function drawGraph(data, lineColor, unit, xDataStartPosition) {
  if (!lineColor) {
    var lineColor = "black";
  }
  if (!unit) {
    var unit = "";
  }
	
	if (!xDataStartPosition)
		xDataStartPosition = 0;

	var xPosition = 0;
	
  // Render the path/graph
  context.beginPath();
	
  for (i = xDataStartPosition; i < data.length; i++) {
    // Current drawing position
    var yPositionPrev = (canvasUpperCap - data[i - 1]) * scaleFactorY; // Reverse counting direction (Prev item)
    var yPositionCurr = (canvasUpperCap - data[i]) * scaleFactorY; // Reverse counting direction (Current item)

    // Render the line
    context.moveTo(xPosition * scaleFactorX, yPositionPrev);
    xPosition = xPosition + xBaseDistance;
    context.lineTo(xPosition * scaleFactorX, yPositionCurr);
		
		// Render the interactive info tooltip overlay
		if (data[i] < canvasUpperCap) {
			renderInteractiveOverlay(
				(xPosition + xBaseDistance) * scaleFactorX,
				yPositionCurr,
				lineColor,
				data[i],
				unit
			);			
		}
  }
  context.lineWidth = 2;
  context.strokeStyle = lineColor;
  context.lineCap = "round";
  context.lineJoin = "round";
  context.fillStyle = lineColor;
  context.stroke();

  // End-point text
  var textPos = canvasUpperCap - data[data.length - 1];
  var textUnit = data[data.length - 1] + " " + unit;
	context.font = "100 8pt arial";
  context.fillText(
    textUnit,
    xPosition * scaleFactorX + 40,
    textPos * scaleFactorY + 5
  );
}

/**
 * Draws Y-axis legend (left-side)
 */
function drawLegendY(Unit) {
  if (!Unit) {
    var Unit = "";
    var xPos = 30;
  } else {
    var xPos = 45;
  }

  context.font = "100 9pt arial";
  context.fillStyle = "grey";
  context.textAlign = "right";

  for (i = yBaseDistance; i < canvasUpperCap; i = i + yBaseDistance) {
    var yPos = i * scaleFactorY;
    var textValue = (canvasUpperCap - i) + " " + Unit; // Reverse counting direction & add unit
    context.fillText(textValue, xPos, yPos+3);
  }
}

/**
 * Draws X-axis legend (bottom)
 */
function drawLegendX(xPosition) {
	if (!xPosition)
		xPosition = 0;
	
  context.font = "100 7pt arial";
  context.fillStyle = "grey";
	var x = 0;

  for (i = xPosition; i < xLegendValues.length; i ++) {
		x = x + xBaseDistance; // Increase X distance every iteration
		console.log(canvasUpperCap);
    var xPos = (x * scaleFactorX)-10;
		var yPos = elementHeight-4;
    var textVal = xLegendValues[i]
    context.fillText(textVal, xPos, yPos);
  }
}

/**
 * Draw the interactive overlay
 */
function renderInteractiveOverlay(posX, posY, color, title, unit) {
  posX = posX - (xBaseDistance*scaleFactorX)-2;
  posY = posY-2;
  var parent = document.querySelector("#graphCanvasOverlay");
	var HTML = "<div class=\"item\" style=\"top:" + posY + "px; left:" + posX + "px; background-color:" + color + ";\" title=\"" + title + " " + unit + "\"></div>";
  parent.innerHTML += HTML;
}

/**
 * Data
 */




var DataSet1 = [5, 12, 13, 14, 16, 14, 17];
var DataSet2 = [10, 8, 9, 11, 11.5, 13, 14, 16, 17];

var DataSet4 = [6, 8, 7, 8, 10, 12];

/**
 * Init
 */
window.onload = function() {
	drawLegendX(xStartShowingFromPosition);
  drawLegendY("kg");
	
  drawGraph(DataSet1, "red", "kg", xStartShowingFromPosition);
  drawGraph(DataSet2, "orange", "kg", xStartShowingFromPosition);

  drawGraph(DataSet4, "blue", "kg", xStartShowingFromPosition);
};
