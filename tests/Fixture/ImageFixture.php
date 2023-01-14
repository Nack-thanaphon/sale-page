<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ImageFixture
 */
class ImageFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'image';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'post_id' => 1,
                'product_id' => 1,
                'order_id' => 1,
                'name' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'status' => 1,
                'cover' => 1,
                'created_at' => '2022-12-08 04:42:37',
                'updated_at' => '2022-12-08 04:42:37',
            ],
        ];
        parent::init();
    }
}
