<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Lop Model
 *
 * @method \App\Model\Entity\Lop newEmptyEntity()
 * @method \App\Model\Entity\Lop newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Lop[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Lop get($primaryKey, $options = [])
 * @method \App\Model\Entity\Lop findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Lop patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Lop[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Lop|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Lop saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Lop[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Lop[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Lop[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Lop[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class LopTable extends Table
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

        $this->setTable('lop');
        $this->setDisplayField('malop');
        $this->setPrimaryKey('malop');
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
            ->scalar('mamon_id')
            ->maxLength('mamon_id', 10)
            ->requirePresence('mamon_id', 'create')
            ->notEmptyString('mamon_id');

        $validator
            ->scalar('malop')
            ->maxLength('malop', 20)
            ->requirePresence('malop', 'create')
            ->notEmptyString('malop');

        $validator
            ->scalar('nienkhoa')
            ->maxLength('nienkhoa', 20)
            ->requirePresence('nienkhoa', 'create')
            ->notEmptyString('nienkhoa');

        return $validator;
    }
}
