<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table = 'tasks';
    protected $allowedFields = ['user_id', 'category_id', 'title', 'description', 'deadline', 'status'];

    public function getTasksByUser($userId)
    {
        return $this->select('tasks.*, categories.name as category_name')
                    ->join('categories', 'categories.id = tasks.category_id')
                    ->where('tasks.user_id', $userId)
                    ->orderBy('tasks.deadline', 'ASC')
                    ->findAll();
    }
}