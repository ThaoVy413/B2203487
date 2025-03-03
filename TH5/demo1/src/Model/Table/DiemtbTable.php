<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Diemtb Model
 *
 * @method \App\Model\Entity\Diemtb newEmptyEntity()
 * @method \App\Model\Entity\Diemtb newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Diemtb[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Diemtb get($primaryKey, $options = [])
 * @method \App\Model\Entity\Diemtb findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Diemtb patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Diemtb[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Diemtb|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Diemtb saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Diemtb[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Diemtb[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Diemtb[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Diemtb[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class DiemtbTable extends Table
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

        $this->setTable('diemtb');
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
            ->scalar('id')
            ->maxLength('id', 20)
            ->requirePresence('id', 'create')
            ->notEmptyString('id');

        $validator
            ->scalar('ho_ten')
            ->maxLength('ho_ten', 255)
            ->requirePresence('ho_ten', 'create')
            ->notEmptyString('ho_ten');

        $validator
            ->decimal('diem_tich_luy')
            ->allowEmptyString('diem_tich_luy');

        $validator
            ->notEmptyString('so_mon_da_hoc');

        $validator
            ->notEmptyString('so_mon_da_tich_luy');

        $validator
            ->decimal('tong_sotc_da_tich_luy')
            ->allowEmptyString('tong_sotc_da_tich_luy');

        return $validator;
    }
}
