document.getElementById("notifications").addEventListener("click", function() {
    document.getElementById("content").innerHTML = `
        <h2>Notifications</h2>
        <p>This is your notifications panel. Here you will see alerts and messages.</p>
        <ul>
            <li>Notification 1: Lorem ipsum dolor sit amet.</li>
            <li>Notification 2: consectetur adipiscing elit.</li>
            <li>Notification 3: sed do eiusmod tempor.</li>
        </ul>
    `;
});

document.getElementById("profile").addEventListener("click", function() {
    document.getElementById("content").innerHTML = `
         <div class="s1">
                <span>Configuracion de perfil</span>
                <img src="https://cdn-icons-png.flaticon.com/512/6676/6676023.png" alt="user image">
            </div>
       <form action="#">
                <label for="pass">Contraseña</label><br>
                <input type="password" name="pass" id="pass"><br>
               
                <div class="but">
                    <button type="submit" class="save">Guardar cambios</button>
                    <button type="reset" class="exit">Cancelar</button>
                </div>
            </form>
             <button type="submit" class="solicitud">Enviar Solicitud para institucion</button>
    `;
});