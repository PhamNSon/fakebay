<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Bidstatus Model
 *
 * @method \App\Model\Entity\Bidstatus get($primaryKey, $options = [])
 * @method \App\Model\Entity\Bidstatus newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Bidstatus[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Bidstatus|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Bidstatus patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Bidstatus[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Bidstatus findOrCreate($search, callable $callback = null, $options = [])
 */
class BidstatusTable extends Table
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

        $this->setTable('bidstatus');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Bids', [
            'foreignKey' => 'id_status',
            'joinType' => 'INNER'
        ]);
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
            ->integer('id_status')
            ->allowEmpty('id_status');

        $validator
            ->allowEmpty('name');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['id_status'], 'Bids'));
        return $rules;
    }
}
