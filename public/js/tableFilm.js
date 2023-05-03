function operateFormatter(value, row, index) {
    // permet de charger la dernière colonne de notre table avec les icones en attachant les fonctions javascript
    return [
        '<a class="video" href="javascript:void(0)" title="video">',
    '<i class="fa-solid fa-video"></i>',
    '</a> - ',
    '<a class="synops" href="javascript:void(0)" title="synops">',
    '<i class="fa-solid fa-circle-info"></i>',
    '</a>  '
        
    ].join('');
}
window.operateEvents = {
    // sur le clic des icones permet de charger les modal et de les afficher
    'click .video': function (e, value, row, index) {
    // change la src de l'iframe pour la vidéo youtube
    //alert("You click video action, row: " + JSON.stringify(row))
    //alert("You click Vidéo action, row: " + row['bandeAnnonce']);
    var $ba=row['bandeAnnonce'];
    $ba = $ba.replace("watch?v=", "embed/"); // obligatoire pour afficher des videos youtube dans un site
    document.getElementById('iframeyt').setAttribute("src",$ba+"?enablejsapi=1"); // obligatoire pour pouvoir agir sur la video avec du javascript
    $('#ytModal').modal('show');
    },
    'click .synops': function (e, value, row, index) {
        // charge le html du p de la modal en modifiant  les html entity modifiés via le javascript
        //alert("You click Synopsys action, row: " + JSON.stringify(row))
        var $syn=decodeHtml(row['synopsis']);
        document.getElementById('titremodal').innerText = 'Synopsis du Film';
        document.getElementById('messagemodal').innerText = $syn;
        $('#modalmessage').modal('show');
    }
}
function stopyt()
{
    // permet de stopper la video youtube appelée lors de la fermeture de la modal sur le bouton close
    $('#iframeyt')[0].contentWindow.postMessage('{"event":"command","func":"' + 'stopVideo' + '","args":""}', '*');
}
