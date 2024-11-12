<?php

namespace Concrete\Package\LinkTheme\Block\BookLink;

use Concrete\Core\Block\BlockController;

class Controller extends BlockController
{
    protected $btTable = 'btBookLink';
    protected $btInterfaceWidth = 400;
    protected $btInterfaceHeight = 500;

    public function getBlockTypeDescription(): string
    {
        return t("Display a book link on a page.");
    }

    public function getBlockTypeName(): string
    {
        return t("Book Link");
    }

    public function add()
    {
        $this->set("label", null);
        $this->set("apple", null);
        $this->set("amazon", null);
        $this->set("google", null);
    }

}
