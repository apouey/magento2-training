<?php
/**
 * Copyright © 2013-2017 Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Training\Helloworld\Observer;

use Magento\Framework\Event\Observer as EventObserver;
use Magento\Framework\Event\ObserverInterface;
use Psr\Log\LoggerInterface as LoggerInterface;

/**
 * Observer is responsible for changing scope for all price attributes in system
 * depending on 'Catalog Price Scope' configuration parameter
 */
class PredispatchLogUrl implements ObserverInterface
{

    protected $logger;

    public function __construct(LoggerInterface $log)
    {
        $this->logger = $log;
    }

    /**
     * Change scope for all price attributes according to
     * 'Catalog Price Scope' configuration parameter value
     *
     * @param EventObserver $observer
     * @return void
     */
    public function execute(EventObserver $observer)
    {
        $url = $observer->getEvent()->getRequest()->getPathInfo();
        $this->logger->debug('Current Url : ' . $url);
    }
}