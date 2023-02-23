function newGenre(){
    var check = document.getElementById('genre').value
    if(check == -1){
        var newgenre = document.getElementById('newgenre')
        newgenre.classList.remove('displaynone')
        newgenre.classList.add('animation')
    }
}
