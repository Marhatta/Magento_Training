<?php /**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Learning\HelloPage\Controller\Page;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\View\Result\Page;
use Magento\Framework\App\Action\Action;

class View extends Action
{
       public function execute()
       {
           /** @var Page $resultPage */
           return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
       }
}