<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 */
class ProductsController extends AppController
{
	var $paginate = array('limit' => 15, 'order' => array('id'));

	public function isAuthorized($user) {
		// All registered users can add products
		if ($this->request->getParam('action') === 'add') {
			return true;
		}
		// Actions of The owner of an product
		if (in_array($this->request->getParam('action'), ['remove','sendmess'])) {
			$productId = (int)$this->request->getParam('pass.0');
			if ($this->Products->isOwnedBy($productId, $user['id'])) {
				return true;
			}
		}
		return parent::isAuthorized($user);
	}

    public function index() {
    	//load all products
		$products = $this->paginate($this->Products);
		$this->set(compact('products'));
		$this->set('_serialize', ['products']);
		//load categories
		$category = $this->loadModel('Categories');
		$query = $category->find('all');
		$this->set(compact('query'));
		//load top bid products
		foreach ($products as $top) {
  		$a = $top->id;
  		$top1 = $this->loadModel('Bids');
  		$query1 = $top1->find()->where(['product_id' => $a])->count();
  		$query2 = $this->Products->find();
     	$query2->innerJoin(['Bids' => 'bids'], ['Products.id = Bids.product_id']);
     	$query2->orderDesc($query1);
     	$query2->limit('5');
     	$this->set(compact('query2'));
		}
	}

    public function view($id = null) {
		$categories = $this->loadModel('Categories');
		$query = $categories->find('all');
		$this->set(compact('query'));
        $product = $this->Products->get($id, [
            'contain' => ['Users']
        ]);
		$bids = $this->loadModel('Bids');
		$test = $bids->find()->contain(['Users'])->where(['product_id'=>$id])->order(['bid_price' => 'DESC']);
		//get random product in same category
		$c = [];
		$a = $categories->find();
		foreach ($a as $t){
			$c[] = $t->id;
		}
		$query1 = $this->Products->find()->where(['category_id IN' => $c, 'category_id' => $product->category_id])->order('rand()')->limit(5);
		$this->set(compact('query1'));
		//get max bid value
		$count = $bids->find()->where(['product_id' => $product->id])->count();
		$maxbids = $bids->find()->select(['bid_price' => 'Max(Bids.bid_price)'])->where(['product_id' => $id])->first();
		$this->set(compact('test', 'count','maxbids'));
        $this->set('product', $product);
        $this->set('_serialize', ['product']);
    }

    public function add() {
		$categories = $this->loadModel('Categories');
		$query = $categories->find('all');
		$this->set(compact('query'));
		$products = $this->Products->newEntity();
			if ($this->request->is('post')) {
				$products = $this->Products->patchEntity($products, $this->request->getData());
				//set id for item
				$products->creator_id = $this->Auth->user('id');
				if ($this->Products->save($products)) {
					$this->Flash->success(__('Your Products has been registered for bidding!'));
				return $this->redirect(['action' =>'index']);
				}
				$this->Flash->error(__("There are some error, please try again!"));
			}
		$this->set(compact('products'));
		$this->set('_serialize', ['products']);
		}

    public function categorydetail($id = null) {
        $category = $this->loadModel('Categories');
        $query = $category->find('all');
		$a = $this->Categories->get($id);
    	$list = $this->paginate($this->Products->find()->where(['category_id' => $a->id]));
		$this->set(compact('list'));
		$this->set('_serialize', ['list']);
    	$this->set('a', $a);
        $this->set('query', $query);
    }

	public function about() {
		$categories = $this->loadModel('Categories');
		$query = $categories->find('all');
		$this->set(compact('query'));
	}

    public function remove($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $products = $this->Products->get($id);
        if ($this->Products->delete($products)) {
            $this->Flash->success(__('Your product has been remove.'));
        } else {
            $this->Flash->error(__('Your product could not be deleted. Please, try again.'));
        }
        return $this->redirect(['controller' => 'Products', 'action' => 'index']);
    }
}
