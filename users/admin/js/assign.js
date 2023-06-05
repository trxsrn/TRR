function fetchData(id) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("assign").style.display = "block";
        }
    };
    xhttp.open("GET", "papers.php?id=" + id, true);
    xhttp.send();
}
