<?php
namespace Lukasbableck\ContaoNoSitemapInMaintenanceBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ContaoNoSitemapInMaintenanceBundle extends Bundle {
	public function getPath(): string {
		return \dirname(__DIR__);
	}
}
