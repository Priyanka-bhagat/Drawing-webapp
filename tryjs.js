
var canvas = document.getElementById('drawingcanvas');
if(!canvas)
alert("canvas element was not found");
var context = canvas.getContext('2d');
var dragging = false;
var radius=5;
context.lineWidth=radius*2;
var putpoint = function(e){
    if (dragging){
        context.lineTo(e.offsetX, e.offsetY);
        context.stroke();
    context.beginPath();
     context.arc(e.offsetX, e.offsetY, radius, 0, Math.PI*2);
    context.fill();
    context.beginPath();
        context.moveTo(e.offsetX, e.offsetY);
    }
}
var engage =function(e)
{
    dragging=true;
    putpoint(e)
}

var disengage=function()
{
    dragging=false;
    context.beginPath();
}
canvas.addEventListener('mousedown', engage);
canvas.addEventListener('mousemove',putpoint);
canvas.addEventListener('mouseup',disengage);

//colors
var colors=['black','grey','red','orange','yellow','green','blue','indigo','violet'];



for(var i =0, n=colors.length;i<n;i++)
{
    var swatch=document.createElement('div');
    swatch.className='swatch';
    swatch.style.backgroundColor= colors[i];
    swatch.addEventListener('click',setSwatch);
    document.getElementById("colors").appendChild(swatch);

}
function setColor(color)
{
    context.fillStyle=color;
    context.strokeStyle=color;
    var active= document.getElementsByClassName('active')[0];
    if(active)
    {
        active.className='swatch';
    }
}

function setSwatch(e)
{
    var swatch=e.target;
    setColor(swatch.style.backgroundColor);
    swatch.className+= ' active';
}


//save
var saveButton=document.getElementById('save');
saveButton.addEventListener('click',saveImage);

function saveImage()
{

   var dataUrl = canvas.toDataURL('image/png');
   

    //alert(dataUrl);
window.open(dataUrl, '_blank','location=0, menubar=0');

  $.ajax({
    type: "POST",
    url: "http://localhost/try.php",
    data: {image: dataUrl}  
})
  .done(function(respond){console.log("done: "+respond);})
  .fail(function(respond){console.log("fail");})
  .always(function(respond){console.log("always");});
}


//reset
var resetButton= document.getElementById("reset");
resetButton.addEventListener('click',rst);
function rst()
{
    location.reload();
}

//Thickness
var setRadius=function(newRadius){
    if(newRadius<minRad)
    newRadius = minRad;
    else if(newRadius>maxRad)
    newRadius = maxRad;
    radius = newRadius;
    context.lineWidth = radius*2;
    radSpan.innerHTML=radius;
}
var minRad=0.5,
maxRad= 100,
defaultRad=20,
interval=5,
radSpan = document.getElementById('radval'),
decRad=document.getElementById('decrad'),
incRad=document.getElementById('incrad');

decRad.addEventListener('click',function(){
    setRadius(radius-interval)
});
incRad.addEventListener('click',function(){
    setRadius(radius+interval)
});

setRadius(defaultRad);

//Erase
var eraseButton=document.getElementById('erase');
eraseButton.addEventListener('click',eraseImage);
function eraseImage()
{
    
    context.fillStyle='white';
    context.strokeStyle='white';
}

//view
