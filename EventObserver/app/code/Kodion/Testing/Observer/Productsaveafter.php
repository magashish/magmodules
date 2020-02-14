<?php
namespace Kodion\Testing\Observer;

use Magento\Framework\Event\ObserverInterface;

class Productsaveafter implements ObserverInterface
{
    /**
     * @var ObjectManagerInterface
     */
    protected $_objectManager;
    protected $_logger;

    /**
     * @param \Magento\Framework\ObjectManagerInterface $objectManager
     */
    public function __construct(
        \Magento\Framework\ObjectManagerInterface $objectManager,
        \Psr\Log\LoggerInterface $logger
    ) {
        $this->_logger = $logger;
        $this->_objectManager = $objectManager;
    }

    /**
     * customer register event handler
     *
     * @param \Magento\Framework\Event\Observer $observer
     * @return void
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $_product = $observer->getProduct();  // you will get product object
        $_sku=$_product->getSku(); // for sku
        $mydata = json_encode($_sku);
        $this->_logger->info($mydata); 
    }
}