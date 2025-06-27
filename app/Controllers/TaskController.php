<?php

namespace App\Controllers;

use App\Models\TaskModel;
use App\Models\CategoryModel;
use App\Models\UserModel;
use CodeIgniter\Controller;

class TaskController extends BaseController
{
    protected $taskModel;
    protected $categoryModel;
    protected $userModel;

    public function __construct()
    {
        $this->taskModel = new TaskModel();
        $this->categoryModel = new CategoryModel();
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $userId = 1; // simulasi user login
        $data['tasks'] = $this->taskModel->getTasksByUser($userId);
        return view('tasks/index', $data);
    }

    public function create()
    {
        $data['categories'] = $this->categoryModel->findAll();
        return view('tasks/create', $data);
    }

    public function store()
    {
        $userId = 1;
        $this->taskModel->save([
            'user_id'     => $userId,
            'category_id' => $this->request->getPost('category_id'),
            'title'       => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'deadline'    => $this->request->getPost('deadline'),
            'status'      => 'pending'
        ]);
        return redirect()->to('/tasks');
    }

    public function edit($id)
    {
        $data['task'] = $this->taskModel->find($id);
        $data['categories'] = $this->categoryModel->findAll();
        return view('tasks/edit', $data);
    }

    public function update($id)
    {
        $this->taskModel->update($id, [
            'category_id' => $this->request->getPost('category_id'),
            'title'       => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'deadline'    => $this->request->getPost('deadline'),
            'status'      => $this->request->getPost('status')
        ]);
        return redirect()->to('/tasks');
    }

    public function delete($id)
    {
        $this->taskModel->delete($id);
        return redirect()->to('/tasks');
    }
}