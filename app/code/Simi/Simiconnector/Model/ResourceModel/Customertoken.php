<?php

namespace Simi\Simiconnector\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Connector Resource Model
 */
class Customertoken extends AbstractDb
{

    /**
     * Initialize resource model
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init('simiconnector_customer_token', 'id');
    }
}
