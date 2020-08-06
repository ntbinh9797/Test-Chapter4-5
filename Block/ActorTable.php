<?php
namespace Magenest\Movie\Block;
use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;

class ActorTable extends Template implements BlockInterface
{

    protected $collectionFactory;
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magenest\Movie\Model\ResourceModel\Actors\CollectionFactory $collectionFactory
    ) {
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context);
    }

    public function getAllActors()
    {
        $collection = $this->collectionFactory->create();
        return $collection;
    }
}