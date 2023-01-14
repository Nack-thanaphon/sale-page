<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CartitemFixture
 */
class CartitemFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'cartitem';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'cart_id' => 1,
                'cart_user_id' => 1,
                'cart_product_id' => 1,
                'cart_qty' => 1,
                'c_created_at' => 1672295935,
                'c_updated_at' => 1672295935,
            ],
        ];
        parent::init();
    }
}
