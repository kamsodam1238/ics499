function dynamicTime() {
    const dt = new Date();

    var d = document.getElementById("currentDate");
    d.innerHTML = dt.toLocaleString();
    setTimeout(dynamicTime, 1000);
}