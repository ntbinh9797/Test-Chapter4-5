<?php
namespace Magenest\Movie\Model\ResourceModel\Actors;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
class Collection extends AbstractCollection
{
    public function _construct()
    {
        $this->_init('Magenest\Movie\Model\Actors',
            'Magenest\Movie\Model\ResourceModel\Actors');
    }
}