<?php

defined('C5_EXECUTE') or die('Access denied');

use Concrete\Core\Form\Service\Form;
use Concrete\Core\Support\Facade\Application;

use Concrete\Core\View\View;

/** @noinspection PhpUnhandledExceptionInspection */
View::element("dashboard/help_blocktypes", [], "link_theme");

/** @noinspection PhpUnhandledExceptionInspection */
View::element("dashboard/did_you_know", [], "link_theme");

/** @var string $label */
/** @var string $spotify */
/** @var string $youtube */
/** @var string $soundcloud */
/** @var string $apple */
/** @var string $deezer */
/** @var string $tidal */
/** @var string $amazon */
/** @var string $napster */
/** @var string $itunes */

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
    <?php echo $form->label("spotify", t("Spotify")); ?>
    <?php echo $form->text("spotify", $spotify); ?>
</div>

<div class="form-group">
    <?php echo $form->label("youtube", t("YouTube Music")); ?>
    <?php echo $form->text("youtube", $youtube); ?>
</div>

<div class="form-group">
    <?php echo $form->label("soundcloud", t("SoundCloud")); ?>
    <?php echo $form->text("soundcloud", $soundcloud); ?>
</div>

<div class="form-group">
    <?php echo $form->label("apple", t("Apple Music")); ?>
    <?php echo $form->text("apple", $apple); ?>
</div>

<div class="form-group">
    <?php echo $form->label("deezer", t("Deezer")); ?>
    <?php echo $form->text("deezer", $deezer); ?>
</div>

<div class="form-group">
    <?php echo $form->label("tidal", t("Tidal")); ?>
    <?php echo $form->text("tidal", $tidal); ?>
</div>

<div class="form-group">
    <?php echo $form->label("amazon", t("Amazon Music")); ?>
    <?php echo $form->text("amazon", $amazon); ?>
</div>

<div class="form-group">
    <?php echo $form->label("napster", t("Napster")); ?>
    <?php echo $form->text("napster", $napster); ?>
</div>

<div class="form-group">
    <?php echo $form->label("itunes", t("iTunes")); ?>
    <?php echo $form->text("itunes", $itunes); ?>
</div>
