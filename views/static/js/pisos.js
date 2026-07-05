document.addEventListener('DOMContentLoaded', () => {

    const pisos = document.querySelectorAll('.piso');

    const mapaImagen = document.getElementById('mapa-imagen');

    pisos.forEach(piso => {
        piso.addEventListener('click', () => {

            const nuevaImagen = piso.getAttribute('dataImage');
            mapaImagen.src = nuevaImagen;
        });
    });
});

function cambiarPiso(num) {
    let ruta1 = $('#ruta1')
    let imagenMapa = $('#mapa-imagen')
    const map = $('#map')
    const banito = $('#banio')
    const escalerita = $('#escalera');
    if (num == 0) {
        $(map).html(`<area shape="rect" coords="340,30,611,148" id="PB Escenario" onclick="desplegador(this)">
       <area shape="rect" coords="1340,140,1400,240" id="PB Baño Mujeres(alumnos)" onclick="desplegador(this)">
       <area shape="rect" coords="1350,248,1401,333" id="PB Baño Hombres(alumnos)" onclick="desplegador(this)">
       <area shape="rect" coords="709,28,819,152" id="PB cuarto cooperadora" onclick="desplegador(this)">
       <area shape="rect" coords="611,28,706,147" id="pb Cuarto Ed fisica" onclick="desplegador(this)">
       <area shape="rect" coords="1350,333,1512,403" id="PB Fotocopiadora" onclick="desplegador(this)">
       <area shape="rect" coords="1063,396,1187,527" id="PB Cocina" onclick="desplegador(this)">
       <area shape="rect" coords="1063,526,1187,700" id="PB Sala de profesores" onclick="desplegador(this)">
       <area shape="rect" coords="1063,702,1124,769" id="PB Baño de profesoras" onclick="desplegador(this)">
       <area shape="rect" coords="1129,700,1182,735" id="PB Baño de profesores" onclick="desplegador(this)">
       <area shape="rect" coords="1421,884,1472,990" id="PB Preseptoria pb" onclick="desplegador(this)">
       <area shape="rect" coords="1399,1049,1510,1291" id="PB Aula(Pecera)" onclick="desplegador(this)">
       <area shape="rect" coords="1290,1050,1391,1291" id="pb Secretaria" onclick="desplegador(this)">
       <area shape="rect" coords="116,148,821,735" id="PB Gimnasio" onclick="desplegador(this)">
       <area shape="rect" coords="1170,1050,1231,1117" id="PB Porteria" onclick="desplegador(this)">
       <area shape="rect" coords="812,1050,1106,1277" id="PB Teatro" onclick="desplegador(this)">
       <area shape="rect" coords="14,964,435,1267" id="PB Biblioteca" onclick="desplegador(this)">
       <area shape="rect" coords="1065,768,1167,953" id="PB Aula 1" onclick="desplegador(this)">
       <area shape="rect" coords="616,1052,800,1267" id="PB Aula 2" onclick="desplegador(this)">
       <area shape="rect" coords="451,1050,607,1267" id="PB Aula 3" onclick="desplegador(this)">`)

        if ($(imagenMapa).hasClass('p1')) {
            $(imagenMapa).removeClass('p1')
            $(ruta1).removeClass('p1')
            $(escalerita).removeClass('p1')
            $(banito).removeClass('p1')
        } else if ($(imagenMapa).hasClass('p2')) {
            $(imagenMapa).removeClass('p2')
            $(ruta1).removeClass('p2')
            $(escalerita).removeClass('p2')
            $(banito).removeClass('p2')
        }

        $(imagenMapa).addClass('pb')
        $(ruta1).addClass('pb')
        $(escalerita).addClass('pb')
        $(banito).addClass('pb')

        $(banito).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/baniosPlantaBaja.png')
        $(escalerita).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/escalerasPlantaBaja.png')

    } else if (num == 1) {
        $(map).html(`<area shape="rect" coords="1,1,146,165"     id="P1 Aula 1" onclick="desplegador(this)">
        <area shape="rect" coords="155,1,290,165"   id="P1 Aula 2" onclick="desplegador(this)">
        <area shape="rect" coords="301,1,437,165"   id="P1 Sala de informatica 5" onclick="desplegador(this)">
        <area shape="rect" coords="85,260,188,305"  id="P1 Preceptoria 1" onclick="desplegador(this)">
        <area shape="rect" coords="198,260,297,433" id="P1 Sala de informatica 1" onclick="desplegador(this)">
        <area shape="rect" coords="309,265,403,408" id="P1 Sala de informatica 3" onclick="desplegador(this)">
        <area shape="rect" coords="311,417,403,540" id="P1 Sala de informatica 4" onclick="desplegador(this)">
        <area shape="rect" coords="191,438,300,544" id="P1 Sala de Robotica" onclick="desplegador(this)">
        <area shape="rect" coords="197,554,341,691" id="P1 Sala de informatica 2" onclick="desplegador(this)">
        <area shape="rect" coords="194,702,328,763" id="P1 Radio" onclick="desplegador(this)">
        <area shape="rect" coords="411,260,444,334" id="P1 Preseptoria 2" onclick="desplegador(this)">
        <area shape="rect" coords="450,87,626,165" id="P1 Sala de aceleracion" onclick="desplegador(this)">
        <area shape="rect" coords="636,86,766,250" id="P1 Aula 3" onclick="desplegador(this)">
        <area shape="rect" coords="778,81,905,250" id="P1 Aula 4" onclick="desplegador(this)">
        <area shape="rect" coords="918,84,1050,250" id="P1 Aula 5" onclick="desplegador(this)">
        <area shape="rect" coords="1064,85,1192,256" id="P1 Aula 6" onclick="desplegador(this)">
        <area shape="rect" coords="1203,85,1333,256" id="P1 Aula 7" onclick="desplegador(this)">
        <area shape="rect" coords="1254,265,1336,333" id="P1 Ayundatia" onclick="desplegador(this)">`)

        if ($(imagenMapa).hasClass('pb')) {
            $(imagenMapa).removeClass('pb')
            $(ruta1).removeClass('pb')
            $(escalerita).removeClass('pb')
            $(banito).removeClass('pb')
        } else if ($(imagenMapa).hasClass('p2')) {
            $(imagenMapa).removeClass('p2')
            $(ruta1).removeClass('p2')
            $(escalerita).removeClass('p2')
            $(banito).removeClass('p2')
        }

        $(imagenMapa).addClass('p1')
        $(ruta1).addClass('p1')
        $(escalerita).addClass('p1')
        $(banito).addClass('p1')

        $(banito).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/PrimerPiso.jpg')
        $(escalerita).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/escalerasPrimerPiso.png')

    } else if (num == 2) {
        $(map).html(`<area shape="rect" coords="15,15,266,247" id="P2 Aula 1" onclick="desplegador(this)">
        <area shape="rect" coords="277,15,526,247" id="P2 Aula 2" onclick="desplegador(this)">
        <area shape="rect" coords="545,15,797,247" id="P2 Aula 3" onclick="desplegador(this)">
        <area shape="rect" coords="811,70,1096,292" id="P2 Aula 4" onclick="desplegador(this)">
        <area shape="rect" coords="1111,68,1403,300" id="P2 Aula 5" onclick="desplegador(this)">
        <area shape="rect" coords="1417,76,1650,370" id="P2 Aula 6" onclick="desplegador(this)">
        <area shape="rect" coords="1664,76,1902,370" id="P2 Aula 7" onclick="desplegador(this)">
        <area shape="rect" coords="1916,76,2147,370" id="P2 Aula 8" onclick="desplegador(this)">
        <area shape="rect" coords="2170,76,2404,370" id="P2 Aula 9" onclick="desplegador(this)">
        <area shape="rect" coords="610,394,846,488" id="P2 Preseptoria 1" onclick="desplegador(this)">
        <area shape="rect" coords="145,394,378,456" id="P2 Preseptoria 2" onclick="desplegador(this)">
        <area shape="rect" coords="393,351,600,866" id="P2 Terraza" onclick="desplegador(this)">
        <area shape="rect" coords="480,873,600,1054" id="P2 Sala de musica" onclick="desplegador(this)">`)

        if ($(imagenMapa).hasClass('p1')) {
            $(imagenMapa).removeClass('p1')
            $(ruta1).removeClass('p1')
            $(escalerita).removeClass('p1')
            $(banito).removeClass('p1')
        } else if ($(imagenMapa).hasClass('pb')) {
            $(imagenMapa).removeClass('pb')
            $(ruta1).removeClass('pb')
            $(escalerita).removeClass('pb')
            $(banito).removeClass('pb')
        }

        $(imagenMapa).addClass('p2')
        $(ruta1).addClass('p2')
        $(escalerita).addClass('p2')
        $(banito).addClass('p2')

        $(banito).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/SegundoPiso.jpg')
        $(escalerita).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/escalerasSegundoPiso.png')

    }
}

