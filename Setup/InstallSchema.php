<?php
namespace Godogi\Pos\Setup;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\DB\Ddl\Table;
class InstallSchema implements InstallSchemaInterface
{
	public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
	{
		$setup->startSetup();
		if (!$setup->tableExists('godogi_pos')){
			$table = $setup->getConnection()->newTable($setup->getTable('godogi_pos')
      )->addColumn(
          'pos_id',
          \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
          null,
          ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
          'Pos Id'
      )->addColumn(
          'title',
          \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
          100,
          ['nullable' => false],
          'Title'
      )->addColumn(
          'address',
          \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
          100,
          ['nullable' => false],
          'Address'
      )->addColumn(
          'zip',
          \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
          50,
          ['nullable' => false],
          'Zip'
      )->addColumn(
          'city',
          \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
          50,
          ['nullable' => false],
          'City'
      )->addColumn(
          'country',
          \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
          50,
          ['nullable' => false],
          'Country'
      )->addColumn(
          'tel',
          \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
          50,
          ['nullable' => false],
          'Tel'
      )->addColumn(
          'date',
          \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
          50,
          ['nullable' => false],
          'Date'
      )->addColumn(
          'info',
          \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
          50,
          ['nullable' => false],
          'Info'
      )->addColumn(
          'email',
          \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
          50,
          ['nullable' => false],
          'Email'
      )->addColumn(
          'lat',
          \Magento\Framework\DB\Ddl\Table::TYPE_FLOAT,
          null,
          ['nullable' => false],
          'Lattitude'
      )->addColumn(
          'lng',
          \Magento\Framework\DB\Ddl\Table::TYPE_FLOAT,
          null,
          ['nullable' => false],
          'Longitude'
      )->addColumn(
        'created_at',
        \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
        null,
        ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
        'Created At'
     )->addColumn(
          'status',
          \Magento\Framework\DB\Ddl\Table::TYPE_BOOLEAN,
          null,
          ['nullable' => false],
          'Status'
      )->setComment(
          'Points Of Sale'
      );
			$setup->getConnection()->createTable($table);
		}
		$setup->endSetup();
	}
}
