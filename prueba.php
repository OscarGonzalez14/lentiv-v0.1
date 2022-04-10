<!DOCTYPE html>
<html>
<body>

<form>
  <label>
    Campo 1
    <input type="text" tabindex="1" class="focusNext">
  </label>
  <br>
  <label>
    Campo 2
    <input type="text" tabindex="2" class="focusNext">
  </label>
  <br>
  <label>
    Campo 3
    <input type="text" tabindex="3" class="focusNext">
  </label>
  <br>
  <button tabindex="4">Enviar</button>
</form>

<script>	
document.addEventListener('keypress', function(evt) {

  // Si el evento NO es una tecla Enter
  if (evt.key !== 'Enter') {
    return;
  }
  
  let element = evt.target;

  // Si el evento NO fue lanzado por un elemento con class "focusNext"
  if (!element.classList.contains('focusNext')) {
    return;
  }

  // AQUI logica para encontrar el siguiente
  let tabIndex = element.tabIndex + 1;
  var next = document.querySelector('[tabindex="'+tabIndex+'"]');

  // Si encontramos un elemento
  if (next) {
    next.focus();
    event.preventDefault();
  }
});
</script>


 </body>
 </html>





