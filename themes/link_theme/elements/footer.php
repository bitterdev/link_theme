<?php

defined('C5_EXECUTE') or die("Access Denied.");

use Concrete\Core\Area\GlobalArea;
use Concrete\Core\Page\Page;
use Concrete\Core\View\View;

/** @var Page $c */
/** @var View $view */

?>

    <footer>
        <div class="footer-social-links">
            <?php
            $a = new GlobalArea('Footer Social Links');
            $a->display();
            ?>
        </div>

        <div class="footer-legal">
            <?php
            $a = new GlobalArea('Footer Legal');
            $a->display();
            ?>
        </div>
    </footer>

<?php $this->inc("elements/footer_bottom.php"); ?>