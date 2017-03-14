<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Bids Controller
 *
 * @property \App\Model\Table\BidsTable $Bids
 */
class BidsController extends AppController
{
	public function isAuthorized($user) {
		// The owner of an bid can delete it
		if (in_array($this->request->getParam('action'), ['remove','sentbid'])) {
			$bidId = (int)$this->request->getParam('pass.0');
			if ($this->Bids->isOwnedBy($bidId, $user['id'])) {
				return true;
			}
		}
		return parent::isAuthorized($user);
	}
    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function sentbid()
    {
        $bid = $this->Bids->newEntity();
        if ($this->request->is('post')) {
			pr($this->request->data);
			//load Sender and Receiver and Product id
			$session = $this->request->session();
			$user = $session->read('actlogin');
            $bid = $this->Bids->patchEntity($bid, $this->request->getData());
			$bid->user_id = $user['id'];
			$bid->status = 3;
            if ($this->Bids->save($bid)) {
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bid could not be sent. Please, try again.'));
        }
        $this->set(compact('bid'));
        $this->set('_serialize', ['bid']);
    }

    public function view($id = null)
    {
        $bid = $this->Bids->get($id, [
            'contain' => ['Users', 'Products', 'Bidstatus']
        ]);

        $this->set('bid', $bid);
        $this->set('_serialize', ['bid']);
    }

    public function remove($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $bid = $this->Bids->get($id);
        if ($this->Bids->delete($bid)) {
            $this->Flash->success(__("You've cancelled your bid!"));
        } else {
            $this->Flash->error(__('You could not remove your bid now. Please, try again.'));
        }
        return $this->redirect(['controller' => 'Products', 'action' => 'index']);
    }
}
