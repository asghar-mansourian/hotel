    function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
}
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
}
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

    // Get the element with id="defaultOpen" and click on it

    function myFunction() {
    var dots = document.getElementById("dots");
    var moreText = document.getElementById("more");
    var btnText = document.getElementById("myBtn");

    if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "<i class='fas fa-chevron-down'></i>";
    moreText.style.display = "none";
} else {
    dots.style.display = "none";
    btnText.innerHTML = "<i class='fas fa-chevron-up'></i>";
    moreText.style.display = "inline";
}
}
