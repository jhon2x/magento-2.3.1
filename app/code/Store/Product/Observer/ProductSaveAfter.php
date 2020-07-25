<?php
namespace Store\Product\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class ProductSaveAfter implements ObserverInterface
{
    public function execute(Observer $observer)
    {
        $product = $observer->getProduct();
        // you could add more product attributes to the $compareArray
        $compareArray = ['sku','price','special_price','cost','weight','special_from_date','special_to_date','status','visibility','is_salable'];
        $event = "";
        foreach ($compareArray as $value) {
            $old = $product->getOrigData($value);
            $new = $product->getData($value);
            if ($old !== $new) {
                $event .= " Change $value $old=>$new.";
            }
        }
        // other codes and write the $event to DB
    
        $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/check-productprice-change.log');
        $logger = new \Zend\Log\Logger();
        $logger->addWriter($writer);   
        $logger->log($event);
    }
}