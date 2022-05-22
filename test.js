function test() {
  var num = document.getElementById("num").value;
  if (
    num.substring(0, 3) != "4SI" ||
    num.substring(4) == "0" ||
    isNaN(num.substring(3))
  ) {
    alert("verifier num eleve");
    return false;
  }
  var DC = document.getElementById("DC").value;
  var DS = document.getElementById("DS").value;
  if (DC.length == 0 || isNaN(DC) || parseInt(DC) < 0 || parseInt(DC) > 20) {
    alert("verifier DC");
    return false;
  }
  if (DS.length == 0 || isNaN(DS) || parseInt(DS) < 0 || parseInt(DS) > 20) {
    alert("verifier DS");
    return false;
  }
  var mat = document.getElementById("mat").value;
  if (mat == "0") {
    alert("choisir matiere");
    return false;
  }
}

function verif2() {
  var num = document.getElementById("num").value;
  if (
    num.substring(0, 3) != "4SI" ||
    num.substring(4) == "0" ||
    isNaN(num.substring(3))
  ) {
    alert("verifier num eleve");
    return false;
  }
}
