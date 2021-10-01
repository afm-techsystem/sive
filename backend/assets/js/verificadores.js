/**
 * Funcion para verificar las reglas de la contraseña
 * 
 * @param string  El password ingresado
 * @return  Devuelve si la contraseña cumple las reglas o no
 */
function verificarReglasPassword(pass) {
  const PASS_REGEX = /^[A-Za-z]{4,}$/mg;
  // const PASS_REGEX = /^(?=(?:.*[a-z]){1,})(?=(?:.*[A-Z]){1,})(?=(?:.*[0-9]){1,})(?=(?:.*[*#$%&!]){1,})[A-Za-z0-9*#$%&!]{8,}$/mg;
  return PASS_REGEX.test(pass);
}

/**
 * Funcion para verificar un correo electronico
 * 
 * @param string  El email ingresado
 * @return  Devuelve si el mail es valido o no
 */
function verificarEmail(mail) {
  const EMAIL_REGEX = /^([a-z0-9]+(?:[._-][a-z0-9]+)*)@([a-z0-9]+(?:[.-][a-z0-9]+)*\.[a-z]{2,})$/i;
  return EMAIL_REGEX.test(mail);
}








function enviarFormualrio(email, pass) {
  let params = {
    "mail": email,
    "password": pass
  };
  // Metodo AJAX para enviar un request al servidor
  $.ajax({
    url: '/controllers/login.controller.php', // a donde manda el request
    data: params, // los datos para enviar
    type: 'POST', // el metodo HTTP para el envio
    datatype: 'json', // el tipo de datos que espera en la respuesta puede ser html tambien
  }).done(res => {
    // lo que ejecuta cuando obtiene la respuesta(res) del servidor


  }).fail((xhr, status, errotThrown) => {
    // lo que ejecuta cuando falla, recibe el request(xhr), el estado(status), y el error(errorThrown)

  }).always((xhr, status) => {
    // lo que ejecuta cuando termina el request, no importa si fue con exito o con falla, recibe el request(xhr) y el estado(state)

  });
}


  // let params = {
  //       "mail": email,
  //       "password": pass
  //     };
  //     // Metodo AJAX para enviar un request al servidor
  //     $.ajax({
  //       url: '/controllers/login.controller.php', // a donde manda el request
  //       data: params, // los datos para enviar
  //       type: 'POST', // el metodo HTTP para el envio
  //       datatype: 'json', // el tipo de datos que espera en la respuesta puede ser html tambien
  //     }).done(res => {
  //       // lo que ejecuta cuando obtiene la respuesta(res) del servidor

  //     }).fail((xhr, status, errotThrown) => {
  //       // lo que ejecuta cuando falla, recibe el request(xhr), el estado(status), y el error(errorThrown)

  //     }).always((xhr, status) => {
  //       // lo que ejecuta cuando termina el request, no importa si fue con exito o con falla, recibe el request(xhr) y el estado(state)

  //     });
