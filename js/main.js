$(document).ready(function() {

  // ✅ Efecto de bienvenida dinámico
  $("h1").hide().fadeIn(1500);

  // ✅ Mostrar mensaje cuando pasas el mouse sobre las tarjetas
  $(".tarjeta").hover(
    function() {
      $(this).css({
        "background-color": "#fdf3d0",
        "transform": "scale(1.05)",
        "transition": "0.3s"
      });
    },
    function() {
      $(this).css({
        "background-color": "#fff",
        "transform": "scale(1)"
      });
    }
  );

  // ✅ Agregar elemento dinámico al cargar
  const mensajePromo = $("<p class='promo'>🔥 ¡Promoción del día! 2x1 en tacos al pastor 🔥</p>");
  $("main").prepend(mensajePromo.hide().fadeIn(1000));

  // ✅ Evento de clic para mostrar información adicional
  $(".tarjeta").click(function() {
    alert("Gracias por visitar la sección: " + $(this).find("h3").text());
  });

});
