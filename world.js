window.onload = function () {
    var country_btn = document.getElementById("countries");
    var city_btn = document.getElementById("cities");
    var request = new XMLHttpRequest();
    var result = document.getElementById("result");
    var search = document.getElementById("country");
    country_btn.addEventListener("click", function() {
        
        request.open("GET","http://localhost:8080/world.php?q=" + search.value + "&c=country",true);
        request.onreadystatechange = function () {
            if (this.DONE && this.status == 200) {
                result.innerHTML = request.responseText;
            }
        };
        request.send();
    });
    city_btn.addEventListener("click", function () {
        request.open("GET", "http://localhost:8080/world.php?q=" + search.value + "&c=city",true);
        request.onreadystatechange = function () {
            if (this.DONE && this.status == 200) {
                result.innerHTML = request.responseText;
            }
        };
        request.send();
    });
}