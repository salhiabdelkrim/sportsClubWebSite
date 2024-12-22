/********************************************************************************************************************************************* 
                                                    La page choisir une activité()
Permettre au client de souscrire à une activité au cas où il est connecté 
Affichage du formulaire de Connexion après souscription d'un client non connecté 
Redirection vers la page (signup.php) pour un utilisateur non inscrit 
*********************************************************************************************************************************************/

//affichage du formulaire de Souscription après le click sur "Ajouter au panier"
$(document).ready(function() {
$(document).on("click", ".ajout_panier", function () {
    $('.confirmation').addClass('show');
});
//fermeture du formulaire de souscription 
$(".confirmation span").on('click', ()=>{
    $('.confirmation').removeClass('show');
});

//avant de soumettre la souscription on vérifie si les champs sont remplies 
$("#souscription_form").off("submit").submit(function (event){
    if($('#client_id').val() === "" ){
        event.preventDefault();
        $('#erreur1').text('Merci de renseigner un identifiant ');
    }else if($('input[type="date"]').val() === ""){
        event.preventDefault();
        $('#erreur2').text('Merci de renseigner la date ');
    }
});

//retrait des messages d'erreur au debut de remplissage d'un input
$('#client_id').on('keyup', ()=>{
    $('#erreur1').text('');
    //vérification avec ajax si l'activité est déjà souscrite 
    $.ajax({
        type: "POST",
        url: "./servers/activity_checker.php",
        data: {
            activity_id :  $('#activity_id').val(),
            client_id : $('#client_id').val()
        },
        success:function(response) {    
            try {
                // Parse la réponse 
                const data = JSON.parse(JSON.stringify(response));
                // Vérifie si l'activité existe déjà
                if (data[10] == 1 ) {
                    $("#erreur0").text("l'activité est déjà souscrite");
                } else if (data[10] == 0 ){
                    $("#erreur0").text("");
                    
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
$('input[type="date"]').on('change', ()=>{
    $('#erreur2').text('');
});

//retrait d'un message si l'activité est changée par l'utilisateur
$('#activity_id').on('change', ()=>{
    let element=document.getElementById('hide');
    setTimeout(function() {
       if(element) element.style.opacity=0;
    },100 );
    //vérification avec ajax si l'activité est déjà souscrite 
    $.ajax({
        type: "POST",
        url: "./servers/activity_checker.php",
        data: {
            activity_id :  $('#activity_id').val(),
            client_id : $('#client_id').val()
        },
        success:function(response) {    
            try {
                //Parse la réponse 
                const data = JSON.parse(JSON.stringify(response));
                console.log(data);
                //Vérifie si l'activité existe déjà
                if (data[10] == 1 ) {
                    $("#erreur0").text("l'activité est déjà souscrite");
                } else if (data[10] == 0 ){
                    $("#erreur0").text("");
                    
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
});