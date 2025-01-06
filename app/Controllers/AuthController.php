<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function login()
    {
        return view('auth');
    }

    // Proses login
    public function loginSubmit()
    {
        $validation = \Config\Services::validation();

        // Validasi input
        if (
            !$this->validate([
                'login-email' => 'required|valid_email',
                'login-password' => 'required',
            ])
        ) {
            return redirect()->to('/login')->withInput()->with('errors', $validation->getErrors());
        }

        $email = $this->request->getPost('login-email');
        $password = $this->request->getPost('login-password');

        $userModel = new UserModel();
        $user = $userModel->where('email', $email)->first();

        // Cek apakah user ada dan password cocok
        if ($user && password_verify($password, $user['password'])) {
            // Set session jika login berhasil
            session()->set('user_id', $user['id']);
            session()->set('username', $user['username']);
            return redirect()->to('/dashboard');
        } else {
            return redirect()->to('/login')->with('error', 'Email atau password salah.');
        }
    }

    // Proses registrasi
    public function registerSubmit()
    {
        $validation = \Config\Services::validation();

        // Validasi input
        if (
            !$this->validate([
                'signup-email' => 'required|valid_email|is_unique[users.email]',
                'signup-password' => 'required|min_length[8]',
                'signup-password-confirm' => 'matches[signup-password]',
            ])
        ) {
            return redirect()->to('/login')->withInput()->with('errors', $validation->getErrors());
        }

        $userModel = new UserModel();
        $data = [
            'email' => $this->request->getPost('signup-email'),
            'username' => $this->request->getPost('signup-username'),
            'password' => password_hash($this->request->getPost('signup-password'), PASSWORD_BCRYPT),
        ];

        // Insert data pengguna ke database
        $userModel->save($data);

        return redirect()->to('/login')->with('success', 'Registrasi berhasil, silakan login.');
    }

    // Logout
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
