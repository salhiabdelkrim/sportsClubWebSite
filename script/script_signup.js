/********************************************************************************************************************************************* 
                                                        La page rejoindre(signup.php)
Vérifier que les champs ne sont pas vide
Vérifier que l'adresse email ou l'indentifiant ne sont pas déjà utilisé 
*********************************************************************************************************************************************/
$(document).ready(function() {

$('#adhesion_form').on("click", ()=>{
    $('section>p').text("");
} );
//vérification que les deux mots de passe sont identiques et que les champs ne sont pas vides 
$("#adhesion_form").off("submit").submit( function (event){
    if($('input[name="client_id"]').val().trim() === "" ){
        event.preventDefault();
        $('#defaut1').text("Merci de renseigner votre nom d'utilisateur ");
    }else if($('input[name="firstname"]').val().trim() === "" ){
        event.preventDefault();
        $('#defaut2').text('Merci de renseigner votre prénom ');
    }else if($('input[name="lastname"]').val().trim() === ""){
        event.preventDefault();
        $('#defaut3').text('Merci de renseigner le nom de famille ');
    }else if(!($('#homme:checked').length) && !($('#femme:checked').length)){
        event.preventDefault();
        $('#defaut4').text("Merci de renseigner votre sexe ");
    }else if($('input[name="age"]').val().trim() === ""){
        event.preventDefault();
        $('#defaut5').text("Merci de renseigner l'age ");
    }else if($('input[name="email"]').val().trim() === ""){
        event.preventDefault();
        $('#defaut6').text("Merci de renseigner l'email' ");
    }
} );

//Retrait des messages d erreurs quand on commence à écrire ou remplir les champs 
//ou quand on rénitialise le formulaire
$("#adhesion_form").on('reset', ()=> {
    document.querySelectorAll("i").forEach(element => {
        element.innerHTML="";
    });
});
$('input[name="client_id"]').on("keyup", ()=>{
    $('#defaut1').text("");
    //vérification à l'aide d'AJAX si le nom d'utilisateur rentré est déjà utilisé ( client déjà inscrit )
    $.ajax({
        type: "POST",
        url: "./servers/id_checker.php",
        data: {client_id :  $('input[name="client_id"]').val()},
        success: function(response) { 
            try {
                // Parse la réponse 
                const data = JSON.parse( JSON.stringify(response));
                // Vérifie si le'username' existe 
                if (data.existe === 1 ) {
                    $('#defaut1').text("le nom d'utilisateur saisi est déjà utilisé");
                } else {
                    $('#defaut1').text("");
                }
            } catch (e) {
                console.error("Erreur de parsing JSON :", e);
            }
            },
        error: function(response) { 
            console.log("error");
            }
    });
});
$('input[name="firstname"]').on("keyup", ()=>{
    $('#defaut2').text("");
});
$('input[name="lastname"]').on("keyup", ()=>{
    $('#defaut3').text("");
});
$("input[name='sexe']").on("change", ()=>{
    if ($('#homme').is(':checked') || $('#femme').is(':checked')) 
        $('#defaut4').text("");
} );
$('input[name="age"]').on("input", ()=>{
    $('#defaut5').text("");
});
$('input[name="email"]').on("keyup", ()=>{
    $('#defaut6').text("");

     //vérification à l'aide d'AJAX si l'email rentré est déjà utilisé ( client déjà inscrit )
     $.ajax({
        type: "POST",
        url: "./servers/email_checker.php",
        data: {email :  $('input[name="email"]').val()},
        success: function(response) { 
            
            try {
                // Parse la réponse 
                const data = JSON.parse( JSON.stringify(response));
                // Vérifie si le'username' existe 
                if (data.existe === 1 ) {
                    $('#defaut6').text("l'email saisi est déjà utilisé, vous etes déjà inscrit");
                } else {
                    $('#defaut6').text("");
                }
            } catch (e) {
                console.error("Erreur de parsing JSON :", e);
            }
            },
        error: function(response) { 
            console.log("error");
            }
    });
});
    

$('input[name="password"]').on("keyup", ()=>{
    $('#defaut7').text("");
});
$('input[name="password_confirmation"]').on("keyup", ()=>{
    $('#defaut8').text("");
});
});