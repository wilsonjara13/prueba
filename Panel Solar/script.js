(async () => {
    // Llamar a nuestra API. Puedes usar cualquier librería para la llamada, yo uso fetch, que viene nativamente en JS
    const respuestaRaw = await fetch("./obtener_datos_ajax.php");
    // Decodificar como JSON
    const respuesta = await respuestaRaw.json();
    // Ahora ya tenemos las etiquetas y datos dentro de "respuesta"
    // Obtener una referencia al elemento canvas del DOM
    const $grafica = document.querySelector("#grafica");
    const etiquetas = respuesta.etiquetas; // <- Aquí estamos pasando el valor traído usando AJAX
    // Podemos tener varios conjuntos de datos. Comencemos con uno
    const volts = {
        label: "Volts",
        // Pasar los datos igualmente desde PHP
        data: respuesta.volts, // <- Aquí estamos pasando el valor traído usando AJAX
        fill: false,        
        borderColor: 'rgba(238, 130, 238, 1)', // Color del borde
        borderWidth: 2, // Ancho del borde
        tension: 0.1
    };
    const watts = {
        label: "Watts",
        // Pasar los datos igualmente desde PHP
        data: respuesta.watts, // <- Aquí estamos pasando el valor traído usando AJAX
        fill: false,        
        borderColor: 'rgba(60, 179, 113, 1)', // Color del borde
        borderWidth: 2, // Ancho del borde
        tension: 0.1
    };
    const amps = {
        label: "Amps",
        // Pasar los datos igualmente desde PHP
        data: respuesta.amps, // <- Aquí estamos pasando el valor traído usando AJAX
        fill: false,
        borderColor: 'rgba(255, 165, 0, 1)', // Color del borde
        borderWidth: 2, // Ancho del borde
        tension: 0.1
    };
    new Chart($grafica, {
        type: 'line', // Tipo de gráfica
        data: {
            labels: etiquetas,
            datasets: [
                volts,
                watts,
                amps
                // Aquí más datos...
            ]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }],
            },
        }
    });
})();