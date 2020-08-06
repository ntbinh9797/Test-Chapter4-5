<?php
namespace Magenest\Movie\Model\ResourceModel\Movies;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
class Collection extends AbstractCollection
{
    public function _construct()
    {
        $this->_init('Magenest\Movie\Model\Movies',
            'Magenest\Movie\Model\ResourceModel\Movies');
    }
}