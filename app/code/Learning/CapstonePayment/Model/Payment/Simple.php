<?php
namespace Learning\CapstonePayment\Model\Payment;
 
 /**
  * Pay In Store payment method model
  */
 class Simple extends \Magento\Payment\Model\Method\AbstractMethod
 {
     /**
      * Payment code
      *
      * @var string
      */
     protected $_code = 'simplepayment';
     
 }