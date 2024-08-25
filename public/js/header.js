document.getElementById('filterForm').addEventListener('submit', function (e) {
  e.preventDefault();
  var genero = document.getElementById('genero').value;
  if (genero) {
    window.location.href = '/series' + genero;
  }
  else {
    window.location.href = '/series';
  }
});