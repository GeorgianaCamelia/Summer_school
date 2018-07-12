$(document).ready(function(){
    //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    //~~~~~~~~~VALIDARI INAINTE DE SUBMIT~~~~~~~~~~~~
    //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    $("#nume, #prenume, #email, #telefon").blur(function(){
        $(this).removeClass('input-error');
        if($(this).val() == null || $(this).val() == undefined || $(this).val() == "" || $.trim($(this).val()) == ''){
            $(this).addClass('input-error');
            $(this).attr('placeholder', 'Te rugam sa completezi acest camp!');
            $(this).focus(function(){
                $(this).removeClass('input-error');
                $(this).removeAttr('placeholder');
            });
        }
    });
    //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    $("#form-reg").submit(function(event){
        event.preventDefault();
        // Presupunem in prima faza ca inputurile utilizatorului sunt valide
        var valid               = true;

        var nume                = $("#nume").val();
        var prenume             = $("#prenume").val();
        var email               = $("#email").val();
        var telefon             = $("#telefon").val();
        var ocupatie            = $("#ocupatie").val();
        var submit              = $("#submit").val();
        var cursuri             = $("input:checkbox[name='cursuri[]']:checked").map(function(){
                                    return this.value;
                                }).get();

        //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        $("#form-message").html('');
        //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

        // ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        // ~~~~~~~~~~~~~~~~~~VALIDARI DUPA SUBMIT~~~~~~~~~~~~~~~~~~~
        // ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        
        
        if(cursuri.length == 0){ 
            valid = false;
            $("#form-message").css('color', 'red');
            $("#form-message").html('Selecteaza unul sau mai multe cursuri!');
        }

        if (ocupatie == 'alege') {
            valid = false;
            $("#form-message").css('color', 'red');
            $("#form-message").html('Te rugam sa selectezi ocupatia actuala!');
        }

        if(telefon.length != 10 || !isPhoneNumber(telefon)){
            valid = false;
            $("#form-message").css('color', 'red');
            $("#form-message").html('Numar de telefon invalid!');
        }

        if(email.length == 0 || $.trim(email) == '' || !isEmail(email)){
            valid = false;
            $("#form-message").css('color', 'red');
            $("#form-message").html('E-mail invalid!');
        }

        if(!isNume(prenume)){
            valid = false;
            $("#form-message").css('color', 'red');
            $("#form-message").html('Prenume invalid!');
        }
        if(!isNume(nume)){
            valid = false;
            $("#form-message").css('color', 'red');
            $("#form-message").html('Nume invalid!');
        }

         // Daca valid == false form-ul nu va trimite inputurile
         if (valid == false) {
            return false;
        }

        //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        //~~~~~~~~~FUNCTII UTILE PENTRU VALIDAREA DATELOR~~~~~~~~~~~
        //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        function isPhoneNumber(ph){
            var filter = /^([0-9])\w+/;
            return filter.test(ph);
        }
        function isEmail(em) {
            var filter = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return filter.test(em);
        }
        function isNume(n){
            var filter = /^[a-zA-Z]+$/;
            return filter.test(n);
        }
        //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

        // Resetam form-message
        $("#form-message").css('color', 'black');
        $("#form-message").html('');

        // Dupa validare trimitem inputurile catre submit.php unde urmeaza sa fie prelucrate
        $("#form-message").load("includes/submit.php", {
            nume: nume,
            prenume: prenume,
            email: email,
            telefon: telefon,
            ocupatie: ocupatie,
            cursuri: cursuri,
            submit: submit
        });
    });
   
});