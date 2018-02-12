function pullMainData() {
    var firstName = document.getElementById('firstname').value;
    var lastName = document.getElementById('lastname').value;
    var relations = document.getElementById('relations').value;
    var city = document.getElementById('city').value;
    var website = document.getElementById('website').value;
    var id = document.getElementById('memValue').value;
    var bday = document.getElementById('bday').value;
    var bmonth = document.getElementById('bmonth').value;
    var byear = document.getElementById('byear').value;
    //console.log('id: ' + id + ' firstname: ' + firstName + ' lastname: ' + lastName + ' relations: ' + relations + ' city: ' + city);
    if (firstname && lastName) {
        $.ajax({
            method: "POST",
            url: 'editdata.php',
            data: { maindata: 'main', id: id, firstname: firstName, lastname: lastName, relations: relations, city: city, website: website, bday: bday, bmonth: bmonth, byear: byear }
        }).done(function(data) {
            ndata = data.replace(/\s*/g,'');
            console.log(ndata);

        });
    }


}

function pullInterestsData() {
    var about = document.getElementById('about').value;
    var interests = document.getElementById('interests').value;
    var music = document.getElementById('music').value;
    var tvshow = document.getElementById('tvshow').value;
    var books = document.getElementById('books').value;
    var games = document.getElementById('games').value;
    var id = document.getElementById('memValue').value;

    $.ajax({
        method: "POST",
        url: 'editdata.php',
        data: { interests: 'i', id: id, about: about, interests: interests, music: music, tvshow: tvshow, books: books, games: games }
    }).done(function(data) {
        ndata = data.replace(/\s*/g,'');
        console.log(ndata);

    });
}