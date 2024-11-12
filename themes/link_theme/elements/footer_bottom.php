<?php

defined('C5_EXECUTE') or die("Access Denied.");

use Concrete\Core\Page\Page;
use Concrete\Core\View\View;
use Concrete\Core\Support\Facade\Application;
use Concrete\Core\Html\Service\Html;

/** @var Page $c */
/** @var View $view */

$app = Application::getFacadeApplication();
/** @var $htmlHelper Html */
$htmlHelper = $app->make(Html::class);
?>
<div class="modal fade" id="linkPopupDialog" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">&nbsp;</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

            </div>
        </div>
    </div>
</div>
</div>

<?php /** @noinspection PhpUnhandledExceptionInspection */
View::element('footer_required'); ?>

<?php echo $htmlHelper->javascript($view->getThemePath() . "/js/main.js"); ?>
</body>
</html>