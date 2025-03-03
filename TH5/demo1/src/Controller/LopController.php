<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Lop Controller
 *
 * @property \App\Model\Table\LopTable $Lop
 * @method \App\Model\Entity\Lop[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LopController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $lop = $this->paginate($this->Lop);

        $this->set(compact('lop'));
    }

    /**
     * View method
     *
     * @param string|null $id Lop id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $lop = $this->Lop->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('lop'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $lop = $this->Lop->newEmptyEntity();
        if ($this->request->is('post')) {
            $lop = $this->Lop->patchEntity($lop, $this->request->getData());
            if ($this->Lop->save($lop)) {
                $this->Flash->success(__('The lop has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The lop could not be saved. Please, try again.'));
        }
        $this->set(compact('lop'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Lop id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $lop = $this->Lop->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $lop = $this->Lop->patchEntity($lop, $this->request->getData());
            if ($this->Lop->save($lop)) {
                $this->Flash->success(__('The lop has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The lop could not be saved. Please, try again.'));
        }
        $this->set(compact('lop'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Lop id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $lop = $this->Lop->get($id);
        if ($this->Lop->delete($lop)) {
            $this->Flash->success(__('The lop has been deleted.'));
        } else {
            $this->Flash->error(__('The lop could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
