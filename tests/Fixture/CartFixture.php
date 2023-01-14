<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CartFixture
 */
class CartFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'cart';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'c_id' => 1,
                'c_detail' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'c_user_id' => 1,
                'c_status' => 'Lorem ipsum dolor sit amet',
                'c_created_at' => 1669441935,
                'c_updated_at' => 1669441935,
            ],
        ];
        parent::init();
    }
}
