<?php

defined('C5_EXECUTE') or die('Access denied');

use Concrete\Core\Application\Service\FileManager;
use Concrete\Core\Form\Service\Form;
use Concrete\Core\Form\Service\Widget\PageSelector;
use Concrete\Core\Support\Facade\Application;

use Concrete\Core\View\View;

/** @noinspection PhpUnhandledExceptionInspection */
View::element("dashboard/help_blocktypes", [], "link_theme");

/** @noinspection PhpUnhandledExceptionInspection */
View::element("dashboard/did_you_know", [], "link_theme");

$linkTypes = [
    "page" => t("Page"),
    "file" => t("File"),
    "external" => t("External URL")
];

/** @var string $label */
/** @var string|null $linkType */
/** @var string|null $externalLink */
/** @var int|null $cID */
/** @var int|null $fID */

$app = Application::getFacadeApplication();
/** @var Form $form */
/** @noinspection PhpUnhandledExceptionInspection */
$form = $app->make(Form::class);
/** @var PageSelector $pageSelector */
/** @noinspection PhpUnhandledExceptionInspection */
$pageSelector = $app->make(PageSelector::class);
/** @var FileManager $fileManager */
/** @noinspection PhpUnhandledExceptionInspection */
$fileManager = $app->make(FileManager::class);

?>

<div class="form-group">
    <?php echo $form->label("label", t("Label")); ?>
    <?php echo $form->text("label", $label); ?>
</div>

<div class="form-group">
    <?php echo $form->label("linkType", t("Link Type")); ?>
    <?php echo $form->select("linkType", $linkTypes, $linkType); ?>
</div>

<div class="form-group" data-link-type="external">
    <?php echo $form->label("externalLink", t("External Link")); ?>
    <?php echo $form->text("externalLink", $externalLink); ?>
</div>

<div class="form-group" data-link-type="page">
    <?php echo $form->label("cID", t("Page")); ?>
    <?php echo $pageSelector->selectPage("cID", $cID); ?>
</div>

<div class="form-group" data-link-type="file">
    <?php echo $form->label("fID", t("File")); ?>
    <?php echo $fileManager->file("fID", "fID", t("Please select"), $fID); ?>
</div>

<script>
    (function($) {
        $(function(){
            $("#linkType").change(function (e) {
                e.preventDefault();
                e.stopPropagation();

                let selectedLinkType = $("#linkType").val();

                $("[data-link-type]").each(function () {
                    let linkType = $(this).data("linkType")

                    if (linkType === selectedLinkType) {
                        $(this).removeClass("d-none");
                    } else {
                        $(this).addClass("d-none");
                    }
                });
                return false;
            }).trigger("change");
        });
    })(jQuery);
</script>
