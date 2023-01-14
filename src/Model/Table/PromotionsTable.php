<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Promotions Model
 *
 * @method \App\Model\Entity\Promotion newEmptyEntity()
 * @method \App\Model\Entity\Promotion newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Promotion[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Promotion get($primaryKey, $options = [])
 * @method \App\Model\Entity\Promotion findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Promotion patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Promotion[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Promotion|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Promotion saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Promotion[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Promotion[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Promotion[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Promotion[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class PromotionsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('promotions');
        $this->setDisplayField('pr_id');
        $this->setPrimaryKey('pr_id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('pr_name')
            ->requirePresence('pr_name', 'create')
            ->notEmptyString('pr_name');

        $validator
            ->scalar('pr_detail')
            ->requirePresence('pr_detail', 'create')
            ->notEmptyString('pr_detail');

        $validator
            ->scalar('pr_image')
            ->requirePresence('pr_image', 'create')
            ->notEmptyFile('pr_image');

        $validator
            ->decimal('pr_discount')
            ->requirePresence('pr_discount', 'create')
            ->notEmptyString('pr_discount');

        $validator
            ->dateTime('pr_created')
            ->notEmptyDateTime('pr_created');

        $validator
            ->dateTime('pr_updated')
            ->notEmptyDateTime('pr_updated');

        return $validator;
    }
}
