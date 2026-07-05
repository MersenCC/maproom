const iconoSolicitud = document.getElementById('icono-solicitud');
const mensaje = document.getElementById('mensaje');
const enlace = document.getElementById('enlace');

var expresión = 'Rechazado';

switch (expresión) {
    case 'Aceptado':
        iconoSolicitud.innerHTML = `<i class="fa-solid fa-circle-check"></i>`
        mensaje.innerHTML = `<p>Felicitaciones, su estado de solicitud fue aprobada</p>`
        enlace.innerHTML = `<p>cualquier problema, comuniquese con <a>Maproom</a></p>`;
      break;
    case 'Rechazado':
        iconoSolicitud.innerHTML = `<i class="fa-solid fa-circle-xmark"></i>`
        mensaje.innerHTML = `<p>Lo sentimos, su estado de solicitud fue rechazada</p>`
        enlace.innerHTML = `<p>cualquier problema, comuniquese con <a>Maproom</a></p>`;
      break;

    default:
        iconoSolicitud.innerHTML = `<i class="fa-solid fa-circle-exclamation"></i>`;
        mensaje.innerHTML = `<p>Su estado de solicitud sigue en revision, esto durara unos dias</p>`;
        enlace.innerHTML = `<p>cualquier problema, comuniquese con <a>Maproom</a></p>`;
      break;
  }