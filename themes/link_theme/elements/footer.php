<?php

defined('C5_EXECUTE') or die("Access Denied.");

use Concrete\Core\Area\Area;
use Concrete\Core\Page\Page;
use Concrete\Core\View\View;

/** @var Page $c */
/** @var View $view */

?>

    <footer>
        <div class="footer-social-links">
            <?php
            $a = new Area('Footer Social Links');
            $a->display();
            ?>
        </div>

        <div class="footer-legal">
            <?php
            $a = new Area('Footer Legal');
            $a->display();
            ?>
        </div>
    </footer>

<?php $this->inc("elements/footer_bottom.php"); ?>