<?php

namespace Concrete\Package\LinkTheme\Block\RegularLink;

use Concrete\Core\Block\BlockController;

class Controller extends BlockController
{
    protected $btTable = 'btRegularLink';
    protected $btInterfaceWidth = 400;
    protected $btInterfaceHeight = 500;
    protected $btExportFileColumns = ["fID"];
    protected $btExportPageColumns = ["cID"];

    public function getBlockTypeDescription(): string
    {
        return t("Display a regular link on a page.");
    }

    public function getBlockTypeName(): string
    {
        return t("Regular Link");
    }

    public function add()
    {
        $this->set("label", null);
        $this->set("linkType", "external");
        $this->set("externalLink", null);
        $this->set("cID", null);
        $this->set("fID", null);
    }

}
