<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table = 'tasks';
    protected $primaryKey = 'task_id';
    protected $allowedFields = ['user_id', 'category_id', 'title', 'description', 'deadline', 'status'];

    public function getTasksByUser($userId)
    {
        if (!$userId) {
            return [];
        }
        return $this->select('tasks.*, categories.name as category_name')
                    ->join('categories', 'categories.category_id = tasks.category_id')
                    ->where('tasks.user_id', $userId)
                    ->orderBy('tasks.deadline', 'ASC')
                    ->findAll();
    }
}