<?php
/**
 * Magento 2 Training Project
 * Module Training/Helloworld
 */
namespace Training\Helloworld\Controller\Index;
/**
 * Action: Index/Index
 *
 * @author    Alexandre Pouey <apouey@volcom.com>
 * @copyright 2017 Volcom
 */

class Index extends \Magento\Framework\App\Action\Action
{
    /**
     * Index action
     *
     * @return $this
     */
    public function execute()
    {

        $this->getResponse()->appendBody('Hello World !');
    }
}

