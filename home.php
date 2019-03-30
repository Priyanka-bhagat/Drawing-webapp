<?php
 
     session_start(); 
  

?>

<!DOCTYPE html>
 
 <html>
 <head>
     <meta charset="utf-8" />
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <title>Drawing Mode</title>
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" type="text/css" media="screen" href="drawstyles.css" />
     <style>
         #download{
            float:left;
   color: white;
   margin-right:10px;
   height:30px;
   padding:8px;
   background-color:transparent;
         }
         #imagefile{
            float:left;
   color: white;
   margin-right:10px;
   height:50px;
   padding:10px;
   margin-top: 60px;
   background-color:transparent;
         }
         #logout{
            float:left;
   color: white;
   margin-right:10px;
   height:30px;
   padding:8px;
   background-color:transparent;

         }
         #download:hover{
            cursor:pointer;
   background-color:white;
   color: black;

         }
         #logout:hover{
            cursor:pointer;
   background-color:white;
   color: black;

         }
         table{
             margin-top: 20px;
             
         }
         th{
             padding: 5px;
         }
         td{
             padding: 5px;
             

         }
        </style>
 </head>
 <body>
     <div style="margin-left: 40%; margin-right: 50%; width: 100%; color: white;  font-size: 30px; font-family: Arial;">
         Welcome, <?php echo $_SESSION['username'];
       ?> !
        
     </div >
     <div style="margin-left: 43%; margin-right: 50%; color: white; display:inline; ">
         <a href="view.php" style="color:red;" >View image files</a>
     </div>
        <div id="toolbar">
         <div id="colors">
             
         </div>
         <!-- Eraser 
 <div id="eraser" onclick="context.strokeStyle = 'black'; context.lineWidth = '20';"></div>-->
         <div id=rad>Thickness <span id="radval"> 10  </span>
             <div id="decrad" class="radcontrol"> -</div>
             <div id="incrad" class="radcontrol"> +</div>
 
         </div>
         <div id="logout" ><a href="logout.php" style="color: red">
             Logout</a></div>
             
         
         
         
         <a id="download" download="canvasimage.jpg" href="" onclick="download_img(this);">Download </a>
<script>
    download_img = function(el) {
  var image = canvas.toDataURL("image/jpg");
  el.href = image;
};

</script>
         <div id="save">Save</div>
         <div id="reset">Reset</div>
         <div id ="erase">Eraser</div>
 </div>
 
          <div id="blackboardPlaceholder"> 
                
             <canvas id="drawingcanvas" width=900 height=500>
                       your browser doesnt support canvas  
             </canvas>
             
          
   
                 
                    
           
         </div> 
 
 
 
 
 
 </body>
 
 <script src="jquery.js" type="text/javascript"></script>
 
 <script src="tryjs.js" type="text/javascript"></script> 
 
 
 </html>