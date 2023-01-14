<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProductsFixture
 */
class ProductsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'p_id' => 1,
                'p_user_id' => 1,
                'p_title' => 'Lorem ipsum dolor sit amet',
                'p_type_id' => 1,
                'p_detail' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'p_price' => 1.5,
                'p_total' => 1,
                'p_promotion' => 1,
                'status' => 1,
                'p_created_at' => 1669523794,
                'p_updated_at' => 1669523794,
            ],
        ];
        parent::init();
    }
}
