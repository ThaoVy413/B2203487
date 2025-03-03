<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Sinhvien Model
 *
 * @method \App\Model\Entity\Sinhvien newEmptyEntity()
 * @method \App\Model\Entity\Sinhvien newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Sinhvien[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Sinhvien get($primaryKey, $options = [])
 * @method \App\Model\Entity\Sinhvien findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Sinhvien patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Sinhvien[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Sinhvien|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Sinhvien saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Sinhvien[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Sinhvien[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Sinhvien[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Sinhvien[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class SinhvienTable extends Table
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

        $this->setTable('sinhvien');
        $this->setDisplayField('masv');
        $this->setPrimaryKey('masv');
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
            ->scalar('masv')
            ->maxLength('masv', 20)
            ->requirePresence('masv', 'create')
            ->notEmptyString('masv');

        $validator
            ->scalar('hoten')
            ->maxLength('hoten', 255)
            ->requirePresence('hoten', 'create')
            ->notEmptyString('hoten');

        $validator
            ->date('ngaysinh')
            ->requirePresence('ngaysinh', 'create')
            ->notEmptyDate('ngaysinh');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

        $validator
            ->scalar('gioitinh')
            ->requirePresence('gioitinh', 'create')
            ->notEmptyString('gioitinh');

        $validator
            ->scalar('sdt')
            ->maxLength('sdt', 20)
            ->requirePresence('sdt', 'create')
            ->notEmptyString('sdt');

        $validator
            ->scalar('matkhau')
            ->maxLength('matkhau', 255)
            ->requirePresence('matkhau', 'create')
            ->notEmptyString('matkhau');

        return $validator;
    }
}
