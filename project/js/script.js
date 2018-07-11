function ChangeCaptcha() {
    var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";
    var string_length = 6;
    var ChangeCaptcha = '';
    for (var i=0; i<string_length; i++) {
        var rnum = Math.floor(Math.random() * chars.length);
        ChangeCaptcha += chars.substring(rnum,rnum+1);
    }
    document.getElementById('randomfield').value = ChangeCaptcha;
}
function check() {
    if(document.getElementById('CaptchaEnter').value == document.getElementById('randomfield').value ) {
        window.open( ); // Pagina care trebuie afisata
    }
    else {
        alert('Reintrodu codul captcha');
}
}