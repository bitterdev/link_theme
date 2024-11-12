<?php

namespace Concrete\Package\LinkTheme\Theme\LinkTheme;

use Concrete\Core\Page\Theme\Theme;

class PageTheme extends Theme
{
    protected $pThemeGridFrameworkHandle = 'bootstrap5';

    public function getThemeName(): string
    {
        return t('Link Theme');
    }

    public function getThemeDescription(): string
    {
        return t('A Concrete CMS theme built for version 9.');
    }

    public function registerAssets()
    {
        $this->requireAsset('javascript', 'jquery');
        $this->requireAsset('javascript', 'bootstrap');
        $this->requireAsset('vue');
    }

}
