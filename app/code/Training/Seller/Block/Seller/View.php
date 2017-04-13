<?php
/**
 * Copyright © 2013-2017 Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

// @codingStandardsIgnoreFile

namespace Training\Seller\Block\Seller;

use Magento\Framework\DataObject\IdentityInterface;

/**
 * Training Seller block content
 */
class View extends AbstractBlock implements IdentityInterface
{
    /**
     * Used to set the cache infos
     *
     * @return void
     */
    protected function _construct()
    {
        $seller = $this->getCurrentSeller();
        if ($seller) {
            $this->setData('cache_key', 'seller_view_' . $seller->getId());
        }
    }

    /**
     * Return identifiers for produced content
     *
     * @return array
     */
    public function getIdentities()
    {
        $identities = [];

        $seller = $this->getCurrentSeller();
        if ($seller) {
            $identities = $seller->getIdentities();
        }

        return $identities;
    }

    /**
     * Get the current seller
     *
     * @return \Training\Seller\Model\Seller
     */
    public function getCurrentSeller()
    {
        return $this->registry->registry('current_seller');
    }
}
