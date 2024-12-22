/********************************************************************************************************************************************* 
                                                    La page choisir membre()
présenter les membres adhérés au club 
afficher les activités souscrites par chaque membre 
*********************************************************************************************************************************************/

//affichage de la liste des activités souscrites lors du clique sur "Ses Activités"
$(document).ready(function() {
$(".activ").on("click", function (event){
    event.preventDefault();
    $('.affichage').empty();
    const clientId = $(this).data("client-id");
    $('.activities').addClass('show');
    //l'envoi de la requete AJAX qui nous permet de récupérer les données 
    $.ajax({
        type:"POST",
        url: "./servers/traitement_activ_membres.php",
        data: {client_id: clientId },
        success:function (response){
        try{
            // Parse la réponse 
            const data = JSON.parse( response);
            if(data.length > 0) $('p').remove();
            data.forEach(element => {
                $('.affichage').append(
                    `<li>${element.name} : ${element.saison}</li>`
                );
            });

            
        }catch(e){
            console.error("Erreur de parsing JSON :", e);
        }
        },
        error: function(response) { 
            console.log("error");
            }
    });
});
//fermeture de la liste des activités
$(".activities span").on('click', ()=>{
    $('.activities').removeClass('show');
});
});