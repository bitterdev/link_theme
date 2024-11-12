<?php
defined('C5_EXECUTE') or die("Access Denied.");

use Concrete\Core\Area\ContainerArea;

?>
<section>
    <div class="title">
        <?php
        $area = new ContainerArea($container, 'Column 1');
        $area->display($c);
        ?>
    </div>

    <div class="content">
        <?php
        $area = new ContainerArea($container, 'Column 2');
        $area->display($c);
        ?>
    </div>
</section>
