<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Infors Model
 *
 * @method \App\Model\Entity\Infor get($primaryKey, $options = [])
 * @method \App\Model\Entity\Infor newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Infor[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Infor|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Infor patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Infor[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Infor findOrCreate($search, callable $callback = null, $options = [])
 */
class InforsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('infors');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('info');

        return $validator;
    }
}
