<?php
/**
 * Copyright © 2011-2018 Karliuka Vitalii(karliuka.vitalii@gmail.com)
 * 
 * See COPYING.txt for license details.
 */
namespace Faonni\CustomerHandle\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Customer\Model\Session;

/**
 * Layout load observer
 */
class LayoutObserver implements ObserverInterface
{
    /**
     * Object customer session instance
     *
     * @var \Magento\Customer\Model\Session
     */    
	protected $session;
	
    /**
     * Factory constructor
     *
     * @param \Magento\Customer\Model\Session $customerSession
     */ 
    public function __construct(
        Session $customerSession
    ) {
        $this->session = $customerSession;
    }
	
    /**
     * Handler for layout load event
     *
     * @param Observer $observer
     * @return void
     */
    public function execute(Observer $observer)
    {
        $handle = ($this->session->isLoggedIn()) ? 'customer_logged_in' : 'customer_logged_out';		
		$layout = $observer->getEvent()->getLayout(); 
        $layout->getUpdate()->addHandle($handle);
		
        return $this;
    }
}  