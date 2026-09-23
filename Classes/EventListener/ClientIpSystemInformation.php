<?php

declare(strict_types=1);

namespace Mfd\CdnUtils\EventListener;

use Psr\Http\Message\ServerRequestInterface;
use TYPO3\CMS\Backend\Backend\Event\SystemInformationToolbarCollectorEvent;
use TYPO3\CMS\Backend\Toolbar\InformationStatus;
use TYPO3\CMS\Core\Attribute\AsEventListener;
use TYPO3\CMS\Core\Http\NormalizedParams;

final class ClientIpSystemInformation
{
    #[AsEventListener('cdn-utils/client-ip')]
    public function __invoke(SystemInformationToolbarCollectorEvent $event): void
    {
        // ponytail: toolbar item keeps its request private, the global is the only way in
        $request = $GLOBALS['TYPO3_REQUEST'] ?? null;
        if (!$request instanceof ServerRequestInterface) {
            return;
        }

        $normalizedParams = $request->getAttribute('normalizedParams');
        if (!$normalizedParams instanceof NormalizedParams) {
            $normalizedParams = NormalizedParams::createFromRequest($request);
        }

        $proxies = array_filter(array_map('trim', explode(',', $request->getHeaderLine('X-Forwarded-For'))));

        // Values are escaped by the core Fluid template
        $toolbarItem = $event->getToolbarItem();
        $toolbarItem->addSystemInformation(
            'Client IP',
            $normalizedParams->getRemoteAddress(),
            'actions-user',
            InformationStatus::INFO
        );
        $toolbarItem->addSystemInformation(
            'X-Forwarded-For',
            $proxies === [] ? 'none' : implode(' → ', $proxies),
            'actions-server',
            InformationStatus::INFO
        );
    }
}
