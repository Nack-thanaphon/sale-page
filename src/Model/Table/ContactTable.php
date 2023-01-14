<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Contact Model
 *
 * @method \App\Model\Entity\Contact newEmptyEntity()
 * @method \App\Model\Entity\Contact newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Contact[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Contact get($primaryKey, $options = [])
 * @method \App\Model\Entity\Contact findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Contact patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Contact[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Contact|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Contact saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Contact[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Contact[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Contact[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Contact[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ContactTable extends Table
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

        $this->setTable('contact');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->scalar('name')
            ->allowEmptyString('name');

        $validator
            ->scalar('about')
            ->allowEmptyString('about');

        $validator
            ->scalar('adress')
            ->allowEmptyString('adress');

        $validator
            ->scalar('phone')
            ->allowEmptyString('phone');

        $validator
            ->scalar('facebook')
            ->allowEmptyString('facebook');

        $validator
            ->scalar('line')
            ->allowEmptyString('line');

        $validator
            ->scalar('instagram')
            ->allowEmptyString('instagram');

        $validator
            ->scalar('tiktok')
            ->allowEmptyString('tiktok');

        $validator
            ->scalar('linetoken')
            ->allowEmptyString('linetoken');

        $validator
            ->scalar('lineoficial')
            ->allowEmptyString('lineoficial');

        $validator
            ->scalar('paymentimg')
            ->allowEmptyString('paymentimg');

        $validator
            ->dateTime('updated_at')
            ->notEmptyDateTime('updated_at');

        $validator
            ->dateTime('created_at')
            ->notEmptyDateTime('created_at');

        return $validator;
    }
}
