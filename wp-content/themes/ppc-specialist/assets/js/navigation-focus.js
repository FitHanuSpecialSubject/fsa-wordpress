var ppc_specialist_Keyboard_loop = function (elem) {
  var ppc_specialist_tabbable = elem.find('select, input, textarea, button, a').filter(':visible');
  var ppc_specialist_firstTabbable = ppc_specialist_tabbable.first();
  var ppc_specialist_lastTabbable = ppc_specialist_tabbable.last();
  ppc_specialist_firstTabbable.focus();

  ppc_specialist_lastTabbable.on('keydown', function (e) {
    if ((e.which === 9 && !e.shiftKey)) {
      e.preventDefault();
      ppc_specialist_firstTabbable.focus();
    }
  });

  ppc_specialist_firstTabbable.on('keydown', function (e) {
    if ((e.which === 9 && e.shiftKey)) {
      e.preventDefault();
      ppc_specialist_lastTabbable.focus();
    }
  });

  elem.on('keyup', function (e) {
    if (e.keyCode === 27) {
      elem.hide();
    };
  });
};