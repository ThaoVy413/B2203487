<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Diem Controller
 *
 * @property \App\Model\Table\DiemTable $Diem
 * @method \App\Model\Entity\Diem[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DiemController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $diem = $this->paginate($this->Diem);

        $this->set(compact('diem'));
    }

    /**
     * View method
     *
     * @param string|null $id Diem id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $diem = $this->Diem->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('diem'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $diem = $this->Diem->newEmptyEntity();
        if ($this->request->is('post')) {
            $diem = $this->Diem->patchEntity($diem, $this->request->getData());
            if ($this->Diem->save($diem)) {
                $this->Flash->success(__('The diem has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The diem could not be saved. Please, try again.'));
        }
        $this->set(compact('diem'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Diem id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $diem = $this->Diem->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $diem = $this->Diem->patchEntity($diem, $this->request->getData());
            if ($this->Diem->save($diem)) {
                $this->Flash->success(__('The diem has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The diem could not be saved. Please, try again.'));
        }
        $this->set(compact('diem'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Diem id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $diem = $this->Diem->get($id);
        if ($this->Diem->delete($diem)) {
            $this->Flash->success(__('The diem has been deleted.'));
        } else {
            $this->Flash->error(__('The diem could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
