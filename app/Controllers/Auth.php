<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\AdminModel;

class Auth extends Controller
{
    public function index()
    {
        return view('admin/login');
    }

    public function login()
    {
        $session = session();
        $model = new AdminModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Cek username dan password langsung
        $admin = $model->where('username', $username)
                       ->where('password', $password)
                       ->first();

        if($admin){
            $session->set([
                'username' => $admin['username'],
                'is_admin' => TRUE
            ]);
            return redirect()->to('/dashboard'); // redirect ke dashboard
        } else {
            $session->setFlashdata('error', 'Username atau Password salah');
            return redirect()->to('/admin/login');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/admin/login');
    }
}