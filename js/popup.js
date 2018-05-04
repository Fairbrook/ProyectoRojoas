function insertTranslation(){
    new google.translate.TranslateElement({ pageLanguage: 'es', includedLanguages: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE }, '');
}

function googleTranslateElementInit() {
    if(getCookie("idioma")=="ing"){
        insertTranslation();
    } else if (getCookie("idioma") == ""){
        $(document).ready(function () {
            $(".pop-up").show();
            $("#ing").click(function () {
                setCookie("idioma", "ing", 3);
                setCookie("googtrans", "/es/en", 3);
                insertTranslation();
                $(".pop-up").hide();
            })
            $("#esp").click(function(){
                setCookie("idioma", "esp", 3);
                $(".pop-up").hide();
            });
        });
    }
}