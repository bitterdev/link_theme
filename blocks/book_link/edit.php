<?php

defined('C5_EXECUTE') or die('Access denied');

use Concrete\Core\Form\Service\Form;
use Concrete\Core\Support\Facade\Application;

/** @var string $label */
/** @var string $apple */
/** @var string $amazon */
/** @var string $google */

use Concrete\Core\View\View;

/** @noinspection PhpUnhandledExceptionInspection */
View::element("dashboard/help_blocktypes", [], "link_theme");

/** @noinspection PhpUnhandledExceptionInspection */
View::element("dashboard/did_you_know", [], "link_theme");

$app = Application::getFacadeApplication();
/** @var Form $form */
/** @noinspection PhpUnhandledExceptionInspection */
$form = $app->make(Form::class);
?>

<div class="form-group">
    <?php echo $form->label("label", t("Label")); ?>
    <?php echo $form->text("label", $label); ?>
</div>

<div class="form-group">
    <?php echo $form->label("apple", t("Apple Books")); ?>
    <?php echo $form->text("apple", $apple); ?>
</div>

<div class="form-group">
    <?php echo $form->label("amazon", t("Amazon Books")); ?>
    <?php echo $form->text("amazon", $amazon); ?>
</div>

<div class="form-group">
    <?php echo $form->label("google", t("Google Books")); ?>
    <?php echo $form->text("google", $google); ?>
</div>
