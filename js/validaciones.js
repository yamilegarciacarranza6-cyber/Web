$(document).ready(function() {
    console.log('=== VALIDACIONES INICIADAS ===');
    
    // Función para mostrar errores
    function mostrarError(campo, mensaje) {
        // Remover error anterior
        $('.error-validacion[data-campo="' + campo + '"]').remove();
        
        // Agregar nuevo error
        const errorHtml = '<div class="error-validacion" data-campo="' + campo + '">' + mensaje + '</div>';
        $('[name="' + campo + '"]').after(errorHtml);
        $('[name="' + campo + '"]').addClass('campo-error');
    }
    
    // Función para limpiar error
    function limpiarError(campo) {
        $('.error-validacion[data-campo="' + campo + '"]').remove();
        $('[name="' + campo + '"]').removeClass('campo-error');
    }
    
    // Validación para Alta de Producto
    if ($('#formAltaProducto').length) {
        console.log('Configurando validación para Alta de Producto');
        
        $('#formAltaProducto').on('submit', function(e) {
            console.log('Submit detectado en Alta Producto');
            e.preventDefault(); // IMPORTANTE: Prevenir envío inmediato
            
            let isValid = true;
            
            // Limpiar todos los errores previos
            $('.error-validacion').remove();
            $('.campo-error').removeClass('campo-error');
            
            // Validar nombre
            const nombre = $('input[name="nombre"]').val().trim();
            if (!nombre) {
                mostrarError('nombre', 'El nombre es obligatorio');
                isValid = false;
            } else if (nombre.length < 2) {
                mostrarError('nombre', 'El nombre debe tener al menos 2 caracteres');
                isValid = false;
            } else {
                limpiarError('nombre');
            }
            
            // Validar descripción
            const descripcion = $('textarea[name="descripcion"]').val().trim();
            if (!descripcion) {
                mostrarError('descripcion', 'La descripción es obligatoria');
                isValid = false;
            } else if (descripcion.length < 10) {
                mostrarError('descripcion', 'La descripción debe tener al menos 10 caracteres');
                isValid = false;
            } else {
                limpiarError('descripcion');
            }
            
            // Validar precio
            const precio = $('input[name="precio"]').val();
            if (!precio) {
                mostrarError('precio', 'El precio es obligatorio');
                isValid = false;
            } else if (isNaN(precio) || parseFloat(precio) <= 0) {
                mostrarError('precio', 'El precio debe ser un número mayor a 0');
                isValid = false;
            } else {
                limpiarError('precio');
            }
            
            // Validar categoría
            const categoria = $('input[name="categoria"]').val().trim();
            if (!categoria) {
                mostrarError('categoria', 'La categoría es obligatoria');
                isValid = false;
            } else if (categoria.length < 2) {
                mostrarError('categoria', 'La categoría debe tener al menos 2 caracteres');
                isValid = false;
            } else {
                limpiarError('categoria');
            }
            
            // Validar imagen
            const imagen = $('input[name="imagen"]').val();
            if (!imagen) {
                mostrarError('imagen', 'La imagen es obligatoria');
                isValid = false;
            } else {
                // Validar tipo de archivo
                const allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif|\.webp)$/i;
                if (!allowedExtensions.exec(imagen)) {
                    mostrarError('imagen', 'Solo se permiten imágenes (JPG, PNG, GIF, WebP)');
                    isValid = false;
                } else {
                    limpiarError('imagen');
                }
            }
            
            if (!isValid) {
                console.log('Formulario bloqueado por errores de validación');
                // Mostrar alerta general
                alert('Por favor, corrige los errores en el formulario antes de enviar.');
                return false;
            } else {
                console.log('Formulario válido, enviando...');
                // Si todo está bien, enviar el formulario MANUALMENTE
                this.submit();
            }
        });
    }
    
    // Validación para Editar Producto
    if ($('#formEditar').length) {
        console.log('Configurando validación para Editar Producto');
        
        $('#formEditar').on('submit', function(e) {
            console.log('Submit detectado en Editar Producto');
            e.preventDefault(); // IMPORTANTE: Prevenir envío inmediato
            
            let isValid = true;
            
            // Limpiar todos los errores previos
            $('.error-validacion').remove();
            $('.campo-error').removeClass('campo-error');
            
            // Validar nombre
            const nombre = $('input[name="nombre"]').val().trim();
            if (!nombre) {
                mostrarError('nombre', 'El nombre es obligatorio');
                isValid = false;
            } else if (nombre.length < 2) {
                mostrarError('nombre', 'El nombre debe tener al menos 2 caracteres');
                isValid = false;
            } else {
                limpiarError('nombre');
            }
            
            // Validar descripción
            const descripcion = $('textarea[name="descripcion"]').val().trim();
            if (!descripcion) {
                mostrarError('descripcion', 'La descripción es obligatoria');
                isValid = false;
            } else if (descripcion.length < 10) {
                mostrarError('descripcion', 'La descripción debe tener al menos 10 caracteres');
                isValid = false;
            } else {
                limpiarError('descripcion');
            }
            
            // Validar precio
            const precio = $('input[name="precio"]').val();
            if (!precio) {
                mostrarError('precio', 'El precio es obligatorio');
                isValid = false;
            } else if (isNaN(precio) || parseFloat(precio) <= 0) {
                mostrarError('precio', 'El precio debe ser un número mayor a 0');
                isValid = false;
            } else {
                limpiarError('precio');
            }
            
            // Validar categoría
            const categoria = $('input[name="categoria"]').val().trim();
            if (!categoria) {
                mostrarError('categoria', 'La categoría es obligatoria');
                isValid = false;
            } else if (categoria.length < 2) {
                mostrarError('categoria', 'La categoría debe tener al menos 2 caracteres');
                isValid = false;
            } else {
                limpiarError('categoria');
            }
            
            // Validar imagen (opcional en editar)
            const imagen = $('input[name="imagen"]').val();
            if (imagen) {
                const allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif|\.webp)$/i;
                if (!allowedExtensions.exec(imagen)) {
                    mostrarError('imagen', 'Solo se permiten imágenes (JPG, PNG, GIF, WebP)');
                    isValid = false;
                } else {
                    limpiarError('imagen');
                }
            }
            
            if (!isValid) {
                console.log('Formulario bloqueado por errores de validación');
                alert('Por favor, corrige los errores en el formulario antes de enviar.');
                return false;
            } else {
                console.log('Formulario válido, enviando...');
                // Si todo está bien, enviar el formulario MANUALMENTE
                this.submit();
            }
        });
    }
    
    // Limpiar errores cuando el usuario escribe
    $('input, textarea').on('input', function() {
        const campo = $(this).attr('name');
        limpiarError(campo);
    });
    
    // Limpiar error de imagen cuando se selecciona archivo
    $('input[type="file"]').on('change', function() {
        const campo = $(this).attr('name');
        limpiarError(campo);
    });
});