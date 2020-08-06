<?php

namespace Magenest\Movie\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;


class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        // TODO: Implement install() method.
        $installer = $setup;
        $installer->startSetup();
        /**
         * Create table 'magenest_director'
         * */

        $table = $installer->getConnection()->newTable(
            $installer->getTable('magenest_director')
        )->addColumn(
            'director_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER, null, [
            'identity' => true,
            'unsigned' => true,
            'nullable' => false,
            'primary' => true
        ],
            'Director ID'
        )->addColumn(
            'name',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT, 255, [
            'nullable' => false
        ],
            'Director Name'
        )->setComment(
            'Director Table'
        );
        $installer->getConnection()->createTable($table);
        /**
         * Create table 'magenest_actor'
         */
        $table = $installer->getConnection()->newTable(
            $installer->getTable('magenest_actor')
        )->addColumn(
            'actor_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER, null, [
            'identity' => true,
            'unsigned' => true,
            'nullable' => false,
            'primary' => true
        ],
            'Actor ID'
        )->addColumn(
            'name',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT, 255, [
            'nullable' => false
        ],
            'Actor Name'
        )->setComment(
            'Actor Table'
        );
        $installer->getConnection()->createTable($table);
        /**
         * Create table 'magenest_movie'
         */
        $table = $installer->getConnection()->newTable(
            $installer->getTable('magenest_movie')
        )->addColumn(
            'movie_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER, null, [
            'identity' => true,
            'unsigned' => true,
            'nullable' => false,
            'primary' => true
        ],
            'Movie ID'
        )->addColumn(
            'name',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT, 255, [
            'nullable' => false
        ],
            'Movie Name'
        )->addColumn(
            'description',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT, 255, [
            'nullable' => false
        ],
            'Description'
        )->addColumn(
            'rating',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT, 255, [
            'nullable' => false
        ],
            'Rating'
        )->addColumn(
            'director_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER, null, [
            'unsigned' => true,
            'nullable' => false
        ],
            'Director Id'
        )->addForeignKey(
            $installer->getFkName('magenest_movie', 'director_id',
                'magenest_director', 'director_id'),
            'director_id',
            $installer->getTable('magenest_director'),
            'director_id',
            \Magento\Framework\DB\Ddl\Table::ACTION_NO_ACTION
        )->setComment(
            'Movie Table'
        );
        $installer->getConnection()->createTable($table);
        /**
         * Create table 'magenest_movie_actor'
         */
        $table = $installer->getConnection()->newTable(
            $installer->getTable('magenest_movie_actor')
        )->addColumn(
            'movie_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER, null, [
            'unsigned' => true,
            'nullable' => false
        ],
            'Movie Id'
        )->addColumn(
            'actor_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER, null, [
            'unsigned' => true,
            'nullable' => false
        ],
            'Actor Id'
        )->addForeignKey(
            $installer->getFkName('magenest_movie_actor', 'movie_id',
                'magenest_movie', 'movie_id'),
            'movie_id',
            $installer->getTable('magenest_movie'),
            'movie_id',
            \Magento\Framework\DB\Ddl\Table::ACTION_NO_ACTION
        )->addForeignKey(
            $installer->getFkName('magenest_movie_actor', 'actor_id',
                'magenest_actor', 'actor_id'),
            'actor_id',
            $installer->getTable('magenest_actor'),
            'actor_id',
            \Magento\Framework\DB\Ddl\Table::ACTION_NO_ACTION
        )->setComment(
            'Movie_Actor Table'
        );
        $installer->getConnection()->createTable($table);

        $installer->endSetup();
    }
}


/**
 * Created by Magenest JSC.
 * Author: Jacob
 * Date: 18/01/2019
 * Time: 9:41


namespace Magenest\Movie\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table as Table;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        $installer->startSetup();

        $table = $installer->getConnection()->newTable($installer->getTable('magenest_sagepay_transaction'))
            ->addColumn(
                'id',
                Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'ID'
            )
            ->addColumn(
                'transaction_id',
                Table::TYPE_TEXT,
                50,
                [],
                'Transaction ID'
            )
            ->addColumn(
                'transaction_type',
                Table::TYPE_TEXT,
                10,
                [],
                'Transaction Type'
            )
            ->addColumn(
                'transaction_status',
                Table::TYPE_TEXT,
                20,
                [],
                'Transaction Status'
            )
            ->addColumn(
                'card_secure',
                Table::TYPE_TEXT,
                30,
                [],
                '3D Secure Status'
            )
            ->addColumn(
                'status_detail',
                Table::TYPE_TEXT,
                null,
                [],
                'Transaction Status Detail'
            )
            ->addColumn(
                'order_id',
                Table::TYPE_TEXT,
                20,
                [],
                'Order ID'
            )
            ->addColumn(
                'customer_id',
                Table::TYPE_SMALLINT,
                null,
                [],
                'Customer ID'
            )
            ->addColumn(
                'is_subscription',
                Table::TYPE_SMALLINT,
                null,
                [],
                'Is this a subscription order'
            )
            ->setComment('SagePay Transaction Detail');

        $installer->getConnection()->createTable($table);

        $table = $installer->getConnection()->newTable($installer->getTable('magenest_sagepay_subscription_plans'))
            ->addColumn(
                'id',
                Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'ID'
            )
            ->addColumn(
                'product_id',
                Table::TYPE_INTEGER,
                null,
                [],
                'Product ID'
            )
            ->addColumn(
                'enabled',
                Table::TYPE_SMALLINT,
                null,
                [],
                'Is product enabled with subscription'
            )
            ->addColumn(
                'subscription_value',
                Table::TYPE_TEXT,
                null,
                [],
                'Subscription Value'
            )
            ->setComment('Subscription Plans Table');

        $installer->getConnection()->createTable($table);

        $table = $installer->getConnection()->newTable($installer->getTable('magenest_sagepay_subscription_profile'))
            ->addColumn(
                'id',
                Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'ID'
            )
            ->addColumn(
                'transaction_id',
                Table::TYPE_TEXT,
                50,
                [],
                'Transaction ID'
            )
            ->addColumn(
                'order_id',
                Table::TYPE_TEXT,
                20,
                [],
                'Order ID'
            )
            ->addColumn(
                'customer_id',
                Table::TYPE_SMALLINT,
                null,
                [],
                'Customer ID'
            )
            ->addColumn(
                'status',
                Table::TYPE_TEXT,
                10,
                [],
                'Profile Status'
            )
            ->addColumn(
                'amount',
                Table::TYPE_DECIMAL,
                '12,4',
                [],
                'Amount'
            )
            ->addColumn(
                'total_cycles',
                Table::TYPE_SMALLINT,
                null,
                [],
                'Total Cycles'
            )
            ->addColumn(
                'currency',
                Table::TYPE_TEXT,
                5,
                [],
                'Currency Code'
            )
            ->addColumn(
                'frequency',
                Table::TYPE_TEXT,
                20,
                [],
                'Frequency'
            )
            ->addColumn(
                'remaining_cycles',
                Table::TYPE_SMALLINT,
                null,
                [],
                'Remaining cycles'
            )
            ->addColumn(
                'start_date',
                Table::TYPE_DATE,
                null,
                [],
                'Start Date'
            )
            ->addColumn(
                'last_billed',
                Table::TYPE_DATE,
                null,
                [],
                'Last Billed Date'
            )
            ->addColumn(
                'next_billing',
                Table::TYPE_DATE,
                null,
                [],
                'Next Billing Day'
            )
            ->setComment('Subscription Plans Table');

        $installer->getConnection()->createTable($table);

        $installer->endSetup();
    }
}
 * */