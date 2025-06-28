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
        $userId = session()->get('user_id');
        $this->taskModel->save([
            'user_id'     => $userId,
            'category_id' => $this->request->getPost('category_id'),
            'title'       => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'deadline'    => $this->request->getPost('deadline'),
            'status'      => 'pending'
        ]);
        return redirect()->to('/dashboard');
    }

    public function edit($id)
    {
        $userId = session()->get('user_id');

        $task = $this->taskModel
            ->where('task_id', $id)
            ->where('user_id', $userId)
            ->first();

        if (!$task) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Task tidak ditemukan atau bukan milik Anda.");
        }

        $categories = $this->categoryModel->findAll();
        $tasks = $this->taskModel->where('user_id', $userId)->findAll();

        return view('dashboard/index', [
            'taskEdit' => $task,
            'categories' => $categories,
            'tasks' => $tasks,
        ]);
    }

    public function update($id)
    {
        $userId = session()->get('user_id');

        $task = $this->taskModel
            ->where('task_id', $id)
            ->where('user_id', $userId)
            ->first();

        if (!$task) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Task not found or you don't have permission.");
        }

        $this->taskModel->update($id, [
            'category_id' => $this->request->getPost('category_id'),
            'title'       => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'deadline'    => $this->request->getPost('deadline'),
            'status'      => $this->request->getPost('status')
        ]);

        return redirect()->to('/dashboard');
    }


    public function delete($id)
    {
        $this->taskModel->delete($id);
        return redirect()->to('/dashboard');
    }
}