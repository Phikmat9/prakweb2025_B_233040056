<?php

class User extends Controller
{
    public function index()
    {
        $data["judul"] = "Data user";
        $data['users'] = $this->model('User_model')->getAllUsers();
        
        $this->view('templates/header', $data);
        $this->view('list', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $data["judul"] = "Detail user";
        $data['user'] = $this->model('User_model')->getUserById($id);

        $this->view('templates/header', $data);
        $this->view('detail', $data);
        $this->view('templates/footer');
    }

    public function create()
    {
        $data['judul'] = "Tambah Data User";
        $this->view('templates/header', $data);
        $this->view('create'); 
        $this->view('templates/footer');
    }

    public function store()
    {
        if ($this->model('User_model')->tambahDataUser($_POST) > 0) {
            header('Location: '. BASEURL . '/user');
            exit;
        } else {
            header('Location: ' . BASEURL . '/user');
            exit;
        }
    }

    public function destroy($id)
    {
        if ($this->model('User_model')->hapusDataUser($id) > 0) {
            header('Location: ' . BASEURL . '/user');
            exit;
        } else {
            header('Location: ' . BASEURL . '/user');
            exit;
        }
    }

    public function edit($id)
    {
        $data['judul'] = "Ubah Data User";
        $data['user'] = $this->model('User_model')->getUserById($id); 
        
        $this->view('templates/header', $data);
        $this->view('edit', $data);
        $this->view('templates/footer');
    }

    public function update()
    {
        if ($this->model('User_model')->ubahDataUser($_POST) > 0) {
            header('Location: ' . BASEURL . '/user');
            exit;
        } else {
            header('Location: ' . BASEURL . '/user');
            exit;
        }
    }
}
?>