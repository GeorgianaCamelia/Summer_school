// //include jQuery lib
// var script = document.createElement('script');
 
// script.src = 'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js';
// document.getElementsByTagName('head')[0].appendChild(script); 

$(document).ready(function(){

    //Validation code below !
    var invalid = false;

    //Verificam daca inputurile pentru nume si prenume
    $("#nume, #prenume").blur(function(){
        $(this).removeClass('input-error');
        $(this).removeClass('input-checked');  
        var nameFilter = /^[a-zA-Z]+$/;
        if($(this).val() == null || $(this).val() == undefined || $(this).val() == "" || $.trim($(this).val()) == '' || !nameFilter.test($(this).val())){
            invalid = true;
            $(this).addClass('input-error');
            $(this).attr('placeholder', 'Te rugam sa completezi acest camp!');
            $(this).focus(function(){
                $(this).removeClass('input-error');
                $(this).removeAttr('placeholder');
            });
        }
        else {
            $(this).addClass('input-checked');
        }
    });
        //verificam emailul
    $("#email").blur(function(){
        $(this).removeClass('input-error');
        $(this).removeClass('input-checked');  
        var emailFilter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        if (!emailFilter.test($("#email").val())) {
            invalid = true;
            $(this).addClass('input-error');
            $(this).attr('placeholder', 'E-mail invalid! Te rugam sa reintroduci e-mailul!');
            $(this).focus(function(){
                $(this).removeClass('input-error');
                $(this).removeAttr('placeholder');
            });
        }else {
            $(this).addClass('input-checked');  
        }
    });
    
    //phone number validation
    $("#telefon").blur(function(){
        $(this).removeClass('input-error');
        $(this).removeClass('input-checked');
        var phoneFilter = /^[0-9-+]+$/;
        if(!phoneFilter.test($(this).val()) || $(this).val().length != 10) {
            invalid = true;
            $(this).addClass('input-error');
            $(this).attr('placeholder', 'Numar de telefon invalid!');
            $(this).focus(function(){
                $(this).removeClass('input-error');
                $(this).removeAttr('placeholder');
                });
        }else {
            $(this).addClass('input-checked');  
        } 
    });

    //verificam daca s-a ales cel putin un curs

    
    $("#form-submit").click(function(){
        var value = $("[name=form-chkbx]:checked").length;
        alert(value);
        if(value == 0){
            alert("nu a fost selectat nici un curs");
            invalid = true;
        }
        else {
            var cursuri = new Array();
            $("input:checked").each(function() {
            cursuri.push($(this).val());
            });
        }
        

        if(invalid == false){
            alert("datele se trimit...");
            var nume = $("#nume").val();
            var prenume = $("#prenume").val();
            var email = $("#email").val();
            var telefon = $("#telefon").val();
            var ocupatie = $("#ocupatie").val();
            var submit = $("#form-submit").val();
            var cursuri_json = JSON.stringify(cursuri);
            
            $.post("includes/submit.php", {
                nume: nume, 
                prenume: prenume,
                email: email,
                telefon: telefon,
                ocupatie: ocupatie,
                cursuri: cursuri_json,
                submit: submit
        });
        }else{
            alert("CAMPURI INVALIDE");
        }
               
    });
});