/********************************************************************************************************************************************* 
                                                    La page d'accueil 
*********************************************************************************************************************************************/
$(document).ready(function() {
    //affichage et fermeture du side-menu après le click sur l'icone ham-menu en haut à droite 
$('#ham-menu').on("click", function(){
    // Récupérer la valeur actuelle de transform
    const currentTransform = $('#side-menu').css("transform");
    if(currentTransform === "none" || currentTransform === "matrix(1, 0, 0, 1, 0, 0)")
        $('#side-menu').css("transform","translateX(-100%)");
    else $('#side-menu').css("transform","translateX(0)");
});
    //fermeture du side menu après le click sur : ✖
$('#side-menu span').on("click",function(){
    $('#side-menu').css("transform","translateX(-100%)");
})

    //affichage dynamique des activités 
$('.grid div').each(function(index) {
    $(this).delay(index * 200).queue(function(next) {
        $(this).addClass('show');
        next();
    });
});


});