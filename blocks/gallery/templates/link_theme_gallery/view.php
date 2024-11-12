<?php

defined('C5_EXECUTE') or die('Access Denied.');

use Concrete\Core\Entity\File\File;
use Concrete\Core\Entity\File\Version;

$images = $images ?? [];

?>

<div class="image-gallery">
    <?php foreach ($images as $image) { ?>
        <?php if ($image['file'] != null) { ?>
            <?php if ($image['file'] instanceof File) { ?>
                <?php $fv = $image['file']->getApprovedVersion(); ?>
                <?php if ($fv instanceof Version) { ?>
                    <img src="<?php echo $fv->getThumbnailURL("gallery_thumbnail"); ?>"
                         alt="<?php echo h($fv->getTitle()); ?>">

                <?php } ?>
            <?php } ?>
        <?php } ?>
    <?php } ?>
</div>
