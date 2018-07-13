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
        var validCap            = false;

        var CaptchaEnter        = $("#CaptchaEnter").val();
        var randomfield         = $("#randomfield").val();

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
            add_err('#telefon','Numar de telefon invalid');
        }else{
            add_chk('#telefon');
        }

        if(email.length == 0 || $.trim(email) == '' || !isEmail(email)){
            valid = false;
            add_err('#email','Mail invalid');
        }else{
            add_chk('#email');  
        }

        if(!isNume(prenume) || $.trim(prenume) == '' || nume.length < 3){
            valid = false;
            add_err('#prenume','Prenume invalid');
        }else{
            add_chk('#prenume');  
        }

        if(!isNume(nume) || $.trim(nume) == '' || nume.length < 3){
            valid = false;
            add_err('#nume','Nume invalid');
        }else{
            add_chk('#nume');  
        }

        // Validare Captcha
        if(CaptchaEnter == randomfield){
            validCap = true;
            //~~~~~~~~~~~~~~CSS~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
            $("#CaptchaEnter").prop('disabled', true);
            $("#CaptchaEnter").removeClass("input-error");
            $("#CaptchaEnter").addClass("input-checked");
            $("#CaptchaEnter").val('');
            //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        }else{
            validCap = false;
            //~~~~~~~~~~~~~~~~~CSS~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
            $("#CaptchaEnter").prop('disabled', false);
            $("#CaptchaEnter").addClass("input-error");
            $("#CaptchaEnter").val('');
            //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        }


         // Daca valid == false form-ul nu va trimite inputurile
         if (validCap == false) {
            return false;
         }
         if (valid == false ) {
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
        function add_err(id, text){
            $(id).addClass('input-error');
            $(id).attr('placeholder', text);
            $(id).val('');
        }
        function add_chk(id){
            $(id).removeClass('input-error');
            $(id).removeAttr('placeholder');
            $(id).addClass('input-checked');  
        }
        //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

        // Resetam form-message
        $("#form-message").css('color', 'black');
        $("#form-message").html('');


        // ~~~~~~~~~~~~~~~Trimitem e-mail de confirmare~~~~~~~~~~~~~~
        // ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        // function sendMail() {
        //     $.ajax({
        //       type: 'POST',
        //       url: 'https://mandrillapp.com/api/1.0/messages/send.json',
        //       data: {
        //         'key': '836e7402582fabc8acfa4ba9e176d65f-us18',
        //         'message': {
        //           'from_email': 'gherghe_geani@yahoo.com',
        //           'to': [
        //               {
        //                 'email': email,
        //                 'name': nume,
        //                 'type': email
        //               }
        //             ],
        //           'autotext': 'true',
        //           'subject': 'Scoala de vara',
        //           'html': 'Salut,'+nume+'!<br>Te-ai inscris cu success la scoala de vara! Tinem sa-ti amintim ca te-ai inscris la urmatoarele cursuri<br>'+cursuri.values+'<br>Bafta mai departe!';
        //         }
        //       }
        //      }).done(function(response) {
        //        console.log(response);
        //      });
        // }
        //Trimitem e-mail
        //sendMail();  //
        //~~~~~~~~~~~~~~~

        //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

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