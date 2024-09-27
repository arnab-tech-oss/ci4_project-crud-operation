<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users'; // The name of the database table
    protected $primaryKey = 'id'; // The primary key of the table

    // Fields that can be inserted or updated
    protected $allowedFields = ['name', 'email', 'password', 'age'];

    // Validation rules
    protected $validationRules = [
        'name'     => 'required|min_length[3]|max_length[100]',
        'email'    => 'required|valid_email|is_unique[users.email]',
        'password' => 'required|min_length[6]',
        'age'      => 'permit_empty|integer|less_than[120]',
    ];

    // Optional: Validation messages
    protected $validationMessages = [
        'name' => [
            'required' => 'You must provide a name.',
            'min_length' => 'Name must be at least 3 characters long.',
            'max_length' => 'Name cannot exceed 100 characters.',
        ],
        'email' => [
            'required' => 'You must provide an email address.',
            'valid_email' => 'Please enter a valid email address.',
            'is_unique' => 'This email is already registered.',
        ],
        'password' => [
            'required' => 'You must provide a password.',
            'min_length' => 'Password must be at least 6 characters long.',
        ],
        'age' => [
            'integer' => 'Age must be an integer.',
            'less_than' => 'Age must be less than 120.',
        ],
    ];
    public function getAllUsers()
    {
        return $this->findAll();
    }
}
