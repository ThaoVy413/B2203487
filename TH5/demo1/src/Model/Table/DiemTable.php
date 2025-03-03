<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Diem Model
 *
 * @method \App\Model\Entity\Diem newEmptyEntity()
 * @method \App\Model\Entity\Diem newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Diem[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Diem get($primaryKey, $options = [])
 * @method \App\Model\Entity\Diem findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Diem patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Diem[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Diem|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Diem saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Diem[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Diem[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Diem[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Diem[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class DiemTable extends Table
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

        $this->setTable('diem');
        $this->setDisplayField('malop');
        $this->setPrimaryKey(['malop', 'masv']);
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
            ->integer('malop_id')
            ->requirePresence('malop_id', 'create')
            ->notEmptyString('malop_id');

        $validator
            ->scalar('malop')
            ->maxLength('malop', 20)
            ->requirePresence('malop', 'create')
            ->notEmptyString('malop');

        $validator
            ->scalar('sv_id')
            ->maxLength('sv_id', 20)
            ->requirePresence('sv_id', 'create')
            ->notEmptyString('sv_id');

        $validator
            ->scalar('masv')
            ->maxLength('masv', 20)
            ->requirePresence('masv', 'create')
            ->notEmptyString('masv');

        $validator
            ->decimal('diem')
            ->requirePresence('diem', 'create')
            ->notEmptyString('diem');

        return $validator;
    }
}
