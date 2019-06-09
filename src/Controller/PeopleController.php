<?php
namespace App\Controller;

use App\Controller\AppController;

class PeopleController extends AppController {

    public $paginate = [
        'finder' => 'byAge',
        'limit' => 5,
        'contain' => ['Messages'],
    ];

    public function initialize() {
        parent::initialize();
        $this->loadComponent('Paginator');
    }

    public function index() {
        // if ($this->request->is('post')) {
            $data = $this->paginate($this->People);
            $this->set('data', $data);
            // $find = $this->request->data['People']['find'];
            // $arr = explode(',',$find);
            // $condition = ['conditions'=>['name like'=>$find]];
            // $condition = ['conditions'=>['age <=' => $find]];
            // $condition = ['conditions'=>[
                // 'and' =>[
                //     'age >=' => $arr[0],
                //     'age <=' => $arr[1]
                // 'or' =>[
                //     'name like' => $find,
                //     'mail like' => $find
                // ]
            // ]];
            // $condition = [
            //     'conditions' => ['name like' => $find],
            //     'order' => ['People.age' => 'desc'] 
            // ];
            // $condition = ['limit' => 3, 'page' => $find];
            // $data = $this->People->find('all', $condition);
            // $data = $this->People->findByNameOrMail($find, $find);
            // $data = $this->People->find()->where(['name'=>$find]);
            // $data = $this->People->find()
                // ->where(['age >=' => $arr[0]])
                // ->andwhere(['age <=' => $arr[1]])
                // ->order(['People.age' => 'asc']);
                // ->order(['People.age' => 'asc'])
                // ->order(['People.name' => 'asc'])
                // ->limit(3)->page($find);
            // $data = $this->People->find('me', ['me' => $find])
            //     ->contain(['Messages']);
        // } else {
            // $data = $this->People->find('all');
            // $data = $this->People->find('all',
            //     ['order' => ['People.age' => 'asc']]
            // $data = $this->People->find()
            //     ->order(['People.age' => 'asc'])
            //     ->order(['People.name' => 'asc']);
        //     $data = $this->People->find('byAge')
        //         ->contain(['Messages']);
        // }
        // $this->set('data', $data);
    }

    public function delete() {
        $id = $this->request->query['id'];
        $entity = $this->People->get($id);
        $this->set('entity', $entity);
    }

    public function destroy() {
        if ($this->request->is('post')) {
            $data = $this->request->data['People'];
            $entity = $this->People->get($data['id']);
            $this->People->delete($entity);
        }
        return $this->redirect(['action'=>'index']);
    }

    public function edit() {
        $id = $this->request->query['id'];
        $entity = $this->People->get($id);
        $this->set('entity', $entity);
    }

    public function update() {
        if ($this->request->is('port')) {
            $data = $this->request->data['People'];
            $entity = $this->People->get($data['id']);
            $this->People->patchEntity($entity, $data);
            $this->People->save($entity);
        }
        return $this->redirect(['action'=>'index']);
    }

    public function add() {
        $msg = 'please type your personal data...';
        $entity = $this->People->newEntity();
        if ($this->request->is('post')){
            $data = $this->request->data['People'];
            $entity = $this->People->newEntity($data);
            if ($this->People->save($entity)) {
                return $this->redirect(['actions'=>'index']);
            }
            $msg = 'Error was occured...';
        }
        $this->set('msg', $msg);
        $this->set('entity', $entity);
    }

    // addを追加したら使わなくなった
    public function create() {
        if ($this->request->is('post')) {
            $data = $this->request->data['People'];
            $entity = $this->People->newEntity($data);
            $this->People->save($entity);
        }
        return $this->redirect(['action'=>'index']);
    }
}