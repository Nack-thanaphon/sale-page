<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PostsType Model
 *
 * @method \App\Model\Entity\PostsType newEmptyEntity()
 * @method \App\Model\Entity\PostsType newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\PostsType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PostsType get($primaryKey, $options = [])
 * @method \App\Model\Entity\PostsType findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\PostsType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PostsType[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\PostsType|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PostsType saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PostsType[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PostsType[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\PostsType[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\PostsType[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class PostsTypeTable extends Table
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

        $this->setTable('posts_type');
        $this->setDisplayField('pt_id');
        $this->setPrimaryKey('pt_id');

        $this->belongsTo('Posts', [
            'foreignKey' => 'pt_id',
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
            ->scalar('pt_name')
            ->maxLength('pt_name', 255)
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
