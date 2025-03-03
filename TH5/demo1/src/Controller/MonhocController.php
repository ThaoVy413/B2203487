<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Monhoc Controller
 *
 * @property \App\Model\Table\MonhocTable $Monhoc
 * @method \App\Model\Entity\Monhoc[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MonhocController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $monhoc = $this->paginate($this->Monhoc);

        $this->set(compact('monhoc'));
    }

    /**
     * View method
     *
     * @param string|null $id Monhoc id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $monhoc = $this->Monhoc->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('monhoc'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $monhoc = $this->Monhoc->newEmptyEntity();
        if ($this->request->is('post')) {
            $monhoc = $this->Monhoc->patchEntity($monhoc, $this->request->getData());
            if ($this->Monhoc->save($monhoc)) {
                $this->Flash->success(__('The monhoc has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The monhoc could not be saved. Please, try again.'));
        }
        $this->set(compact('monhoc'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Monhoc id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $monhoc = $this->Monhoc->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $monhoc = $this->Monhoc->patchEntity($monhoc, $this->request->getData());
            if ($this->Monhoc->save($monhoc)) {
                $this->Flash->success(__('The monhoc has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The monhoc could not be saved. Please, try again.'));
        }
        $this->set(compact('monhoc'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Monhoc id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $monhoc = $this->Monhoc->get($id);
        if ($this->Monhoc->delete($monhoc)) {
            $this->Flash->success(__('The monhoc has been deleted.'));
        } else {
            $this->Flash->error(__('The monhoc could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
