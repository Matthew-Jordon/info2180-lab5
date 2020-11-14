window.onload = function () {
    var btn = document.getElementById("lookup");
    var request = new XMLHttpRequest();
    var result = document.getElementById("result");
    btn.addEventListener("click", function() {
        var search = document.getElementById("country").value;
        request.open("GET","http://localhost:8080/world.php?q=" + search,true);
        request.onreadystatechange = function () {
            if (this.DONE && this.status == 200) {
                result.innerHTML = request.responseText;
            }
        };
        request.send();
    });
}