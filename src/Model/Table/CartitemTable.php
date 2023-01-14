<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cartitem Model
 *
 * @method \App\Model\Entity\Cartitem newEmptyEntity()
 * @method \App\Model\Entity\Cartitem newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Cartitem[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Cartitem get($primaryKey, $options = [])
 * @method \App\Model\Entity\Cartitem findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Cartitem patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Cartitem[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Cartitem|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Cartitem saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Cartitem[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Cartitem[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Cartitem[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Cartitem[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class CartitemTable extends Table
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

        $this->setTable('cartitem');
        $this->setDisplayField('cart_id');
        $this->setPrimaryKey('cart_id');
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
            ->integer('cart_user_id')
            ->requirePresence('cart_user_id', 'create')
            ->notEmptyString('cart_user_id');

        $validator
            ->integer('cart_product_id')
            ->requirePresence('cart_product_id', 'create')
            ->notEmptyString('cart_product_id');

        $validator
            ->integer('cart_qty')
            ->requirePresence('cart_qty', 'create')
            ->notEmptyString('cart_qty');

        $validator
            ->dateTime('c_created_at')
            ->notEmptyDateTime('c_created_at');

        $validator
            ->dateTime('c_updated_at')
            ->notEmptyDateTime('c_updated_at');

        return $validator;
    }
}
