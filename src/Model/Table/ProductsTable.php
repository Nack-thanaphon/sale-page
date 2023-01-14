<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Products Model
 *
 * @property \App\Model\Table\ImageTable&\Cake\ORM\Association\HasMany $Image
 *
 * @method \App\Model\Entity\Product newEmptyEntity()
 * @method \App\Model\Entity\Product newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Product[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Product get($primaryKey, $options = [])
 * @method \App\Model\Entity\Product findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Product patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Product[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Product|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Product saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Product[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ProductsTable extends Table
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

        $this->setTable('products');
        $this->setDisplayField('p_id');
        $this->setPrimaryKey('p_id');
        $this->hasMany('Image', [
            'foreignKey' => 'product_id',
        ]);
        $this->belongsTo('ProductsType', [
            'foreignKey' => 'p_type_id',
            'joinType' => 'INNER'
        ]);
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
            ->integer('p_user_id')
            ->requirePresence('p_user_id', 'create')
            ->notEmptyString('p_user_id');

        $validator
            ->scalar('p_title')
            ->maxLength('p_title', 255)
            ->requirePresence('p_title', 'create')
            ->notEmptyString('p_title');

        $validator
            ->integer('p_type_id')
            ->requirePresence('p_type_id', 'create')
            ->notEmptyString('p_type_id');

        $validator
            ->scalar('p_detail')
            ->requirePresence('p_detail', 'create')
            ->notEmptyString('p_detail');

        $validator
            ->decimal('p_price')
            ->requirePresence('p_price', 'create')
            ->notEmptyString('p_price');

        $validator
            ->requirePresence('p_total', 'create')
            ->notEmptyString('p_total');

        $validator
            ->integer('p_promotion')
            ->allowEmptyString('p_promotion');

        $validator
            ->requirePresence('status', 'create')
            ->notEmptyString('status');

        $validator
            ->dateTime('p_created_at')
            ->notEmptyDateTime('p_created_at');

        $validator
            ->dateTime('p_updated_at')
            ->notEmptyDateTime('p_updated_at');

        return $validator;
    }
}
