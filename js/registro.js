function comp() {
    $("#btnSubmit").removeAttr("disabled");;
    $("#errorPassword").css("display", "none");
    $("#errorEmail").css("display", "none");

    if ($("#txtEmail1").val() != $("#txtEmail2").val()) {
        $("#btnSubmit").attr("disabled", "true");
        $("#errorEmail").css("display", "block");
    }

    if ($("#txtPassword1").val() != $("#txtPassword2").val()) {
        $("#btnSubmit").attr("disabled", "true");
        $("#errorPassword").css("display", "block");
    }

}

function tarjetaVal() {
    $("#icon").removeClass("fa-cc-visa");
    $("#icon").removeClass("fa-cc-mastercard");
    $("#icon").removeClass("fa-cc-amex");
    var txt = $("#tarjeta").val();
    if (txt.length > 1) {
        var split = txt.split("");
        txt = split[0] + split[1];
        if (split[0] == 4) $("#icon").addClass("fa-cc-visa");
        if (txt == "34" || txt == "37") $("#icon").addClass("fa-cc-amex");
        if (txt >= 51 && txt <= 55) $("#icon").addClass("fa-cc-mastercard");
        txt = split[0] + split[0];
    }
}