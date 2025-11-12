$(document).ready(function() {
    $(".btn-eliminar").on("click", function() {
        const id = $(this).data("id");

        if (confirm("¿Seguro que deseas eliminar este producto?")) {
            $.ajax({
                url: "eliminar_producto.php",
                method: "POST",
                data: { id: id },
                success: function(response) {
                    alert(response);
                    location.reload();
                },
                error: function() {
                    alert("❌ Error al eliminar el producto.");
                }
            });
        }
    });
});
