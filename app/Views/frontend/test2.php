<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta http-equiv="X-UA-compatible" content="IE=edge" />
        <meta name="description" content="Chicouf, service de gestion de contenu familial" />
        <meta name="keywords" content="Chicouf, famille, gestion" />
<!--******************Meta Facebook**************-->        
        <meta property="og:title" content="Chicouf, service de gestion de contenu familial" />
        <meta property="og:url" content="" />
        <meta property="og:site_name" content="chicouf.fr" />
        <meta property="og:description" content="Chicouf, service de gestion de contenu familial" />
        <meta property="og:image" content="public/images/charlesfav.png" />
<!--******************Meta Twitter**************-->             
        <meta name="twitter:card" content="summary" />
        <meta name="twitter:title" content="Chicouf, service de gestion de contenu familial" />
        <meta name="twitter:url" content="" />
        <meta name="twitter:description" content="Chicouf, service de gestion de contenu familial" />
        <meta name="twitter:image" content="app/Public/uploads/logo.png" />
        <title>test2</title>
        <link rel="icon" type="image/png" href="app/Public/uploads/logo.png" />
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    </head> 
    <body>


        
        <div id="container">
        <div class=" row">
<h4 style="position:absolute;color:white" id="getaway">Courbes de poids de vos enfants</h4>
<div class="col-sm-6" id="graphCanvasOverlay"></div>
<canvas id="graphCanvas" width="800" height="400">
	Your browser does not support the HTML5 canvas tag.
</canvas>
        
        </div>
        
        
        
        
        
        
        
        
        
        </div>





        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="../../../app/Public/js/jquery-3.3.1.js"></script>
        <script src="../../../app/Public/js/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
        <script src="../../../app/Public/js/test.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js" integrity="sha384-feJI7QwhOS+hwpX2zkaeJQjeiwlhOP+SdQDqhgvvo1DsjtiSQByFdThsxO669S2D" crossorigin="anonymous"></script>







        <style>

body {
  background: black;
  margin: 0 auto;
	font-family: "Arial", sans-serif;
	padding: 0 20px;
}

#graphCanvas {
  border:1px solid #222;
  background: #111;
  // max-width: 400px;
  height: 400px;
  width: 800px;
  width: auto;
}

#graphCanvasOverlay {
  position: relative;
}

.item {
  position: absolute;
  border-radius: 3px;
  height: 6px;
  width: 6px;
  background: white;
  transition: all 0.3s;
  cursor: pointer;
}  
.item:hover {
    transform: scale(3);
    box-shadow: 0px 0px 10px 4px rgba(0,0,0,0.5);
		color: black;
		z-index: 100;
  }



    </style>









    </body>
    


</html>

