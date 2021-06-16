<?php
namespace Learning\Customform\Controller\Index;

use Magento\Framework\Controller\Result\JsonFactory;

class Submit extends \Magento\Framework\App\Action\Action
{
    protected $resultJsonFactory;
    protected $customFormFactory;
    protected $json;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        JsonFactory $resultJsonFactory,
        \Learning\Customform\Model\CustomFormFactory $customFormFactory,
        \Magento\Framework\Serialize\Serializer\Json $json
    ) {
        $this->resultJsonFactory = $resultJsonFactory; 
        $this->customFormFactory = $customFormFactory;
        $this->json = $json;
        return parent::__construct($context);
    }
    /**
     * View page action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     *
     */
    public function execute()
    {
        $post = $this->getRequest()->getParams();
        $output = "Form Not Saved";
        if (!empty($post)) {
            // Save
            $formModel  = $this->customFormFactory->create();
    
            $formModel->setData('name', $post['name']);
            $formModel->setData('email', $post['email']);
            $formModel->setData('phone', $post['phone']);
            $formModel->setData('message', $post['message']);
            $formModel->setData('created_at', date('Y-m-d h:i:sa'));
            $formModel->save();
            $this->messageManager->addSuccessMessage('Form Saved!');
            $output = "Form Saved";
        }

        $result = $this->resultJsonFactory->create();
        $result->setData(['output' => $output]);
        return $result;
    }
}
