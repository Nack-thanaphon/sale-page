<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Image Model
 *
 * @property \App\Model\Table\PostsTable&\Cake\ORM\Association\BelongsTo $Posts
 * @property \App\Model\Table\ProductsTable&\Cake\ORM\Association\BelongsTo $Products
 * @property \App\Model\Table\OrdersTable&\Cake\ORM\Association\BelongsTo $Orders
 *
 * @method \App\Model\Entity\Image newEmptyEntity()
 * @method \App\Model\Entity\Image newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Image[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Image get($primaryKey, $options = [])
 * @method \App\Model\Entity\Image findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Image patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Image[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Image|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Image saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Image[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Image[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Image[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Image[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ImageTable extends Table
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

        $this->setTable('image');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Posts', [
            'foreignKey' => 'post_id',
        ]);
        $this->belongsTo('Products', [
            'foreignKey' => 'product_id',
        ]);
        $this->belongsTo('Orders', [
            'foreignKey' => 'order_id',
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
            ->integer('post_id')
            ->allowEmptyString('post_id');

        $validator
            ->integer('product_id')
            ->allowEmptyString('product_id');

        $validator
            ->integer('order_id')
            ->allowEmptyString('order_id');

        $validator
            ->scalar('name')
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->requirePresence('status', 'create')
            ->notEmptyString('status');

        $validator
            ->requirePresence('cover', 'create')
            ->notEmptyString('cover');

        $validator
            ->dateTime('created_at')
            ->notEmptyDateTime('created_at');

        $validator
            ->dateTime('updated_at')
            ->allowEmptyDateTime('updated_at');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('post_id', 'Posts'), ['errorField' => 'post_id']);
        $rules->add($rules->existsIn('product_id', 'Products'), ['errorField' => 'product_id']);
        $rules->add($rules->existsIn('order_id', 'Orders'), ['errorField' => 'order_id']);

        return $rules;
    }
}
