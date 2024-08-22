document.getElementById('filterForm').addEventListener('submit', function (e) {
  e.preventDefault();
  var genero = document.getElementById('genero').value;
  if (genero) {
    window.location.href = '/series' + genero;
  } else if (genero === "todos") {
    window.location.href = '/';
  }
  else {
    window.location.href = '/';
  }
});