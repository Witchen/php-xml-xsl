// JQuery Input Filter for Input Validation
(function ($) {
  $.fn.inputFilter = function (inputFilter) {
    return this.on(
      'input keydown keyup mousedown mouseup select contextmenu drop',
      function () {
        if (inputFilter(this.value)) {
          this.oldValue = this.value;
          this.oldSelectionStart = this.selectionStart;
          this.oldSelectionEnd = this.selectionEnd;
        } else if (this.hasOwnProperty('oldValue')) {
          this.value = this.oldValue;
          this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
        } else {
          this.value = '';
        }
      }
    );
  };
})(jQuery);

function sendXmlRequest(type, url, params, onReadyFn) {
  var xmlhttp = new XMLHttpRequest();

  xmlhttp.open(type, url, true);
  xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      onReadyFn(this.responseText);
    }
  };
  xmlhttp.send(params);
}
