<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
		$categories = $this->loadModel('Categories');
		$query = $categories->find('all');
		$this->set(compact('query'));
		$question = $this->loadModel('Question');
		$ques = $question->find();
        $user = $this->Users->get($id, [
            'contain' => ['Bids', 'Products']
        ]);
		$question = $this->loadModel('Question');
		$ques = $question->find()->where(['to_user_id' => $user->id]);
		$this->set(compact('ques'));
        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function register()
    {
		$categories = $this->loadModel('Categories');
		$query = $categories->find('all');
		$this->set(compact('query'));
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['controller' => 'Users','action' => 'login']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        $this->Auth->allow(['register', 'logout']);
		if (in_array($this->request->action, ['register', 'login']) && !empty($this->Auth->user('id'))) {
			$this->Flash->error(__('You are already logged in'));
			$this->redirect(['controller' => 'Products', 'action' => 'index']); 
}
    }
	
    public function login() {
		$categories = $this->loadModel('Categories');
		$query = $categories->find('all');
		$this->set(compact('query'));
		//session user
		if ($this->request->is('post')) {
			$user = $this->Auth->identify();
			if ($user) {
				$session = $this->request->session();
				$session->write('actlogin', $user);
				$this->Auth->setUser($user);
				return $this->redirect($this->Auth->redirectUrl());
			}
			$this->Flash->error(__('Invalid username or password, try again'));
		}
    }

    public function logout()
    {
		$session = $this->request->session();
		$session->destroy();
        return $this->redirect($this->Auth->logout());
    }
}
