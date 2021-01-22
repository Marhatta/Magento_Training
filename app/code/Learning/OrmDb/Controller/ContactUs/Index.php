<?php

namespace Learning\OrmDb\Controller\ContactUs;

use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Exception;

class Index extends \Magento\Framework\App\Action\Action
{

    protected $_contactModel;
	protected $_contactResourceModel;

	public function __construct(
		\Magento\Framework\App\Action\Context $context,
        \Learning\OrmDb\Model\ContactUs $contactModel,
        \Learning\OrmDb\Model\ResourceModel\ContactUs $contactResourceModel
    )
	{
        $this->_contactModel = $contactModel;
		$this->_contactResourceModel = $contactResourceModel;
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
            $contact     = $post['contact'];

            // Redirect to the form
            $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
            $resultRedirect->setUrl('/learning_ormdb/contactus/index');

            //check if all the fields are filled
            if(!$name || !$email || !$description || !$contact){
                $this->messageManager->addErrorMessage('Please fill all the details');
                return $resultRedirect;
            }

            $data = $this->_contactModel->setData($post);

            try {
                $this->_contactResourceModel->save($data);
            } catch(\Exception $e){
                $this->messageManager->addErrorMessage('Something went wrong');
            }

            // Display the succes form validation message
            $this->messageManager->addSuccessMessage('Your request has been sent successfully');

            return $resultRedirect;
        }
        // 2. GET request : Render the  page 
        $this->_view->loadLayout();
        $this->_view->renderLayout();
    }
}