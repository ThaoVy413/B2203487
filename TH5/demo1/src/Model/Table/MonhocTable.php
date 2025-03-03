<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Monhoc Model
 *
 * @method \App\Model\Entity\Monhoc newEmptyEntity()
 * @method \App\Model\Entity\Monhoc newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Monhoc[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Monhoc get($primaryKey, $options = [])
 * @method \App\Model\Entity\Monhoc findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Monhoc patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Monhoc[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Monhoc|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Monhoc saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Monhoc[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Monhoc[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Monhoc[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Monhoc[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class MonhocTable extends Table
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

        $this->setTable('monhoc');
        $this->setDisplayField('mamon');
        $this->setPrimaryKey('mamon');
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
            ->scalar('mamon')
            ->maxLength('mamon', 10)
            ->requirePresence('mamon', 'create')
            ->notEmptyString('mamon');

        $validator
            ->scalar('tenmon')
            ->maxLength('tenmon', 255)
            ->requirePresence('tenmon', 'create')
            ->notEmptyString('tenmon');

        $validator
            ->integer('sotc')
            ->requirePresence('sotc', 'create')
            ->notEmptyString('sotc');

        $validator
            ->boolean('cotichluy')
            ->requirePresence('cotichluy', 'create')
            ->notEmptyString('cotichluy');

        return $validator;
    }
}
