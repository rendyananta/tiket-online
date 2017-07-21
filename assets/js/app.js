function redirect(path) {
  var port = '';
  if (window.location.port != 80) port = ':' + window.location.port;
  window.location.href = window.location.protocol + '//' + window.location.hostname + port + path;
}

$(document).ready(function () {
  $('.datetimepicker').datetimepicker({ format: 'Y-M-D HH:mm:ss' });
})
