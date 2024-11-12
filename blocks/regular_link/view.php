<?php

defined('C5_EXECUTE') or die('Access denied');

use Concrete\Core\Entity\File\Version;
use Concrete\Core\File\File;
use Concrete\Core\Page\Page;
use Concrete\Core\Support\Facade\Url;
use Concrete\Core\Entity\File\File as FileEntity;
use Concrete\Core\View\View;

/** @var string $label */
/** @var string|null $linkType */
/** @var string|null $externalLink */
/** @var int|null $cID */
/** @var int|null $fID */

$link = null;

if ($linkType === "page") {
    $link = Url::to(Page::getByID($cID));
} else if ($linkType === "file") {
    $f = File::getByID($fID);

    if ($f instanceof FileEntity) {
        $fv = $f->getApprovedVersion();

        if ($fv instanceof Version) {
            $link = $fv->getURL();
        }
    }
} else {
    $link = $externalLink;
}

/** @noinspection PhpUnhandledExceptionInspection */
View::element("link_theme/button", [
    "label" => $label,
    "link" => $link,
    "links" => []
], "link_theme");