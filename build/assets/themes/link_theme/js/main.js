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