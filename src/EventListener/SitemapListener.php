<?php
namespace Lukasbableck\ContaoNoSitemapInMaintenanceBundle\EventListener;

use Contao\CoreBundle\Event\ContaoCoreEvents;
use Contao\CoreBundle\Event\SitemapEvent;
use Contao\CoreBundle\Exception\ServiceUnavailableException;
use Contao\CoreBundle\Routing\PageFinder;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

#[AsEventListener(ContaoCoreEvents::SITEMAP)]
class SitemapListener {
	public function __construct(private RequestStack $requestStack, private PageFinder $pageFinder) {
	}

	public function __invoke(SitemapEvent $event): void {
		$rootPages = $this->pageFinder->findRootPagesForHost($this->requestStack->getCurrentRequest()->getHost());

		if (!$rootPages) {
			throw new NotFoundHttpException('Not Found');
		}

		foreach ($rootPages as $rootPage) {
			if ($rootPage->maintenanceMode) {
				throw new ServiceUnavailableException('This website is in maintenance mode.');
			}
		}
	}
}
