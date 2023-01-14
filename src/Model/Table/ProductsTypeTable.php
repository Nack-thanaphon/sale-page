<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProductsType Model
 *
 * @method \App\Model\Entity\ProductsType newEmptyEntity()
 * @method \App\Model\Entity\ProductsType newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\ProductsType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProductsType get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProductsType findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\ProductsType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProductsType[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProductsType|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProductsType saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProductsType[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ProductsType[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\ProductsType[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ProductsType[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ProductsTypeTable extends Table
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

        $this->setTable('products_type');
        $this->setDisplayField('p_id');
        $this->setPrimaryKey('p_id');
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
            ->integer('pt_user_id')
            ->requirePresence('pt_user_id', 'create')
            ->notEmptyString('pt_user_id');

        $validator
            ->integer('pt_name')
            ->requirePresence('pt_name', 'create')
            ->notEmptyString('pt_name');

        $validator
            ->dateTime('pt_created_at')
            ->notEmptyDateTime('pt_created_at');

        $validator
            ->dateTime('pt_updated_at')
            ->notEmptyDateTime('pt_updated_at');

        return $validator;
    }
}
