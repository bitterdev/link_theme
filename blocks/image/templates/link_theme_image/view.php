<?php

defined('C5_EXECUTE') or die('Access Denied.');

use Concrete\Core\File\Image\BasicThumbnailer;
use Concrete\Core\File\Image\Thumbnail\Type\Type;
use Concrete\Core\Html\Image;
use Concrete\Core\Html\Object\Picture;
use Concrete\Core\Support\Facade\Application;
use HtmlObject\Element;
use HtmlObject\Image as HtmlImage;

$app = Application::getFacadeApplication();

/**
 * @var Concrete\Core\Block\View\BlockView $this
 * @var Concrete\Core\Block\View\BlockView $view
 * @var Concrete\Core\Area\SubArea $a
 * @var Concrete\Core\Entity\Block\BlockType\BlockType $bt
 * @var Concrete\Core\Block\Block $b
 * @var Concrete\Block\Image\Controller $controller
 * @var Concrete\Core\Form\Service\Form $form
 * @var int $bID
 *
 * @var bool $cropImage
 * @var int $maxWidth
 * @var int $maxHeight
 * @var string $sizingOption
 * @var Concrete\Core\Entity\File\File|null $f
 * @var Concrete\Core\Entity\File\File|null $foS
 * @var array $imgPaths May be empty, or may contain two strings (with keys 'default' and 'hover')
 * @var string $altText
 * @var string|null $title
 * @var string $linkURL
 * @var bool $openLinkInNewWindow
 * @var array $selectedThumbnailTypes Array keys are the breakpoint handles, array values are the breakpoint IDs
 * @var array $themeResponsiveImageMap Array keys are the responsive breakpoint names, array values are the widths.
 * @var Concrete\Core\Page\Page $c
 */

if (is_object($f) && $f->getFileID()) {
    $imageTag = new HtmlImage();

    $fv = $f->getApprovedVersion();
    $imageTag->setAttribute("src", $fv->getThumbnailURL("video_thumbnail"));
    $imageTag->addClass('img-fluid bID');

    if ($altText) {
        $imageTag->alt(h($altText));
    } else {
        $imageTag->alt('');
    }

    $linkTag = new Element("a");
    $linkTag->setAttribute("href", $linkURL);
    $linkTag->addClass("image");
    $linkTag->setChild($imageTag);

    if ($title) {
        $titleElement = new Element("div");
        $titleElement->addClass("title");
        $titleElement->setValue($title);
        $linkTag->appendChild($titleElement);
    }

    if ($openLinkInNewWindow) {
        $linkTag->setAttribute("target", "_blank");
        $linkTag->setAttribute("rel", "noopener noreferrer");
    }

    echo $linkTag;

} elseif ($c->isEditMode()) { ?>
    <div class="ccm-edit-mode-disabled-item">
        <?php echo t('Empty Image Block.'); ?>
    </div>
<?php } ?>