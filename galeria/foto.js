// foto.js
var select = document.querySelector('select');

select.addEventListener('change', function() {
    var img = document.querySelector('img');
    if (this.value === "") {
        img.style.display = 'none';
        return;
    }
    img.src = 'imagem/' + select.value;
    img.style.display = 'block';
});