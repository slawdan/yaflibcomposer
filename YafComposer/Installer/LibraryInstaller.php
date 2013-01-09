<?php

/*
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace YafComposer\Installer;

use Composer\Installer as CI;
use Composer\Package\PackageInterface;

/**
 * Package installation manager.
 *
 */
class LibraryInstaller extends CI\LibraryInstaller
{
    /**
     * Initializes library installer.
     *
     * @param IOInterface $io
     * @param Composer    $composer
     * @param string      $type
     */
    public function __construct($io, $composer, $type = 'weibolib')
    {
        parent::__construct($io, $composer, $type);
        $this->vendorDir = "./application/library"; 
    }

    public function getInstallPath(PackageInterface $package)
    {
        $this->initializeVendorDir();
        $targetDir = $package->getTargetDir();

        return ($this->vendorDir ? $this->vendorDir.'/' : '') . /*$package->getPrettyName() .*/ ($targetDir ? '/'.$targetDir : '');
    }
}
