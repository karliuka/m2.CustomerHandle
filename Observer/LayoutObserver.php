<?php
/**
 * Faonni
 *  
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade module to newer
 * versions in the future.
 * 
 * @package     Faonni_CustomerHandle
 * @copyright   Copyright (c) 2016 Karliuka Vitalii(karliuka.vitalii@gmail.com) 
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
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