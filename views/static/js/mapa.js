let mapa = document.getElementById('mapa');
let img1 = mapa.firstChild.nextSibling;
let img2 = mapa.firstChild.nextSibling.nextSibling.nextSibling;
let img3 = mapa.firstChild.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling;
let img4 = mapa.firstChild.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling;
let scale = 0.5; // Factor de escala inicial

img1.style.transform = `scale(${scale})`;
img2.style.transform = `scale(${scale})`;
img3.style.transform = `scale(${scale})`;
img4.style.transform = `scale(${scale})`;

document.addEventListener('DOMContentLoaded', () => {
    mapa = document.getElementById('mapa');
    img1 = mapa.firstChild.nextSibling;
    img2 = mapa.firstChild.nextSibling.nextSibling.nextSibling;
    img3 = mapa.firstChild.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling;
    img4 = mapa.firstChild.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling;
    
    mapa.addEventListener('wheel', (event) => {
        // Prevenir el desplazamiento de la página
        event.preventDefault();
        
        // Ajustar el factor de escala basado en la rueda del ratón
        if (event.deltaY < 0) {
            // Hacer zoom (acercar)
            if(scale < 4.5){
                scale += 0.1;
            }
        } else {
            // Hacer zoom (alejar)
            if(scale > 0.55){
                scale = Math.max(0.1, scale - 0.1);
            }
        }
            
        // Aplicar el nuevo factor de escala a la imagen
        img1.style.transform = `scale(${scale})`;
        img2.style.transform = `scale(${scale})`;
        img3.style.transform = `scale(${scale})`;
        img4.style.transform = `scale(${scale})`;
    });
});

function resetZoom(){
    const mapa = document.getElementById('mapa');
    img1 = mapa.firstChild.nextSibling;
    img2 = mapa.firstChild.nextSibling.nextSibling.nextSibling;
    img3 = mapa.firstChild.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling;
    img4 = mapa.firstChild.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling;
    img1.style.transform = `scale(1)`;
    img2.style.transform = `scale(1)`;
    img3.style.transform = `scale(1)`;
    img4.style.transform = `scale(1)`;
}
function desplegador(object){
    let inputDes = $('#destino')
    let navegador = $('#navegadorMapa')
    let destino = $(object).attr('id')

    $(inputDes).attr('value', destino)
    $(navegador).addClass('visible')
}

function atras(){
    let navegador = $('#navegadorMapa');
    if($(navegador).hasClass('visible')){
        $(navegador).removeClass('visible')
    } else {
        window.history.back()
    }
}