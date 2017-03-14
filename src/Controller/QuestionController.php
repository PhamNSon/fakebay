<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Question Controller
 *
 * @property \App\Model\Table\QuestionTable $Question
 */
class QuestionController extends AppController
{
	public function isAuthorized($user) {
		// The owner of an question can edit and delete it
		if (in_array($this->request->getParam('action'), ['remove','sendmess'])) {
			$questionId = (int)$this->request->getParam('pass.0');
			if ($this->Question->isOwnedBy($questionId, $user['id'])) {
				return true;
			}
		}
		return parent::isAuthorized($user);
	}

    public function sendmess()
    {
        $question = $this->Question->newEntity();
        if ($this->request->is('post')) {
			//load Sender and Receiver and Product id
			$session = $this->request->session();
			$user = $session->read('actlogin');
            $question = $this->Question->patchEntity($question, $this->request->getData());
			$question->from_user_id = $user['id'];
			$question->status = 1;
            if ($this->Question->save($question)) {
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The question could not be sent. Please, try again.'));
        }
        $this->set(compact('question'));
        $this->set('_serialize', ['question']);
    }
    /**
     * Delete method
     *
     * @param string|null $id Question id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function remove($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $question = $this->Question->get($id);
        if ($this->Question->delete($question)) {
            $this->Flash->success(__('This question has been remove.'));
        } else {
            $this->Flash->error(__('This question could not be deleted. Please, try again.'));
        }
        return $this->redirect(['controller' => 'Products', 'action' => 'index']);
    }
}
