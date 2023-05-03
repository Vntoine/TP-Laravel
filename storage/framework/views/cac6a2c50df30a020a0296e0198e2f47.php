<div class="modal fade" id="modalmessage" tabindex="-1" role="dialog" aria-labelledby="ModalLabelMessage" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titremodal"></h5>
            </div>
            <div class="modal-body">
                <p id="messagemodal"></p>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {    });
function affichemodal(titre, message) 
{
    $decode=decodeHtml(message);
    document.getElementById('titremodal').innerText = titre;
    document.getElementById('messagemodal').innerText = $decode;
    $('#modalmessage').modal('show');
}
function decodeHtml(html) {
    // permet de modifier les variables html entity récupérés via js en code affichables
    var txt = document.createElement("textarea");
    txt.innerHTML = html;
    return txt.value;
}

</script><?php /**PATH C:\wamp64\www\wampassets\Mouezant_Laravel\resources\views/backoffice/modal/modalmessage.blade.php ENDPATH**/ ?>