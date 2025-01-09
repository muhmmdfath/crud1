<?php

namespace App\Controllers;
use App\Models\Karyawan;
use App\Models\LocalPartModel;

class Home extends BaseController
{
    public function home(): string
    {
        return view('welcome_message');
    }

    public function index()
    {
        $model = new Karyawan();
        $modelpart = new LocalPartModel();

        $data['karyawan'] = $model->findAll();
        $data['part'] = $modelpart->findAll();

        return view('index', $data);
    }

    public function tambah()
    {
        // Menampilkan form tambah karyawan
        return view('tambah');
    }

    public function simpan()
    {
        // Mengambil data dari form input
        $nama_depan = $this->request->getPost('nama_depan');
        $nama_belakang = $this->request->getPost('nama_belakang');
        $departemen = $this->request->getPost('departemen');

        $model = new Karyawan();

        // Menyimpan data karyawan ke database
        $model->save([
            'nama_depan' => $nama_depan,
            'nama_belakang' => $nama_belakang,
            'departemen' => $departemen,
        ]);

        // Redirect ke halaman utama setelah data disimpan
        return redirect()->to('/karyawan');
    }

    public function edit($id)
    {
        // Menyiapkan model
        $model = new Karyawan();

        // Ambil data karyawan berdasarkan ID
        $data['karyawan'] = $model->find($id);

        // Pastikan data ditemukan
        if (!$data['karyawan']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Karyawan tidak ditemukan');
        }

        // Kirim data ke view
        return view('edit', $data);
    }


    public function update($id)
    {
        // Mengambil data dari form input
        $nama_depan = $this->request->getPost('nama_depan');
        $nama_belakang = $this->request->getPost('nama_belakang');
        $departemen = $this->request->getPost('departemen');

        // Menyiapkan model
        $model = new Karyawan();

        // Update data karyawan berdasarkan ID
        $model->update($id, [
            'nama_depan' => $nama_depan,
            'nama_belakang' => $nama_belakang,
            'departemen' => $departemen,
        ]);

        // Redirect ke halaman utama setelah data diupdate
        return redirect()->to('/karyawan');
    }


    public function delete($id)
    {
        // Menyiapkan model
        $model = new Karyawan();

        // Hapus data karyawan berdasarkan ID
        $model->delete($id);

        // Redirect ke halaman utama setelah data dihapus
        return redirect()->to('/karyawan');
    }

}
