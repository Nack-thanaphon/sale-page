<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Posts Model
 *
 * @property \App\Model\Table\ImageTable&\Cake\ORM\Association\HasMany $Image
 *
 * @method \App\Model\Entity\Post newEmptyEntity()
 * @method \App\Model\Entity\Post newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Post[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Post get($primaryKey, $options = [])
 * @method \App\Model\Entity\Post findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Post patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Post[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Post|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Post saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Post[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Post[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Post[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Post[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class PostsTable extends Table
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

        $this->setTable('posts');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->hasMany('Image', [
            'foreignKey' => 'post_id',
        ]);
        $this->belongsTo('PostsType', [
            'foreignKey' => 'p_type_id',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'p_user_id',
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
            ->scalar('p_title')
            ->requirePresence('p_title', 'create')
            ->notEmptyString('p_title');

        $validator
            ->integer('p_type_id')
            ->requirePresence('p_type_id', 'create')
            ->notEmptyString('p_type_id');

        $validator
            ->integer('p_user_id')
            ->allowEmptyString('p_user_id');

        $validator
            ->scalar('p_detail')
            ->requirePresence('p_detail', 'create')
            ->notEmptyString('p_detail');

        $validator
            ->scalar('p_date')
            ->allowEmptyString('p_date');

        $validator
            ->boolean('p_status')
            ->allowEmptyString('p_status');

        $validator
            ->integer('p_views')
            ->allowEmptyString('p_views');

        $validator
            ->dateTime('p_created_at')
            ->notEmptyDateTime('p_created_at');

        $validator
            ->dateTime('p_updated_at')
            ->notEmptyDateTime('p_updated_at');

        return $validator;
    }
}
