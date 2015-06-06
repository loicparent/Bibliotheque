//au chargement de la page
$(document).ready(function(){ 
    // Quand on clique sur le bouton 'backToTop', on effectue la fonction:
    // $('.backToTop').click(function(){ 
    //     $('html,body').animate({scrollTop: 0},'slow'); 
    // }); 



    // Code qui gère le menu en petit écran:

    $('.tinyMenu-button').click(function(e){
        e.preventDefault();
        $('body').toggleClass('tiny-Menu');
    })

    // Code qui gère le div cache => en petit écran:
    $('.site-cache').click(function(e) {
        $('body').removeClass('tiny-Menu');
    })
    
});