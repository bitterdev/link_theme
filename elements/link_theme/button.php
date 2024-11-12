<?php

use Concrete\Core\Support\Facade\Application;
use Concrete\Core\Utility\Service\Identifier;

defined('C5_EXECUTE') or die("Access Denied.");

/** @var string $label */
/** @var string $link */
/** @var array $links */

$app = Application::getFacadeApplication();
/** @var Identifier $idHelper */
/** @noinspection PhpUnhandledExceptionInspection */
$idHelper = $app->make(Identifier::class);
?>

<?php if (!empty($link) > 0) { ?>
    <a href="<?php echo $link; ?>" class="link-item" target="_blank">
        <?php echo $label; ?>
    </a>
<?php } else { ?>
    <?php $id = "ccm-" . $idHelper->getString(); ?>

    <div id="<?php echo h($id); ?>" class="d-none">
        <?php foreach ($links as $sublink) { ?>
            <?php if (strlen($sublink["link"]) > 0) { ?>
                <a href="<?php echo h($sublink["link"]); ?>" target="_blank" class="link-item">
                    <?php echo $sublink["name"]; ?>
                </a>
            <?php } ?>
        <?php } ?>
    </div>

    <a href="javascript:void(0);" class="link-item" data-link-container="<?php echo h($id); ?>">
        <?php echo $label; ?>
    </a>
<?php } ?>
