
function cambiarCantidad(flight, cambio) {
    const input = document.getElementById(`cantidad-${flight.id}`);
    let cantidad = parseInt(input.value);
    cantidad = isNaN(cantidad) ? 1 : cantidad;
    cantidad += cambio;
    if (cantidad < 1) cantidad = 1;
    input.value = cantidad;

    const priceElement = document.getElementById('price-'+flight.id);
    const fareElement = document.getElementById('fare-'+flight.id);
    priceElement.innerText = `Precio: $${flight.fare[fareElement.value].price*cantidad}`;

}

function reservarVuelo(vueloId) {
    const cantidad = document.getElementById(`cantidad-${vueloId}`).value;
    alert(`Reservar ${cantidad} pasajes para el vuelo ${vueloId}`);
}

function selectFare(flight, event){
    const priceElement = document.getElementById('price-'+flight.id);
    const passengerElement = document.getElementById('cantidad-'+flight.id);
    console.log(passengerElement.value)
    priceElement.innerText = `Precio: $${flight.fare[event.target.value].price*passengerElement.value}`;
}

function book(flight){
    var form = document.createElement('form');
    form.method = 'POST';
    const passengerElement = document.getElementById('cantidad-'+flight.id);
    const fareElement = document.getElementById('fare-'+flight.id);
    const fare = flight.fare[fareElement.value].id;
    var url = window.appConfig.bookRoute;
    url.replace(':flight',JSON.stringify(flight));
    url.replace(':passenger', passengerElement.value);
    url.replace(':fare', fare);
    console.log(url);
    form.action = url;

    var token = window.appConfig.csrfToken;
    var csrfInput = document.createElement('input');
    csrfInput.type = 'hidden';
    csrfInput.name = '_token';
    csrfInput.value = token;
    form.appendChild(csrfInput);

    var flightInput = document.createElement('input');
    csrfInput.type = 'hidden';
    csrfInput.name = 'flight';
    csrfInput.value = JSON.stringify(flight);
    form.appendChild(csrfInput);

    document.body.appendChild(form);
    form.submit();
}