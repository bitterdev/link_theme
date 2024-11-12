<?php

namespace Concrete\Package\LinkTheme;

use Bitter\LinkTheme\Provider\ServiceProvider;
use Concrete\Core\Package\Package;
use Concrete\Theme\Concrete\PageTheme;
use Concrete\Core\Entity\Package as PackageEntity;

class Controller extends Package
{
    protected string $pkgHandle = 'link_theme';
    protected string $pkgVersion = '0.0.7';
    protected $appVersionRequired = '9.0.0';
    protected $pkgAllowsFullContentSwap = true;
    protected $pkgAutoloaderRegistries = [
        'src/Bitter/LinkTheme' => 'Bitter\LinkTheme',
    ];

    public function getPackageDescription(): string
    {
        return t('Linktree-like Theme for ConcreteCMS.');
    }

    public function getPackageName(): string
    {
        return t('Link Theme');
    }
    public function on_start()
    {
        /** @var ServiceProvider $serviceProvider */
        $serviceProvider = $this->app->make(ServiceProvider::class);
        $serviceProvider->register();
    }

    public function testForUninstall()
    {
        $pageTheme = PageTheme::getByHandle('elemental');
        if (is_object($pageTheme)) {
            $pageTheme->applyToSite();
        }
    }

    public function install(): PackageEntity
    {
        $pkg = parent::install();
        $this->installContentFile("data.xml");
        return $pkg;
    }

    public function upgrade()
    {
        parent::upgrade();
        $this->installContentFile("data.xml");
    }
}
