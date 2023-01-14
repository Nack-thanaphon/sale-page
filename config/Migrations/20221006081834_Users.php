<?php

declare(strict_types=1);

use Migrations\AbstractMigration;

class Users extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('users', ['id' => false, 'primary_key' => ['id']]);

        $table->addColumn('id', 'integer', [
            'autoIncrement' => true,
            'limit' => 11
        ]);
        $table->addColumn('name', 'string', [
            'limit' => 225,
            'null' => false,
        ]);
        $table->addColumn('email', 'text', [
            'limit' => 225,
            'null' => false,
        ]);
        $table->addColumn('verified', 'enum', [
            'values' => [1, 0],
        ]);
        $table->addColumn('token', 'text', [
            'limit' => 225,
            'null' => false,
        ]);
        $table->addColumn('password', 'text', [
            'limit' => 225,
            'null' => false,
        ]);
        $table->addColumn('created_at', 'timestamp', [
            'default' => 'CURRENT_TIMESTAMP',
            'null' => false,
        ]);
        $table->addColumn('updated_at', 'timestamp', [
            'default' => 'CURRENT_TIMESTAMP',
            'null' => false,
        ]);

        $table->addPrimaryKey("id");
        $table->create();
    }
}
