let imagenes=[];
let captions=[];

let dom=document.querySelector(".slider");
let caps=document.querySelector(".captions");
imagenes=dom.innerText.split(" ")



let index=0;
let min=0;
let max=imagenes.length-1;
let velocidad=5000;


main();

captions=getCaptions(caps.innerHTML);
captions.pop();
captions.shift();
console.log(captions);
setcap();

if(dom.hasAttribute("interval")){
   velocidad=parseInt(dom.getAttribute("interval"));
   
}

if(dom.getAttribute("autoSlide")!="disable") {
    
    let mv= setInterval(()=>{go()},velocidad );
    
}


 function back(){
    let image1= document.getElementById("img1");
    let image2= document.getElementById("img2");
     
    image2.setAttribute("src",imagenes[index]);
    index--;
    limits();

    image1.setAttribute("src",imagenes[index]);
    moverLeft();
    resaltar()
 }

 function go(){
    let image1= document.getElementById("img1");
    let image2= document.getElementById("img2");
    
    image1.setAttribute("src",imagenes[index]);  
    
    index++;
    limits();

    image2.setAttribute("src",imagenes[index]);
    moverRight();
    resaltar()

}

function limits(){
    if(index>max){index=min;}
    if(index<min){index=max;}
}

function resaltar(){

    let controls=document.getElementById("slider-controls");
    controls.innerHTML="";
    for(let i=0; i<=max; i++){
    controls.innerHTML+=`<span name="${i}">●</span>`;
    }
    let pos=document.querySelector("[name='"+index+"']");
    pos.innerHTML="⦿";
}


let scroll_Width= document.querySelector(".slider-box").scrollWidth;

function moverRight(){

    let box= document.querySelector(".slider-box");
    var c=0;

    function animate() {
        if (c >= scroll_Width) return; 
        c += 20; 
        box.scrollTo({
            top: 0,
            left: c});
        requestAnimationFrame(animate);
      }

    animate()
    setcap();
    

}

function moverLeft(){

    let box= document.querySelector(".slider-box");
    var c=600;

    function animate() {
        if (c <= 0) return; 
        c -= 20; 
        box.scrollTo({
            top: 0,
            left: c});
        requestAnimationFrame(animate);
      }

    animate()
    setcap();
    

}

function getCaptions(divHtml) {
 // Elimina las etiquetas <div> y </div> del HTML
 const contenidoLimpio = divHtml.replace(/<\/?div>/g, '');

 // Divide el contenido en líneas utilizando el salto de línea como separador
 const lineas = contenidoLimpio.split('\n').map(linea => linea.trim());

 // Filtra las líneas vacías y reemplaza con un espacio en blanco
 const lineasFiltradas = lineas.map(linea => (linea === '' ? ' ' : linea));

 return lineasFiltradas;
}

function setcap(){

    caps.style.opacity = 0;
    setTimeout(() => {
        caps.innerHTML=captions[index];
        caps.style.opacity = 1;
    }, 400);

    



}


function main(){

let slider= document.querySelector(".slider");

slider.innerHTML=`
<div style="width: 100%;height: 100%;">
<div class="slider-container">
<div  class="slider-item control" id="back" onclick="back()"> ⬅ </div>
<div class="slider-box" >
    
    <div class="boxes" style="height: 100%;width: 200%;display: flex;">   
        <div class="img-box" ><img id="img1" class="slider-item slider-image" src="${imagenes[index]}" data-index="1"></div>
        <div class="img-box" ><img id="img2" class="slider-item slider-image" src="${imagenes[index]}" data-index="1"></div>
    </div>    
    
</div>
<div  class="slider-item control" id="go" onclick="go()"> ➡ </div>
</div>
<div id="slider-controls"></div>
</div>  `;

resaltar();





}
