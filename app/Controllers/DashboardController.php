<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class DashboardController extends BaseController
{
    public function index()
    {
        $userId = session()->get('user_id');
        if (!$userId) {
            return redirect()->to('/login');
        }

        $categoryModel = new \App\Models\CategoryModel();
        $taskModel = new \App\Models\TaskModel();

        $categories = $categoryModel->findAll();
        $tasks = $taskModel->where('user_id', $userId)->findAll();

        $taskEdit = null;
        $editId = $this->request->getGet('edit');
        
        if ($editId && is_numeric($editId)) {
            $task = $taskModel->find($editId);
            if ($task && $task['user_id'] == $userId) {
                $taskEdit = $task;
            }
        }

        return view('dashboard/index', ['categories' => $categories, 'tasks' => $tasks, 'taskEdit' => $taskEdit]);
    }
}
