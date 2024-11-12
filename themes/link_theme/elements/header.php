<?php

defined('C5_EXECUTE') or die("Access Denied.");

use Concrete\Core\Entity\File\File;
use Concrete\Core\Entity\File\Version;
use Concrete\Core\Page\Page;
use Concrete\Core\Support\Facade\Application;
use Concrete\Core\Support\Facade\Url;
use Concrete\Core\View\View;

/** @var Page $c */
/** @var View $this */

$app = Application::getFacadeApplication();
$homePage = Page::getByID(Page::getHomePageID(Page::getCurrentPage()));

$profilePicture = null;
$profilePictureAltText = null;

$profileTitle = (string)$c->getAttribute("profile_title");
$profileBio = (string)$c->getAttribute("profile_bio");
$f = $c->getAttribute("profile_picture");

if ($f instanceof File) {
    $fv = $f->getApprovedVersion();

    if ($fv instanceof Version) {
        $profilePicture = $fv->getThumbnailURL("profile_picture");
        $profilePictureAltText = $fv->getTitle();
    }
}
?>

<?php /** @noinspection PhpUnhandledExceptionInspection */
$this->inc("elements/header_top.php"); ?>

<header>
    <?php if ($profilePicture !== null) { ?>
        <a href="<?php echo Url::to($homePage) ?>" class="profile-picture">
            <img src="<?php echo h($profilePicture); ?>" alt="<?php echo h($profilePictureAltText) ?>"/>
        </a>
    <?php } ?>

    <?php if (strlen($profileTitle) > 0) { ?>
        <h1 class="profile-title">
            <?php echo $profileTitle; ?>
        </h1>
    <?php } ?>

    <?php if (strlen($profileBio) > 0) { ?>
        <p class="profile-bio">
            <?php echo $profileBio; ?>
        </p>
    <?php } ?>
</header>