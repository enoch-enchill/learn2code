
<!-- Modal Structure -->
<div id="modal-dialog" class="modal modal-fixed-footer" data-controls-modal="modal-dialog" data-backdrop="static" data-keyboard="false" >
    <div class="modal-content">
        <h4 id="modal-dialog-title"></h4>
        <div id="modal-dialog-content"></div>
    </div>
    <div class="modal-footer">
        <a href="#!" id="modal-dialog-submit" class="waves-effect waves-green btn-flat default">Submit</a> 
        <a href="#!" id="modal-dialog-cancel" class="modal-action modal-close waves-effect waves-red btn-flat ">Cancel</a>
    </div>
</div>

<!--Footer-->
<footer class="page-footer white" id="me-footer">
    <div class="footer-copyright">
        <div class="left copyright-text">
            &copy;<?php echo date("Y"); ?> APSU USA
        </div>
        <div class="right resources-box">
            <ul>
                <li><a href="#">Terms</a></li>
                <li><a href="#">Privacy</a></li>
                <li><a href="#">Cookies</a></li>
                <li>By: <a href="https://www.nkunyim.net/" target="_blank">Nkunyim Technologies</a></li>
                <li id="scroll-top-dash"><i class="material-icons">arrow_upward</i></li>
            </ul>
        </div>
    </div>
</footer>
<!--End footer-->
<input type="hidden" hidden value="<?php echo ConstantsConfig::$api_base_url;?>" id="api-base-url" />
<?php
// ---------------------------------------
//      GET CURRENT USER
// ---------------------------------------
$user = null;
if(SessionConfig::get_user()){
    $user = SessionConfig::get_user();
}
?>
<input type="hidden" hidden value="<?php echo $user ? $user->id : "";?>" id="current-user-id" />