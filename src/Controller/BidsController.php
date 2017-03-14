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

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Products']
        ];
        $bids = $this->paginate($this->Bids);

        $this->set(compact('bids'));
        $this->set('_serialize', ['bids']);
    }

    /**
     * View method
     *
     * @param string|null $id Bid id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $bid = $this->Bids->get($id, [
            'contain' => ['Users', 'Products', 'Bidstatus']
        ]);

        $this->set('bid', $bid);
        $this->set('_serialize', ['bid']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $bid = $this->Bids->newEntity();
        if ($this->request->is('post')) {
            $bid = $this->Bids->patchEntity($bid, $this->request->getData());
            if ($this->Bids->save($bid)) {
                $this->Flash->success(__('The bid has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bid could not be saved. Please, try again.'));
        }
        $users = $this->Bids->Users->find('list', ['limit' => 200]);
        $products = $this->Bids->Products->find('list', ['limit' => 200]);
        $this->set(compact('bid', 'users', 'products'));
        $this->set('_serialize', ['bid']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Bid id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $bid = $this->Bids->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bid = $this->Bids->patchEntity($bid, $this->request->getData());
            if ($this->Bids->save($bid)) {
                $this->Flash->success(__('The bid has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bid could not be saved. Please, try again.'));
        }
        $users = $this->Bids->Users->find('list', ['limit' => 200]);
        $products = $this->Bids->Products->find('list', ['limit' => 200]);
        $this->set(compact('bid', 'users', 'products'));
        $this->set('_serialize', ['bid']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Bid id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bid = $this->Bids->get($id);
        if ($this->Bids->delete($bid)) {
            $this->Flash->success(__('The bid has been deleted.'));
        } else {
            $this->Flash->error(__('The bid could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
