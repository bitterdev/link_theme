<?php

defined('C5_EXECUTE') or die("Access Denied.");

use Concrete\Core\Entity\Sharing\SocialNetwork\Link;

/** @var Link[] $links */

?>

<?php foreach ($links as $link) { ?>
    <a href="<?php echo $link->getURL(); ?>" target="_blank" class="social-icon">
        <?php echo $link->getServiceIconHTML(); ?>
    </a>
<?php } ?>
