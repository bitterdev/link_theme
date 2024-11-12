<?php

namespace Concrete\Package\LinkTheme\Block\MusicLink;

use Concrete\Core\Block\BlockController;

class Controller extends BlockController
{
    protected $btTable = 'btMusicLink';
    protected $btInterfaceWidth = 400;
    protected $btInterfaceHeight = 500;

    public function getBlockTypeDescription(): string
    {
        return t("Display a music link on a page.");
    }

    public function getBlockTypeName(): string
    {
        return t("Music Link");
    }

    public function add()
    {
        $this->set("label", null);
        $this->set("spotify", null);
        $this->set("youtube", null);
        $this->set("soundcloud", null);
        $this->set("apple", null);
        $this->set("deezer", null);
        $this->set("tidal", null);
        $this->set("amazon", null);
        $this->set("napster", null);
        $this->set("itunes", null);
    }

}
