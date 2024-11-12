import '@concretecms/bedrock/assets/bedrock/js/frontend';
import '@concretecms/bedrock/assets/account/js/frontend';
import '@concretecms/bedrock/assets/desktop/js/frontend';
import '@concretecms/bedrock/assets/forms/js/frontend';
import '@concretecms/bedrock/assets/navigation/js/frontend';
import '@concretecms/bedrock/assets/conversations/js/frontend';
import '@concretecms/bedrock/assets/imagery/js/frontend';
import '@concretecms/bedrock/assets/documents/js/frontend';
import Toastify from 'toastify-js'

window.Toastify = Toastify;

(function ($) {
    $(function () {
        $("[data-link-container]").click(function (e) {
            e.preventDefault();
            e.stopPropagation();

            $("#linkPopupDialog .modal-body")
                .html($("#" + $(this).data("linkContainer")).html())
            $("#linkPopupDialog .modal-title").html($(this).html())

            let popupDialog = new bootstrap.Modal(document.getElementById('linkPopupDialog'));

            popupDialog.show();

            return false;
        });
    });
})(jQuery);