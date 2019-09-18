const inputs = Array.from(document.querySelectorAll('input'))
inputs.forEach(function (input) {
  input.addEventListener('blur', function (event) {
    var value = this.value;
    validiere(value);
  }, false)
})


function pruefeLaenge(array) {
    var ok = true;
    var index = 0;
    var laenge = array.length;
    while (index < laenge && ok) {
        if (array[index].length > 35) {
            ok = false
        }
        index++;
    }
    return ok;
}

function getArray(inputString){
    var array = inputString.split(',');
    return array;
}

function pruefeElemente(array){
    var result = true;
    if(array.length > 3){
        result = false;
    }
    return result;
}

function validiere(inputString){
    var error = false;
    var errorMessage = "";
    var array = getArray(inputString);
    if(!pruefeLaenge(array)){
        error = true;
        errorMessage = "Bitte die einzelnen Themen weniger als 35 Zeichen ";
    }else if(!pruefeElemente(array)){
        error = true;
        errorMessage += "Bitte nicht mehr als 3 Themen pro Tag ";
    }
    if(errorMessage != ""){
        alert(errorMessage);
    }
        
}

