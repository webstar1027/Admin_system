<?php 
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table
{
 
	public function initialize(array $config)
	{
	  $this->table('pheramor_user');
	}
    public function validationDefault(Validator $validator)
    {
        return $validator
            ->notEmpty('username', 'A email is required')
            ->notEmpty('password', 'A password is required')
            ->notEmpty('role', 'A role is required');            
    }
}