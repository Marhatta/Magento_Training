<?php

namespace Learning\OrmDb\Controller\ContactUs;

use Magento\Framework\Controller\ResultFactory;

class Index extends \Magento\Framework\App\Action\Action
{

    protected $_pageFactory;

	protected $_contactUsFactory;

	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory,
		\Learning\OrmDb\Model\ContactUsFactory $contactUsFactory
		)
	{
		$this->_pageFactory = $pageFactory;
		$this->_contactUsFactory = $contactUsFactory;
		return parent::__construct($context);
    }
    
    public function execute()
    {
        // 1. POST request : Get contact info
        $post = (array) $this->getRequest()->getPost();

        if (!empty($post)) {
            // Retrieve your form data
            $name        = $post['name'];
            $email       = $post['email'];
            $description = $post['description'];

            // Redirect to the form
            $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
            $resultRedirect->setUrl('/learning_ormdb/contactus/index');

            //check if all the fields are filled
            if(!$name || !$email || !$description){
                $this->messageManager->addErrorMessage('Please fill all the details');
                return $resultRedirect;
            }
            //Save contents in database
            $data = [
				'name'         => $name,
				'email'        => $email,
				'description'  => $description
			];
            $contactContent = $this->_contactUsFactory->create();
			$contactContent->addData($data)->save();

            // Display the succes form validation message
            $this->messageManager->addSuccessMessage('Your request has been sent successfully');

            return $resultRedirect;
        }
        // 2. GET request : Render the  page 
        $this->_view->loadLayout();
        $this->_view->renderLayout();
    }
}