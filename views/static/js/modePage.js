const activeButton = document.querySelectorAll(".get-button-status");
activeButton.forEach((item) => {
  item.addEventListener("click", function () {
    if (item.textContent === "ON") {
      item.textContent = "OFF";
      item.classList.remove("btnON");
      item.classList.add("btnOFF");
    } else
      if (item.textContent == "OFF") {
        item.textContent = "ON";
        item.classList.add("btnON");
        item.classList.remove("btnOFF");
      }
  });
});


let botonTema = document.getElementById("switch")

document.documentElement.classList.add("light")
botonTema.innerText="nightlight"

botonTema.style.backgroundColor = "var(--text)"
botonTema.style.color = "var(--background)"

function toggleDarkMode() {
  if (document.documentElement.classList.contains("light")) {
    document.documentElement.classList.remove("light");
    document.documentElement.classList.add("dark");
    botonTema.innerText="brightness_5"
    hache1.innerText="nightlight"
    botonTema.style.backgroundColor = "var(--background)"
    botonTema.style.color = "var(--text)"
  } else if (document.documentElement.classList.contains("dark")) {
    document.documentElement.classList.remove("dark");
    document.documentElement.classList.add("light");
    botonTema.innerText="nightlight"
    botonTema.style.backgroundColor = "var(--text)"
    botonTema.style.color = "var(--background)"
  } else {
    if (
      window.matchMedia &&
      window.matchMedia("(prefers-color-scheme: light)").matches
    ) {
      document.documentElement.classList.add("dark");
    } else {
      document.documentElement.classList.add("light");
    }
  }
}
