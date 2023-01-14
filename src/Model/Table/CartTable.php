<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cart Model
 *
 * @property \App\Model\Table\CartitemTable&\Cake\ORM\Association\HasMany $Cartitem
 *
 * @method \App\Model\Entity\Cart newEmptyEntity()
 * @method \App\Model\Entity\Cart newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Cart[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Cart get($primaryKey, $options = [])
 * @method \App\Model\Entity\Cart findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Cart patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Cart[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Cart|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Cart saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Cart[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Cart[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Cart[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Cart[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class CartTable extends Table
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

        $this->setTable('cart');
        $this->setDisplayField('c_id');
        $this->setPrimaryKey('c_id');

        $this->hasMany('Cartitem', [
            'foreignKey' => 'cart_id',
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
            ->scalar('c_detail')
            ->requirePresence('c_detail', 'create')
            ->notEmptyString('c_detail');

        $validator
            ->integer('c_user_id')
            ->allowEmptyString('c_user_id');

        $validator
            ->scalar('c_status')
            ->allowEmptyString('c_status');

        $validator
            ->dateTime('c_created_at')
            ->notEmptyDateTime('c_created_at');

        $validator
            ->dateTime('c_updated_at')
            ->notEmptyDateTime('c_updated_at');

        return $validator;
    }
}