function banitos() {
    let banito = $('#banio')

    $(banito).toggle()
}

function escaleritos() {
    let banito = $('#escalera')

    $(banito).toggle()
}

function ruta() {
    let banito = $('#banio')
    let escalerita = $('#escalera');
    let ruta1 = $('#ruta1')
    let navegador = $('#navegadorMapa')
    let imagenMapa = $('#mapa-imagen')
    let btnSiguiente = $('#btnSig')
    let destino = $('#destino').attr('value')
    let inicio = $('#input-ubicacion').val()
    if (destino == 'PB Gimnasio' && inicio == 'PB Entrada') {
        $(navegador).removeClass('visible')
        $(imagenMapa).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/PlantaBaja.jpg')
        $(ruta1).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/rutaEntradaGimnasio.png')

        $(ruta1).toggle()
        $(btnSiguiente).toggle()
        $(btnSiguiente).attr('onclick', 'llegue()')
        $(btnSiguiente).text('YA LLEGUE')
    } else if (destino == 'P1 Sala de informatica 5' && inicio == 'PB Teatro') {
        $(navegador).removeClass('visible')
        $(imagenMapa).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/PlantaBaja.jpg')
        $(ruta1).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/rutaTeatroSalaCinco1.png')

        $(ruta1).toggle()
        $(btnSiguiente).toggle()
        $(imagenMapa).removeClass('p1')
        $(ruta1).removeClass('p1')
        $(escalerita).removeClass('p1')
        $(banito).removeClass('p1')
        $(imagenMapa).addClass('pb')
        $(ruta1).addClass('pb')
        $(escalerita).addClass('pb')
        $(banito).addClass('pb')
    } else if (destino == 'P2 Aula 5' && inicio == 'PB Teatro') {
        $(navegador).removeClass('visible')
        $(imagenMapa).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/PlantaBaja.jpg')
        $(ruta1).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/rutaTeatroSalaCinco1.png')

        $(ruta1).toggle()
        $(btnSiguiente).toggle()
        $(imagenMapa).removeClass('p2')
        $(ruta1).removeClass('p2')
        $(escalerita).removeClass('p2')
        $(banito).removeClass('p2')
        $(imagenMapa).addClass('pb')
        $(ruta1).addClass('pb')
        $(escalerita).addClass('pb')
        $(banito).addClass('pb')
    }
    else if (destino == 'PB Baño Hombres(alumnos)' && inicio == 'PB Entrada') {
        $(navegador).removeClass('visible')
        $(imagenMapa).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/PlantaBaja.jpg')
        $(ruta1).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/rutaEntradaBaniosAlumnos.png')
        $(ruta1).toggle()
        $(btnSiguiente).toggle()
        $(btnSiguiente).attr('onclick', 'llegue()')
        $(btnSiguiente).text('YA LLEGUE')
    } else if (destino == 'PB Escenario' && inicio == 'PB Entrada') {
        $(navegador).removeClass('visible')
        $(imagenMapa).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/PlantaBaja.jpg')
        $(ruta1).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/rutaEntradaEscenario.png')
        $(ruta1).toggle()
        $(btnSiguiente).toggle()
        $(btnSiguiente).attr('onclick', 'llegue()')
        $(btnSiguiente).text('YA LLEGUE')
    } else if (destino == 'PB Secretaria' && inicio == 'PB Entrada') {
        $(navegador).removeClass('visible')
        $(imagenMapa).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/PlantaBaja.jpg')
        $(ruta1).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/rutaEntradaSecretaria.png')
        $(ruta1).toggle()
        $(btnSiguiente).toggle()
        $(btnSiguiente).attr('onclick', 'llegue()')
        $(btnSiguiente).text('YA LLEGUE')
    }
    else if (destino == 'PB Baño Mujeres(alumnos)' && inicio == 'PB Entrada') {
        $(navegador).removeClass('visible')
        $(imagenMapa).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/PlantaBaja.jpg')
        $(ruta1).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/rutaEntradaBanios.png')
        $(ruta1).toggle()
        $(btnSiguiente).toggle()
        $(btnSiguiente).attr('onclick', 'llegue()')
        $(btnSiguiente).text('YA LLEGUE')
    }
    else if (destino == 'PB Baño de profesores' && inicio == 'PB Entrada') {
        $(navegador).removeClass('visible')
        $(imagenMapa).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/PlantaBaja.jpg')
        $(ruta1).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/rutaEntradaBaniosProfes.png')
        $(ruta1).toggle()
        $(btnSiguiente).toggle()
        $(btnSiguiente).attr('onclick', 'llegue()')
        $(btnSiguiente).text('YA LLEGUE')
    }
    else if (destino == 'PB Baño de profesoras' && inicio == 'PB Entrada') {
        $(navegador).removeClass('visible')
        $(imagenMapa).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/PlantaBaja.jpg')
        $(ruta1).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/rutaEntradaBaniosProfes.png')
        $(ruta1).toggle()
        $(btnSiguiente).toggle()
        $(btnSiguiente).attr('onclick', 'llegue()')
        $(btnSiguiente).text('YA LLEGUE')
    } else if (destino == 'PB Biblioteca' && inicio == 'PB Entrada') {
        $(navegador).removeClass('visible')
        $(imagenMapa).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/PlantaBaja.jpg')
        $(ruta1).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/rutaEntradaBiblioteca.png')
        $(ruta1).toggle()
        $(btnSiguiente).toggle()
        $(btnSiguiente).attr('onclick', 'llegue()')
        $(btnSiguiente).text('YA LLEGUE')
    } else if (destino == 'PB Fotocopiadora' && inicio == 'PB Entrada') {
        $(navegador).removeClass('visible')
        $(imagenMapa).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/PlantaBaja.jpg')
        $(ruta1).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/rutaEntradaFotocopiadora.png')
        $(ruta1).toggle()
        $(btnSiguiente).toggle()
        $(btnSiguiente).attr('onclick', 'llegue()')
        $(btnSiguiente).text('YA LLEGUE')
    } else if (destino == 'P1 Sala de informatica 5' && inicio == 'PB Entrada') {
        $(navegador).removeClass('visible')
        $(imagenMapa).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/PlantaBaja.jpg')
        $(ruta1).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/rutaEntradaEscaleraPrincipal.png')
        $(ruta1).toggle()
        $(btnSiguiente).toggle()
        $(imagenMapa).removeClass('p1')
        $(ruta1).removeClass('p1')
        $(escalerita).removeClass('p1')
        $(banito).removeClass('p1')
        $(imagenMapa).addClass('pb')
        $(ruta1).addClass('pb')
        $(escalerita).addClass('pb')
        $(banito).addClass('pb')
    } else if (destino == 'P1 Sala de informatica 4' && inicio == 'PB Entrada') {
        $(navegador).removeClass('visible')
        $(imagenMapa).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/PlantaBaja.jpg')
        $(ruta1).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/rutaEntradaEscaleraInfo.png')
        $(ruta1).toggle()
        $(btnSiguiente).toggle()
        $(imagenMapa).removeClass('p1')
        $(ruta1).removeClass('p1')
        $(escalerita).removeClass('p1')
        $(banito).removeClass('p1')
        $(imagenMapa).addClass('pb')
        $(ruta1).addClass('pb')
        $(escalerita).addClass('pb')
        $(banito).addClass('pb')
    } else if (destino == 'P1 Sala de informatica 3' && inicio == 'PB Entrada') {
        $(navegador).removeClass('visible')
        $(imagenMapa).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/PlantaBaja.jpg')
        $(ruta1).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/rutaEntradaEscaleraPrincipal.png')
        $(ruta1).toggle()
        $(btnSiguiente).toggle()
        $(imagenMapa).removeClass('p1')
        $(ruta1).removeClass('p1')
        $(escalerita).removeClass('p1')
        $(banito).removeClass('p1')
        $(imagenMapa).addClass('pb')
        $(ruta1).addClass('pb')
        $(escalerita).addClass('pb')
        $(banito).addClass('pb')
    } else if (destino == 'P1 Sala de informatica 2' && inicio == 'PB Entrada') {
        $(navegador).removeClass('visible')
        $(imagenMapa).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/PlantaBaja.jpg')
        $(ruta1).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/rutaEntradaEscaleraInfo.png')
        $(ruta1).toggle()
        $(btnSiguiente).toggle()
        $(imagenMapa).removeClass('p1')
        $(ruta1).removeClass('p1')
        $(escalerita).removeClass('p1')
        $(banito).removeClass('p1')
        $(imagenMapa).addClass('pb')
        $(ruta1).addClass('pb')
        $(escalerita).addClass('pb')
        $(banito).addClass('pb')
    } else if (destino == 'P1 Sala de informatica 1' && inicio == 'PB Entrada') {
        $(navegador).removeClass('visible')
        $(imagenMapa).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/PlantaBaja.jpg')
        $(ruta1).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/rutaEntradaEscaleraPrincipal.png')
        $(ruta1).toggle()
        $(btnSiguiente).toggle()
        $(imagenMapa).removeClass('p1')
        $(ruta1).removeClass('p1')
        $(escalerita).removeClass('p1')
        $(banito).removeClass('p1')
        $(imagenMapa).addClass('pb')
        $(ruta1).addClass('pb')
        $(escalerita).addClass('pb')
        $(banito).addClass('pb')
    }
    else if (destino == 'PB Aula(Pecera)' && inicio == 'PB Entrada') {
        $(navegador).removeClass('visible')
        $(imagenMapa).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/PlantaBaja.jpg')
        $(ruta1).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/rutaEntradaPecera.png')
        $(ruta1).toggle()
        $(btnSiguiente).toggle()
        $(btnSiguiente).attr('onclick', 'llegue()')
        $(btnSiguiente).text('YA LLEGUE')
    }
    else if (destino == 'PB Cocina' && inicio == 'PB Entrada') {
        $(navegador).removeClass('visible')
        $(imagenMapa).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/PlantaBaja.jpg')
        $(ruta1).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/rutaEntradaCocina.png')
        $(ruta1).toggle()
        $(btnSiguiente).toggle()
        $(btnSiguiente).attr('onclick', 'llegue()')
        $(btnSiguiente).text('YA LLEGUE')
    }
    else if (destino == 'PB Aula 1' && inicio == 'PB Entrada') {
        $(navegador).removeClass('visible')
        $(imagenMapa).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/PlantaBaja.jpg')
        $(ruta1).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/rutaEntradaAula3PB.png')
        $(ruta1).toggle()
        console.log(destino)
        $(btnSiguiente).toggle()
        $(btnSiguiente).attr('onclick', 'llegue()')
        $(btnSiguiente).text('YA LLEGUE')
    }
    else if (destino == 'PB Aula 2' && inicio == 'PB Entrada') {
        $(navegador).removeClass('visible')
        $(imagenMapa).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/PlantaBaja.jpg')
        $(ruta1).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/rutaEntradaAula1PB.png')
        $(ruta1).toggle()
        console.log(destino)
        $(btnSiguiente).toggle()
        $(btnSiguiente).attr('onclick', 'llegue()')
        $(btnSiguiente).text('YA LLEGUE')
    }
    else if (destino == 'PB Aula 3' && inicio == 'PB Entrada') {
        $(navegador).removeClass('visible')
        $(imagenMapa).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/PlantaBaja.jpg')
        $(ruta1).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/rutaEntradaAula2PB.png')
        $(ruta1).toggle()
        console.log(destino)
        $(btnSiguiente).toggle()
        $(btnSiguiente).attr('onclick', 'llegue()')
        $(btnSiguiente).text('YA LLEGUE')
    }
    else if (destino == 'PB Teatro' && inicio == 'PB Entrada') {
        $(navegador).removeClass('visible')
        $(imagenMapa).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/PlantaBaja.jpg')
        $(ruta1).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/rutaEntradaTeatro.png')
        $(ruta1).toggle()
        $(btnSiguiente).toggle()
        $(btnSiguiente).attr('onclick', 'llegue()')
        $(btnSiguiente).text('YA LLEGUE')
    } else if (destino == 'PB Preseptoria pb' && inicio == 'PB Entrada') {
        $(navegador).removeClass('visible')
        $(imagenMapa).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/PlantaBaja.jpg')
        $(ruta1).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/rutaEntradaBanios.png')
        $(ruta1).toggle()
        $(btnSiguiente).toggle()
        $(btnSiguiente).attr('onclick', 'llegue()')
        $(btnSiguiente).text('YA LLEGUE')
    } else if (destino == 'PB Sala de profesores' && inicio == 'PB Entrada') {
        $(navegador).removeClass('visible')
        $(imagenMapa).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/PlantaBaja.jpg')
        $(ruta1).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/rutaEntradaBanios.png')
        $(ruta1).toggle()
        $(btnSiguiente).toggle()
        $(btnSiguiente).attr('onclick', 'llegue()')
        $(btnSiguiente).text('YA LLEGUE')
    }
    else if (destino == 'P1 Aula 1' && inicio == 'PB Entrada') {
        $(navegador).removeClass('visible')
        $(imagenMapa).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/PlantaBaja.jpg')
        $(ruta1).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/rutaEntradaEscaleraPrincipal.png')
        $(ruta1).toggle()
        $(btnSiguiente).toggle()
        $(imagenMapa).removeClass('p1')
        $(ruta1).removeClass('p1')
        $(escalerita).removeClass('p1')
        $(banito).removeClass('p1')
        $(imagenMapa).addClass('pb')
        $(ruta1).addClass('pb')
        $(escalerita).addClass('pb')
        $(banito).addClass('pb')
    }
    else if (destino == 'P1 Aula 2' && inicio == 'PB Entrada') {
        $(navegador).removeClass('visible')
        $(imagenMapa).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/PlantaBaja.jpg')
        $(ruta1).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/rutaEntradaEscalerra.png')
        $(ruta1).toggle()
        $(btnSiguiente).toggle()
        $(imagenMapa).removeClass('p1')
        $(ruta1).removeClass('p1')
        $(escalerita).removeClass('p1')
        $(banito).removeClass('p1')
        $(imagenMapa).addClass('pb')
        $(ruta1).addClass('pb')
        $(escalerita).addClass('pb')
        $(banito).addClass('pb')
    }
    else if (destino == 'P1 Aula 3' && inicio == 'PB Entrada') {
        $(navegador).removeClass('visible')
        $(imagenMapa).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/PlantaBaja.jpg')
        $(ruta1).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/rutaEntradaEscalerra.png')
        $(ruta1).toggle()
        $(btnSiguiente).toggle()
        $(imagenMapa).removeClass('p1')
        $(ruta1).removeClass('p1')
        $(escalerita).removeClass('p1')
        $(banito).removeClass('p1')
        $(imagenMapa).addClass('pb')
        $(ruta1).addClass('pb')
        $(escalerita).addClass('pb')
        $(banito).addClass('pb')
    }
    else if (destino == 'P1 Aula 4' && inicio == 'PB Entrada') {
        $(navegador).removeClass('visible')
        $(imagenMapa).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/PlantaBaja.jpg')
        $(ruta1).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/rutaEntradaEscalerra.png')
        $(ruta1).toggle()
        $(btnSiguiente).toggle()
        $(imagenMapa).removeClass('p1')
        $(ruta1).removeClass('p1')
        $(escalerita).removeClass('p1')
        $(banito).removeClass('p1')
        $(imagenMapa).addClass('pb')
        $(ruta1).addClass('pb')
        $(escalerita).addClass('pb')
        $(banito).addClass('pb')
    }
    else if (destino == 'P1 Aula 5' && inicio == 'PB Entrada') {
        $(navegador).removeClass('visible')
        $(imagenMapa).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/PlantaBaja.jpg')
        $(ruta1).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/rutaEntradaEscalerra.png')
        $(ruta1).toggle()
        $(btnSiguiente).toggle()
        $(imagenMapa).removeClass('p1')
        $(ruta1).removeClass('p1')
        $(escalerita).removeClass('p1')
        $(banito).removeClass('p1')
        $(imagenMapa).addClass('pb')
        $(ruta1).addClass('pb')
        $(escalerita).addClass('pb')
        $(banito).addClass('pb')
    } else if (destino == 'P1 Aula 6' && inicio == 'PB Entrada') {
        $(navegador).removeClass('visible')
        $(imagenMapa).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/PlantaBaja.jpg')
        $(ruta1).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/rutaEntradaEscalerra.png')
        $(ruta1).toggle()
        $(btnSiguiente).toggle()
        $(imagenMapa).removeClass('p1')
        $(ruta1).removeClass('p1')
        $(escalerita).removeClass('p1')
        $(banito).removeClass('p1')
        $(imagenMapa).addClass('pb')
        $(ruta1).addClass('pb')
        $(escalerita).addClass('pb')
        $(banito).addClass('pb')
    } else if (destino == 'P1 Aula 7' && inicio == 'PB Entrada') {
        $(navegador).removeClass('visible')
        $(imagenMapa).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/PlantaBaja.jpg')
        $(ruta1).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/rutaEntradaEscalerra.png')
        $(ruta1).toggle()
        $(btnSiguiente).toggle()
        $(imagenMapa).removeClass('p1')
        $(ruta1).removeClass('p1')
        $(escalerita).removeClass('p1')
        $(banito).removeClass('p1')
        $(imagenMapa).addClass('pb')
        $(ruta1).addClass('pb')
        $(escalerita).addClass('pb')
        $(banito).addClass('pb')
    } else if (destino == 'P1 Preceptoria 1' && inicio == 'PB Entrada') {
        $(navegador).removeClass('visible')
        $(imagenMapa).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/PlantaBaja.jpg')
        $(ruta1).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/rutaEntradaEscalerra.png')
        $(ruta1).toggle()
        $(btnSiguiente).toggle()
        $(imagenMapa).removeClass('p1')
        $(ruta1).removeClass('p1')
        $(escalerita).removeClass('p1')
        $(banito).removeClass('p1')
        $(imagenMapa).addClass('pb')
        $(ruta1).addClass('pb')
        $(escalerita).addClass('pb')
        $(banito).addClass('pb')
    } else if (destino == 'P1 Preceptoria 2' && inicio == 'PB Entrada') {
        $(navegador).removeClass('visible')
        $(imagenMapa).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/PlantaBaja.jpg')
        $(ruta1).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/rutaEntradaEscalerra.png')
        $(ruta1).toggle()
        $(btnSiguiente).toggle()
        $(imagenMapa).removeClass('p1')
        $(ruta1).removeClass('p1')
        $(escalerita).removeClass('p1')
        $(banito).removeClass('p1')
        $(imagenMapa).addClass('pb')
        $(ruta1).addClass('pb')
        $(escalerita).addClass('pb')
        $(banito).addClass('pb')
    } else if (destino == 'P1 Radio' && inicio == 'PB Entrada') {
        $(navegador).removeClass('visible')
        $(imagenMapa).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/PlantaBaja.jpg')
        $(ruta1).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/rutaEntradaEscalerra.png')
        $(ruta1).toggle()
        $(btnSiguiente).toggle()
        $(imagenMapa).removeClass('p1')
        $(ruta1).removeClass('p1')
        $(escalerita).removeClass('p1')
        $(banito).removeClass('p1')
        $(imagenMapa).addClass('pb')
        $(ruta1).addClass('pb')
        $(escalerita).addClass('pb')
        $(banito).addClass('pb')
    } else if (destino == 'P1 Sala de aceleracion' && inicio == 'PB Entrada') {
        $(navegador).removeClass('visible')
        $(imagenMapa).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/PlantaBaja.jpg')
        $(ruta1).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/rutaEntradaEscalerra.png')
        $(ruta1).toggle()
        $(btnSiguiente).toggle()
        $(imagenMapa).removeClass('p1')
        $(ruta1).removeClass('p1')
        $(escalerita).removeClass('p1')
        $(banito).removeClass('p1')
        $(imagenMapa).addClass('pb')
        $(ruta1).addClass('pb')
        $(escalerita).addClass('pb')
        $(banito).addClass('pb')
    } else if (destino == 'P1 Sala de Robotica' && inicio == 'PB Entrada') {
        $(navegador).removeClass('visible')
        $(imagenMapa).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/PlantaBaja.jpg')
        $(ruta1).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/rutaEntradaEscalerra.png')
        $(ruta1).toggle()
        $(btnSiguiente).toggle()
        $(imagenMapa).removeClass('p1')
        $(ruta1).removeClass('p1')
        $(escalerita).removeClass('p1')
        $(banito).removeClass('p1')
        $(imagenMapa).addClass('pb')
        $(ruta1).addClass('pb')
        $(escalerita).addClass('pb')
        $(banito).addClass('pb')
    }else if (destino == 'P2 Aula 5' && inicio == 'PB Entrada') {
        $(navegador).removeClass('visible')
        $(imagenMapa).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/PlantaBaja.jpg')
        $(ruta1).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/rutaTeatroSalaCinco1.png')

        $(ruta1).toggle()
        $(btnSiguiente).toggle()
        $(imagenMapa).removeClass('p2')
        $(ruta1).removeClass('p2')
        $(escalerita).removeClass('p2')
        $(banito).removeClass('p2')
        $(imagenMapa).addClass('pb')
        $(ruta1).addClass('pb')
        $(escalerita).addClass('pb')
        $(banito).addClass('pb')
    }else if (destino == 'P2 Aula 4' && inicio == 'PB Entrada') {
        $(navegador).removeClass('visible')
        $(imagenMapa).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/PlantaBaja.jpg')
        $(ruta1).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/rutaTeatroSalaCinco1.png')

        $(ruta1).toggle()
        $(btnSiguiente).toggle()
        $(imagenMapa).removeClass('p2')
        $(ruta1).removeClass('p2')
        $(escalerita).removeClass('p2')
        $(banito).removeClass('p2')
        $(imagenMapa).addClass('pb')
        $(ruta1).addClass('pb')
        $(escalerita).addClass('pb')
        $(banito).addClass('pb')
    }else if (destino == 'P2 Aula 3' && inicio == 'PB Entrada') {
        $(navegador).removeClass('visible')
        $(imagenMapa).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/PlantaBaja.jpg')
        $(ruta1).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/rutaTeatroSalaCinco1.png')

        $(ruta1).toggle()
        $(btnSiguiente).toggle()
        $(imagenMapa).removeClass('p2')
        $(ruta1).removeClass('p2')
        $(escalerita).removeClass('p2')
        $(banito).removeClass('p2')
        $(imagenMapa).addClass('pb')
        $(ruta1).addClass('pb')
        $(escalerita).addClass('pb')
        $(banito).addClass('pb')
    }else if (destino == 'P2 Aula 2' && inicio == 'PB Entrada') {
        $(navegador).removeClass('visible')
        $(imagenMapa).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/PlantaBaja.jpg')
        $(ruta1).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/rutaTeatroSalaCinco1.png')

        $(ruta1).toggle()
        $(btnSiguiente).toggle()
        $(imagenMapa).removeClass('p2')
        $(ruta1).removeClass('p2')
        $(escalerita).removeClass('p2')
        $(banito).removeClass('p2')
        $(imagenMapa).addClass('pb')
        $(ruta1).addClass('pb')
        $(escalerita).addClass('pb')
        $(banito).addClass('pb')
    }else if (destino == 'P2 Aula 1' && inicio == 'PB Entrada') {
        $(navegador).removeClass('visible')
        $(imagenMapa).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/PlantaBaja.jpg')
        $(ruta1).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/rutaTeatroSalaCinco1.png')

        $(ruta1).toggle()
        $(btnSiguiente).toggle()
        $(imagenMapa).removeClass('p2')
        $(ruta1).removeClass('p2')
        $(escalerita).removeClass('p2')
        $(banito).removeClass('p2')
        $(imagenMapa).addClass('pb')
        $(ruta1).addClass('pb')
        $(escalerita).addClass('pb')
        $(banito).addClass('pb')
    }else if (destino == 'P2 Aula 6' && inicio == 'PB Entrada') {
        $(navegador).removeClass('visible')
        $(imagenMapa).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/PlantaBaja.jpg')
        $(ruta1).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/rutaTeatroSalaCinco1.png')

        $(ruta1).toggle()
        $(btnSiguiente).toggle()
        $(imagenMapa).removeClass('p2')
        $(ruta1).removeClass('p2')
        $(escalerita).removeClass('p2')
        $(banito).removeClass('p2')
        $(imagenMapa).addClass('pb')
        $(ruta1).addClass('pb')
        $(escalerita).addClass('pb')
        $(banito).addClass('pb')
    }else if (destino == 'P2 Aula 7' && inicio == 'PB Entrada') {
        $(navegador).removeClass('visible')
        $(imagenMapa).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/PlantaBaja.jpg')
        $(ruta1).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/rutaTeatroSalaCinco1.png')

        $(ruta1).toggle()
        $(btnSiguiente).toggle()
        $(imagenMapa).removeClass('p2')
        $(ruta1).removeClass('p2')
        $(escalerita).removeClass('p2')
        $(banito).removeClass('p2')
        $(imagenMapa).addClass('pb')
        $(ruta1).addClass('pb')
        $(escalerita).addClass('pb')
        $(banito).addClass('pb')
    }else if (destino == 'P2 Aula 8' && inicio == 'PB Entrada') {
        $(navegador).removeClass('visible')
        $(imagenMapa).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/PlantaBaja.jpg')
        $(ruta1).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/rutaTeatroSalaCinco1.png')

        $(ruta1).toggle()
        $(btnSiguiente).toggle()
        $(imagenMapa).removeClass('p2')
        $(ruta1).removeClass('p2')
        $(escalerita).removeClass('p2')
        $(banito).removeClass('p2')
        $(imagenMapa).addClass('pb')
        $(ruta1).addClass('pb')
        $(escalerita).addClass('pb')
        $(banito).addClass('pb')
    }else if (destino == 'P2 Aula 9' && inicio == 'PB Entrada') {
        $(navegador).removeClass('visible')
        $(imagenMapa).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/PlantaBaja.jpg')
        $(ruta1).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/rutaTeatroSalaCinco1.png')

        $(ruta1).toggle()
        $(btnSiguiente).toggle()
        $(imagenMapa).removeClass('p2')
        $(ruta1).removeClass('p2')
        $(escalerita).removeClass('p2')
        $(banito).removeClass('p2')
        $(imagenMapa).addClass('pb')
        $(ruta1).addClass('pb')
        $(escalerita).addClass('pb')
        $(banito).addClass('pb')
    }else if (destino == 'P2 Sala de musica' && inicio == 'PB Entrada') {
        $(navegador).removeClass('visible')
        $(imagenMapa).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/PlantaBaja.jpg')
        $(ruta1).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/rutaTeatroSalaCinco1.png')

        $(ruta1).toggle()
        $(btnSiguiente).toggle()
        $(imagenMapa).removeClass('p2')
        $(ruta1).removeClass('p2')
        $(escalerita).removeClass('p2')
        $(banito).removeClass('p2')
        $(imagenMapa).addClass('pb')
        $(ruta1).addClass('pb')
        $(escalerita).addClass('pb')
        $(banito).addClass('pb')
    }else if (destino == 'P2 Preceptoria 2' && inicio == 'PB Entrada') {
        $(navegador).removeClass('visible')
        $(imagenMapa).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/PlantaBaja.jpg')
        $(ruta1).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/rutaTeatroSalaCinco1.png')

        $(ruta1).toggle()
        $(btnSiguiente).toggle()
        $(imagenMapa).removeClass('p2')
        $(ruta1).removeClass('p2')
        $(escalerita).removeClass('p2')
        $(banito).removeClass('p2')
        $(imagenMapa).addClass('pb')
        $(ruta1).addClass('pb')
        $(escalerita).addClass('pb')
        $(banito).addClass('pb')
    }else if (destino == 'P2 Preceptoria 1' && inicio == 'PB Entrada') {
        $(navegador).removeClass('visible')
        $(imagenMapa).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/PlantaBaja.jpg')
        $(ruta1).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/rutaTeatroSalaCinco1.png')

        $(ruta1).toggle()
        $(btnSiguiente).toggle()
        $(imagenMapa).removeClass('p2')
        $(ruta1).removeClass('p2')
        $(escalerita).removeClass('p2')
        $(banito).removeClass('p2')
        $(imagenMapa).addClass('pb')
        $(ruta1).addClass('pb')
        $(escalerita).addClass('pb')
        $(banito).addClass('pb')
    }
}
function siguiente(piso) {
    let banito = $('#banio')
    let escalerita = $('#escalera');
    let ruta1 = $('#ruta1')
    let destino = $('#destino').attr('value')
    let inicio = $('#input-ubicacion').val()
    piso = piso + 1
    let btnSiguiente = $('#btnSig')
    let imagenMapa = $('#mapa-imagen')

    if (piso == 1) {
        $(imagenMapa).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/PrimerPiso.jpg')
        $(btnSiguiente).attr('onclick', 'siguiente(1)')
        $(imagenMapa).removeClass('pb')
        $(ruta1).removeClass('pb')
        $(escalerita).removeClass('pb')
        $(banito).removeClass('pb')
        $(imagenMapa).addClass('p1')
        $(ruta1).addClass('p1')
        $(escalerita).addClass('p1')
        $(banito).addClass('p1')
        if (destino == 'P1 Sala de informatica 5' && inicio == 'PB Teatro') {
            $(ruta1).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/rutaTeatroSalaCinco2.png')
            $(btnSiguiente).attr('onclick', 'llegue()')
            $(btnSiguiente).text('YA LLEGUE')
        } else if (destino == 'P1 Sala de informatica 5' && inicio == 'PB Entrada') {
            $(ruta1).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/rutaEscaleraSala5.png')

            $(btnSiguiente).attr('onclick', 'llegue()')
            $(btnSiguiente).text('YA LLEGUE')
        } else if (destino == 'P1 Sala de informatica 4' && inicio == 'PB Entrada') {
            $(ruta1).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/rutaEscalera1Sala4.png')

            $(btnSiguiente).attr('onclick', 'llegue()')
            $(btnSiguiente).text('YA LLEGUE')
        } else if (destino == 'P1 Sala de informatica 3' && inicio == 'PB Entrada') {
            $(ruta1).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/rutaEscaleraSala3.png')

            $(btnSiguiente).attr('onclick', 'llegue()')
            $(btnSiguiente).text('YA LLEGUE')
        } else if (destino == 'P1 Sala de informatica 2' && inicio == 'PB Entrada') {
            $(ruta1).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/rutaEscalera1Sala2.png')

            $(btnSiguiente).attr('onclick', 'llegue()')
            $(btnSiguiente).text('YA LLEGUE')
        } else if (destino == 'P1 Sala de informatica 1' && inicio == 'PB Entrada') {
            $(ruta1).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/rutaEscaleraSala1.png')

            $(btnSiguiente).attr('onclick', 'llegue()')
            $(btnSiguiente).text('YA LLEGUE')
        } else if (destino == 'P1 Aula 7' && inicio == 'PB Entrada') {
            $(ruta1).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/rutaEscaleraSala1.png')
            $(btnSiguiente).attr('onclick', 'llegue()')
            $(btnSiguiente).text('YA LLEGUE')
        } else if (destino == 'P1 Aula 1' && inicio == 'PB Entrada') {
            $(ruta1).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/rutaEscaleraSala1.png')
            $(btnSiguiente).attr('onclick', 'llegue()')
            $(btnSiguiente).text('YA LLEGUE')
        } else if (destino == 'P1 Aula 6' && inicio == 'PB Entrada') {
            $(ruta1).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/rutaEscaleraSala1.png')
            $(btnSiguiente).attr('onclick', 'llegue()')
            $(btnSiguiente).text('YA LLEGUE')
        } else if (destino == 'P1 Aula 5' && inicio == 'PB Entrada') {
            $(ruta1).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/rutaEscaleraSala1.png')
            $(btnSiguiente).attr('onclick', 'llegue()')
            $(btnSiguiente).text('YA LLEGUE')
        } else if (destino == 'P1 Aula 4' && inicio == 'PB Entrada') {
            $(ruta1).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/rutaEscaleraSala1.png')
            $(btnSiguiente).attr('onclick', 'llegue()')
            $(btnSiguiente).text('YA LLEGUE')
        } else if (destino == 'P1 Aula 3' && inicio == 'PB Entrada') {
            $(ruta1).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/rutaEscaleraSala1.png')
            $(btnSiguiente).attr('onclick', 'llegue()')
            $(btnSiguiente).text('YA LLEGUE')
        } else if (destino == 'P1 Aula 2' && inicio == 'PB Entrada') {
            $(ruta1).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/rutaEscaleraSala1.png')
            $(btnSiguiente).attr('onclick', 'llegue()')
            $(btnSiguiente).text('YA LLEGUE')
        } else if (destino == 'P1 Preceptoria 1' && inicio == 'PB Entrada') {
            $(ruta1).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/rutaEscaleraSala1.png')
            $(btnSiguiente).attr('onclick', 'llegue()')
            $(btnSiguiente).text('YA LLEGUE')
        } else if (destino == 'P1 Preseptoria 2' && inicio == 'PB Entrada') {
            $(ruta1).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/rutaEscaleraSala1.png')
            $(btnSiguiente).attr('onclick', 'llegue()')
            $(btnSiguiente).text('YA LLEGUE')
        } else {
            $(ruta1).toggle()
        }
    } else if (piso == 2) {
        if (destino == 'P2 Aula 5' && inicio == 'PB Teatro') {
            $(imagenMapa).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/SegundoPiso.jpg')
        $(btnSiguiente).attr('onclick', 'llegue()')
        $(ruta1).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/rutaTeatroP2Aula5.png')
        $(btnSiguiente).attr('onclick', 'llegue()')
        $(btnSiguiente).text('YA LLEGUE')
        $(ruta1).toggle()
        $(imagenMapa).removeClass('p1')
        $(ruta1).removeClass('p1')
        $(escalerita).removeClass('p1')
        $(banito).removeClass('p1')
        $(imagenMapa).addClass('p2')
        $(ruta1).addClass('p2')
        $(escalerita).addClass('p2')
        $(banito).addClass('p2')
        }else if (destino == 'P2 Aula 1' && inicio == 'PB Entrada') {
            $(imagenMapa).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/SegundoPiso.jpg')
        $(btnSiguiente).attr('onclick', 'llegue()')
        $(ruta1).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/rutaTeatroP2Aula5.png')
        $(btnSiguiente).attr('onclick', 'llegue()')
        $(btnSiguiente).text('YA LLEGUE')
        $(ruta1).toggle()
        $(imagenMapa).removeClass('p1')
        $(ruta1).removeClass('p1')
        $(escalerita).removeClass('p1')
        $(banito).removeClass('p1')
        $(imagenMapa).addClass('p2')
        $(ruta1).addClass('p2')
        $(escalerita).addClass('p2')
        $(banito).addClass('p2')
        }else if (destino == 'P2 Aula 2' && inicio == 'PB Entrada') {
            $(imagenMapa).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/SegundoPiso.jpg')
        $(btnSiguiente).attr('onclick', 'llegue()')
        $(ruta1).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/rutaTeatroP2Aula5.png')
        $(btnSiguiente).attr('onclick', 'llegue()')
        $(btnSiguiente).text('YA LLEGUE')
        $(ruta1).toggle()
        $(imagenMapa).removeClass('p1')
        $(ruta1).removeClass('p1')
        $(escalerita).removeClass('p1')
        $(banito).removeClass('p1')
        $(imagenMapa).addClass('p2')
        $(ruta1).addClass('p2')
        $(escalerita).addClass('p2')
        $(banito).addClass('p2')
        }else if (destino == 'P2 Aula 3' && inicio == 'PB Entrada') {
            $(imagenMapa).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/SegundoPiso.jpg')
        $(btnSiguiente).attr('onclick', 'llegue()')
        $(ruta1).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/rutaTeatroP2Aula5.png')
        $(btnSiguiente).attr('onclick', 'llegue()')
        $(btnSiguiente).text('YA LLEGUE')
        $(ruta1).toggle()
        $(imagenMapa).removeClass('p1')
        $(ruta1).removeClass('p1')
        $(escalerita).removeClass('p1')
        $(banito).removeClass('p1')
        $(imagenMapa).addClass('p2')
        $(ruta1).addClass('p2')
        $(escalerita).addClass('p2')
        $(banito).addClass('p2')
        }else if (destino == 'P2 Aula 4' && inicio == 'PB Entrada') {
            $(imagenMapa).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/SegundoPiso.jpg')
        $(btnSiguiente).attr('onclick', 'llegue()')
        $(ruta1).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/rutaTeatroP2Aula5.png')
        $(btnSiguiente).attr('onclick', 'llegue()')
        $(btnSiguiente).text('YA LLEGUE')
        $(ruta1).toggle()
        $(imagenMapa).removeClass('p1')
        $(ruta1).removeClass('p1')
        $(escalerita).removeClass('p1')
        $(banito).removeClass('p1')
        $(imagenMapa).addClass('p2')
        $(ruta1).addClass('p2')
        $(escalerita).addClass('p2')
        $(banito).addClass('p2')
        }else if (destino == 'P2 Aula 5' && inicio == 'PB Entrada') {
            $(imagenMapa).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/SegundoPiso.jpg')
        $(btnSiguiente).attr('onclick', 'llegue()')
        $(ruta1).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/rutaTeatroP2Aula5.png')
        $(btnSiguiente).attr('onclick', 'llegue()')
        $(btnSiguiente).text('YA LLEGUE')
        $(ruta1).toggle()
        $(imagenMapa).removeClass('p1')
        $(ruta1).removeClass('p1')
        $(escalerita).removeClass('p1')
        $(banito).removeClass('p1')
        $(imagenMapa).addClass('p2')
        $(ruta1).addClass('p2')
        $(escalerita).addClass('p2')
        $(banito).addClass('p2')
        }else if (destino == 'P2 Aula 6' && inicio == 'PB Entrada') {
            $(imagenMapa).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/SegundoPiso.jpg')
        $(btnSiguiente).attr('onclick', 'llegue()')
        $(ruta1).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/rutaTeatroP2Aula5.png')
        $(btnSiguiente).attr('onclick', 'llegue()')
        $(btnSiguiente).text('YA LLEGUE')
        $(ruta1).toggle()
        $(imagenMapa).removeClass('p1')
        $(ruta1).removeClass('p1')
        $(escalerita).removeClass('p1')
        $(banito).removeClass('p1')
        $(imagenMapa).addClass('p2')
        $(ruta1).addClass('p2')
        $(escalerita).addClass('p2')
        $(banito).addClass('p2')
        }else if (destino == 'P2 Aula 7' && inicio == 'PB Entrada') {
            $(imagenMapa).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/SegundoPiso.jpg')
        $(btnSiguiente).attr('onclick', 'llegue()')
        $(ruta1).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/rutaTeatroP2Aula5.png')
        $(btnSiguiente).attr('onclick', 'llegue()')
        $(btnSiguiente).text('YA LLEGUE')
        $(ruta1).toggle()
        $(imagenMapa).removeClass('p1')
        $(ruta1).removeClass('p1')
        $(escalerita).removeClass('p1')
        $(banito).removeClass('p1')
        $(imagenMapa).addClass('p2')
        $(ruta1).addClass('p2')
        $(escalerita).addClass('p2')
        $(banito).addClass('p2')
        }else if (destino == 'P2 Aula 8' && inicio == 'PB Entrada') {
            $(imagenMapa).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/SegundoPiso.jpg')
        $(btnSiguiente).attr('onclick', 'llegue()')
        $(ruta1).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/rutaTeatroP2Aula5.png')
        $(btnSiguiente).attr('onclick', 'llegue()')
        $(btnSiguiente).text('YA LLEGUE')
        $(ruta1).toggle()
        $(imagenMapa).removeClass('p1')
        $(ruta1).removeClass('p1')
        $(escalerita).removeClass('p1')
        $(banito).removeClass('p1')
        $(imagenMapa).addClass('p2')
        $(ruta1).addClass('p2')
        $(escalerita).addClass('p2')
        $(banito).addClass('p2')
        }else if (destino == 'P2 Aula 9' && inicio == 'PB Entrada') {
            $(imagenMapa).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/SegundoPiso.jpg')
        $(btnSiguiente).attr('onclick', 'llegue()')
        $(ruta1).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/rutaTeatroP2Aula5.png')
        $(btnSiguiente).attr('onclick', 'llegue()')
        $(btnSiguiente).text('YA LLEGUE')
        $(ruta1).toggle()
        $(imagenMapa).removeClass('p1')
        $(ruta1).removeClass('p1')
        $(escalerita).removeClass('p1')
        $(banito).removeClass('p1')
        $(imagenMapa).addClass('p2')
        $(ruta1).addClass('p2')
        $(escalerita).addClass('p2')
        $(banito).addClass('p2')
        }else if (destino == 'P2 Sala de musica' && inicio == 'PB Entrada') {
            $(imagenMapa).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/SegundoPiso.jpg')
        $(btnSiguiente).attr('onclick', 'llegue()')
        $(ruta1).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/rutaTeatroP2Aula5.png')
        $(btnSiguiente).attr('onclick', 'llegue()')
        $(btnSiguiente).text('YA LLEGUE')
        $(ruta1).toggle()
        $(imagenMapa).removeClass('p1')
        $(ruta1).removeClass('p1')
        $(escalerita).removeClass('p1')
        $(banito).removeClass('p1')
        $(imagenMapa).addClass('p2')
        $(ruta1).addClass('p2')
        $(escalerita).addClass('p2')
        $(banito).addClass('p2')
        }else if (destino == 'P2 Preceptoria 2' && inicio == 'PB Entrada') {
            $(imagenMapa).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/SegundoPiso.jpg')
        $(btnSiguiente).attr('onclick', 'llegue()')
        $(ruta1).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/rutaTeatroP2Aula5.png')
        $(btnSiguiente).attr('onclick', 'llegue()')
        $(btnSiguiente).text('YA LLEGUE')
        $(ruta1).toggle()
        $(imagenMapa).removeClass('p1')
        $(ruta1).removeClass('p1')
        $(escalerita).removeClass('p1')
        $(banito).removeClass('p1')
        $(imagenMapa).addClass('p2')
        $(ruta1).addClass('p2')
        $(escalerita).addClass('p2')
        $(banito).addClass('p2')
        }else if (destino == 'P2 Preceptoria 1' && inicio == 'PB Entrada') {
            $(imagenMapa).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/SegundoPiso.jpg')
        $(btnSiguiente).attr('onclick', 'llegue()')
        $(ruta1).attr('src', 'views/static/img/Instituciones/pisosInstituciones/RobertoArlt/rutaTeatroP2Aula5.png')
        $(btnSiguiente).attr('onclick', 'llegue()')
        $(btnSiguiente).text('YA LLEGUE')
        $(ruta1).toggle()
        $(imagenMapa).removeClass('p1')
        $(ruta1).removeClass('p1')
        $(escalerita).removeClass('p1')
        $(banito).removeClass('p1')
        $(imagenMapa).addClass('p2')
        $(ruta1).addClass('p2')
        $(escalerita).addClass('p2')
        $(banito).addClass('p2')
        }
    }
}
function llegue() {
    let btnSiguiente = $('#btnSig')
    $(btnSiguiente).attr('onclick', 'siguiente(0)')
    $(btnSiguiente).text('SIGUIENTE')
    $(ruta1).toggle()
    $(btnSiguiente).toggle()
}