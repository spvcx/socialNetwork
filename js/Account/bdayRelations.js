function openDayMenu() {
    $("#daymenu").css('display', 'block');
}

function openMonthMenu() {
    $("#monthmenu").css('display', 'block');
}

function openYearMenu() {
    $("#yearmenu").css('display', 'block');
}

$(document).mouseup(function(e) {
    var monthmenu = $("#monthmenu");
    var daymenu = $("#daymenu");
    var yearmenu = $("#yearmenu");
    var dateInputs = [];
    dateInputs.push(monthmenu, yearmenu, daymenu);
    dateInputs.forEach((container) => {
        if (container.has(e.target).length === 0) {
            container.hide();
        }
    })
});

function setBday(day) {
    var bday = document.getElementById('bday');
    bday.value = day;
    $("#daymenu").hide();
}

function setMonth(month) {
    var bmonth = document.getElementById('bmonth');
    bmonth.value = month;
    $("#monthmenu").hide();
}

function setYear(year) {
    var byear = document.getElementById('byear');
    byear.value = year;
    $("#yearmenu").hide();
}