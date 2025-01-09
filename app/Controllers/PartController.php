<?php
namespace App\Controllers;
use App\Models\OITMModel;
use App\Models\LocalPartModel;
use CodeIgniter\Controller;

class PartController extends BaseController
{
    public function search()
    {
        $keyword = $this->request->getVar('keyword');
        $oitmModel = new OITMModel();
        $data = $oitmModel->searchItem($keyword);

        return $this->response->setJSON($data);
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
