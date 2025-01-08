<?php

namespace App\Controllers;
use App\Models\OITMModel;
use CodeIgniter\Controller;

class PartController extends Controller
{
    public function searchOITM()
    {
        $keyword = $this->request->getVar('keyword');
        $oitmModel = new OITMModel();

        if (!empty($keyword)) {
            $datapart = $oitmModel->searchItem($keyword);
        } else {
            $datapart = [];
        }

        return $this->response->setJSON($datapart);
    }
}
