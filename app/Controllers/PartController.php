<?php
namespace App\Controllers;
use App\Models\OITMModel;
use App\Models\LocalPartModel;
use CodeIgniter\Controller;

class PartController extends BaseController
{
    public function search()
    {
        $field = $this->request->getVar('field'); // 'code' atau 'name'
        $keyword = $this->request->getVar('keyword');

        $model = new OITMModel();
        if ($field === 'code') {
            $parts = $model->like('ItemCode', $keyword)->findAll(10);
        } else {
            $parts = $model->like('ItemName', $keyword)->findAll(10);
        }

        return $this->response->setJSON($parts);
    }

    public function save()
    {
        $partCode = $this->request->getPost('part_code');
        $partName = $this->request->getPost('part_name');

        $localModel = new LocalPartModel();
        $localModel->insert([
            'part_code' => $partCode,
            'part_name' => $partName
        ]);

        return redirect()->to('/karyawan')->with('success', 'Part berhasil disimpan.');
    }

    public function delete($id)
    {
        $model = new LocalPartModel();

        $model->delete($id);

        return redirect()->to('/karyawan');
    }
}
