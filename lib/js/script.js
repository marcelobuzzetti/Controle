function preenche(a, b) {
    $("#" + b).removeAttr("required");
    $("#" + a).submit();
}

function imprimir() {
    self.print();
}
