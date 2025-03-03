<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Diemtb Controller
 *
 * @property \App\Model\Table\DiemtbTable $Diemtb
 * @method \App\Model\Entity\Diemtb[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DiemtbController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'order' => [
                'Diemtb.diem_tich_luy' => 'desc'
            ]
        ];
        $diemtb = $this->paginate($this->Diemtb);

        $this->set(compact('diemtb'));
    }

    /**
     * View method
     *
     * @param string|null $id Diemtb id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $diemtb = $this->Diemtb->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('diemtb'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $diemtb = $this->Diemtb->newEmptyEntity();
        if ($this->request->is('post')) {
            $diemtb = $this->Diemtb->patchEntity($diemtb, $this->request->getData());
            if ($this->Diemtb->save($diemtb)) {
                $this->Flash->success(__('The diemtb has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The diemtb could not be saved. Please, try again.'));
        }
        $this->set(compact('diemtb'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Diemtb id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $diemtb = $this->Diemtb->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $diemtb = $this->Diemtb->patchEntity($diemtb, $this->request->getData());
            if ($this->Diemtb->save($diemtb)) {
                $this->Flash->success(__('The diemtb has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The diemtb could not be saved. Please, try again.'));
        }
        $this->set(compact('diemtb'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Diemtb id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $diemtb = $this->Diemtb->get($id);
        if ($this->Diemtb->delete($diemtb)) {
            $this->Flash->success(__('The diemtb has been deleted.'));
        } else {
            $this->Flash->error(__('The diemtb could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
