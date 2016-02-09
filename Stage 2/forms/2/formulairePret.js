$(document).ready(function() {
///////////////////////////////////// gestion du bouton entrer pour pas submit    
    $('form').bind("keypress", function(e) {
        {
            if (e.keyCode === 13) {
                e.preventDefault();
                return false;
            }
        }
    });





/////////////////////////////////////////////// gestion des inputs suplémentaire
    var i = 0;
    var j = 0;
   $('#creerReven').click(function() {        j++;        $('#AddRevenus').append('<label for="autresRevenus' + j + '">Autres revenus</label> <input class="nombre" type="text"name="autresRevenus' + j + '" />€ ');    });    $('#creerCharges').click(function() {        i++;        $('#addCharges').append('<label for="autresCharges' + i + '">Autres charges</label> <input class="nombre" type="text" name="autresCharges' + i + '" />€ ');    });

////////////////////////////////////////gestion de demande de recherche de biens
    $('.aaa').change(function() {
        var achat = $('input[type=radio][name=compromis]:checked').attr('value');
        // console.log(achat);
        if (achat === 'sous 30 jours' || achat === 'sous 3 mois') {
            $('.recherche').css("display", "inline-block");

        }
         else if (achat === 'rachat pret immobilier'|| achat==='rachat pret consommation') {
            $('.rachatPret').css("display", "inline-block");
            $('#budget').css("display", "none");

        }
        else {
            $('.recherche').css("display", "none");
            $('#budget').css("display", "inline-block");


        }
    });


    $('#compromis').click(function(){
        var achat = $('input[type=radio][name=compromis]:checked').attr('value');
        console.log(achat);
        if (achat === 'sous 30 jours' || achat === 'sous 3 mois') {
            $('.recherche').css("display", "inline-block");

        }
    });


    //////////////////////////////////////////////Gestion bouton  aide recherche
    $('#yep').click(function() {
        $('#rechercheInput').css("display", "inline-block");
    });
    $('#nop').click(function() {
        $('#rechercheInput').css("display", "none");
    });







///////////////////////////////////////////////////////////gestion des conjoints   	 $('.selecteur').change(function() {        var situation = $('input[type=radio][name=situation]:checked').attr('value');        // console.log(achat);        if (situation === 'Pacs' || situation === 'Maries sans contrat' || situation === 'Maries separation Biens' || situation === 'Union libre') {            $('.conjoint').css("display", "inline-block");        }        else {            $('.conjoint').css("display", "none");        }    });

/////////////////////////////////////////////////////////gestion Nom jeune fille   
    $('#civiliteConjoint').change(function() {
        var civiliteConjoint = $("#civiliteConjoint option:selected").text();
        if (civiliteConjoint === 'Madame') {
            $('#jeuneFille').css("display", "inline-block");

        }
        else {
            $('#jeuneFille').css("display", "none");

        }
    });


///////////////////////////////////////////////////////////gestion MCARRE  
    $('#maison').change(function() {
        var situation = $("#maison option:selected").text();

        if (situation === 'Immeuble de rapport nu' || situation === 'Immeuble de rapport meublé' || situation === 'Immeuble de rapport habitation et commerce') {
            $('#nbrLogement').css("display", "inline-block");

        }
        else {
            $('#nbrLogement').css("display", "none");


        }
    });



    $('#nbLogement').change(function(){
        $("#mcarre").empty();
        var nblogement= $('#nbLogement  option:selected').val();
        var nblogementNB= parseInt(nblogement)+ 1;
            console.log(nblogement);

        for ( var i=1; i < nblogementNB; i++ ){
            $("#mcarre").css('display', 'inline-block');
            $("#mcarre").append('Superficie du logement '+ i+' : <input type="text" name="mcarre'+ i+'" ><br>');
            // console.log(nblogementNB);

        }

    });


});


