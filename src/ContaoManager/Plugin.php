<?php
namespace Lukasbableck\ContaoNoSitemapInMaintenanceBundle\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Lukasbableck\ContaoNoSitemapInMaintenanceBundle\ContaoNoSitemapInMaintenanceBundle;

class Plugin implements BundlePluginInterface {
	public function getBundles(ParserInterface $parser): array {
		return [BundleConfig::create(ContaoNoSitemapInMaintenanceBundle::class)->setLoadAfter([ContaoCoreBundle::class])];
	}
}
