<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class Testcontroller extends BaseController
{
    public function showfrom(){
        return view('test_page');
    }

    public function submitfrom()
    {
        $model = new UserModel();

        $data = [
            'name'     => $this->request->getPost('name'),
            'email'    => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'age'      => $this->request->getPost('age'),
        ];

        if ($model->save($data)) {
            return redirect()->to('/list');
        } else {
            // Handle validation errors or failure
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }
    }
        // return view('test_page');

        public function landing_page(){
            return view('landingpage');
        }

        public function index(){
            {
                $userModel = new UserModel();
                $data['datas'] = $userModel->getAllUsers(); // Use the method to fetch data
                return view('index', $data);
            }
        }
        public function edit($id){
            $userModel = new UserModel();

            // Fetch the user data by ID
            $data['user'] = $userModel->find($id);
    
            if (!$data['user']) {
                throw new \CodeIgniter\Exceptions\PageNotFoundException("Cannot find the user with ID: $id");
            }
    
            // Load the view and pass the user data
            return view('edit', $data);
        }
        public function update()
        {
            $userModel = new UserModel();

            // Get the user ID from the form
            $id = $this->request->getPost('id');
    
            // Set validation rules
            $rules = [
                'name'  => 'required|min_length[3]|max_length[100]',
                'email' => 'required|valid_email',
                'age'   => 'permit_empty|integer|less_than[120]',
            ];
    
            // Validate form data
            if (!$this->validate($rules)) {
                // Validation failed, redirect back with input and errors
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }
    
            // Prepare data for update
            $updatedData = [
                'name'  => $this->request->getPost('name'),
                'email' => $this->request->getPost('email'),
                'age'   => $this->request->getPost('age'),
            ];
    
            // Update the user data in the database
            if ($userModel->update($id, $updatedData)) {
                // Redirect to the user list or show success message
                return redirect()->to('/list')->with('message', 'User updated successfully!');
            } else {
                // Handle the case where the update fails
                return redirect()->back()->with('errors', ['update' => 'Failed to update user.']);
            }
        }

        public function delete($id){
            $userModel = new UserModel();

            // Check if the ID exists
            $user = $userModel->find($id);
    
            if (!$user) {
                // If the user does not exist, show an error message
                return redirect()->to('/users')->with('errors', 'User not found.');
            }
    
            // Delete the user from the database
            if ($userModel->delete($id)) {
                // Redirect to the user list with a success message
                return redirect()->to('/list')->with('message', 'User deleted successfully!');
            } else {
                // Handle the case where the deletion fails
                return redirect()->to('/list')->with('errors', 'Failed to delete user.');
            }
        }
    }

