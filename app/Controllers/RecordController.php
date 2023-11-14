<?php

namespace App\Controllers;

use App\Controllers\BaseController;
// call database models
use App\Models\Records;


class RecordController extends BaseController
{
    public function UserData()
    {
        //get all data form database
        $records = new Records();
        $data['userdata'] = $records->findAll();
        return view('tabledata', $data);
    }
    public function AddUser()
    {
        return view('addUser');
    }
    //add user function
    public function insertUser()
    {
        $record = new Records();
        $first_name = $this->request->getPost('first_name');
        $last_name = $this->request->getPost('last_name');
        $city = $this->request->getPost('city');
        $userImage = $this->request->getFile('image');
    
        // Check if all required data is present and image type is allowed
        if (!empty($first_name) && !empty($last_name) && !empty($city) && $userImage !== null && $userImage->isValid()) {
            $allowedTypes = ['image/png', 'image/jpeg','image/jpg'];
    
            // Check if the uploaded file's MIME type is among the allowed types
            if (in_array($userImage->getMimeType(), $allowedTypes)) {
                // Check if the user already exists
                $existingUser = $record->where('first_name', $first_name)->first();
                if ($existingUser) {
                    return redirect()->to(site_url('addUsers'))->with('error', 'User already exists in the database.');
                } else {
                    // Assuming the 'uploads' directory exists and is where you want to save the images.
                    $newName = $userImage->getRandomName();
                    $userImage->move('images/', $newName);
    
                    // Save image path and user data to the database
                    $data = [
                        'first_name' => $first_name,
                        'last_name' => $last_name,
                        'city' => $city,
                        'image_path' =>$newName, // Save the path to the image in the database
                    ];
                    $record->save($data);
    
                    return redirect()->to(site_url('allrecord'))->with('status', 'User added successfully.');
                }
            } else {
                return redirect()->to(site_url('addUsers'))->with('error', 'Please upload a PNG or JPEG image.');
            }
        } else {
            return redirect()->to(site_url('addUsers'))->with('error', 'Please provide all required information and a valid image.');
        }
    }


    // edit user data
    public function editUser($id)
    {
        $records = new Records();
        $data['userdata'] = $records->find($id);
        // echo $id; 
        return view('edit', $data);
    }
    // update userdata
    public function updateUser($id)
    {
        $records = new Records();
        $first_name = $this->request->getPost('first_name');
        $last_name = $this->request->getPost('last_name');
        $city = $this->request->getPost('city');
        $userImage = $this->request->getFile('image');
        $olddata = $records->find($id);
        $oldImage = $olddata['image_path'];
        if (!empty($userImage) && $userImage->isValid() && !$userImage->hasMoved()) {
            $allowedTypes = ['image/png', 'image/jpeg', 'image/jpg'];
            if (in_array($userImage->getMimeType(), $allowedTypes)) {
                $newName = $userImage->getRandomName();
                $userImage->move('images/', $newName);
                // Check if there's an old image to unlink and update the database with the new image name
                if (!empty($oldImage) && file_exists('images/' . $oldImage)) {
                    unlink('images/' . $oldImage);
                }
            } else {
                return redirect()->to(site_url('edit'))->with('error', 'Please provide a valid image format.');
            }
        }
        if (!empty($first_name) && !empty($last_name) && !empty($city)) {
            $data = [
                'first_name' => $first_name,
                'last_name' => $last_name,
                'city' => $city,
            ];
            if (!empty($newName)) {
                // If a new image is uploaded, update the 'image' field in the database
                $data['image_path'] = $newName;
            }
    
            $records->update($id, $data);
            return redirect()->to(site_url('allrecord'))->with('status', 'User updated successfully.');
        } else {
            return redirect()->to(site_url('addUsers'))->with('error', 'Please provide all required information.');
        }
    }
    


    // delete user 
    public function delete($id){
        $records = new Records();
        $olddata = $records->find($id);
        $oldImage = $olddata['image_path'];
        if (!empty($oldImage) && file_exists('images/' . $oldImage)) {
            unlink('images/' . $oldImage);
        }
        $records->delete($id);
        return redirect()->to(site_url('allrecord'))->with('status', 'User delete successfully.');
    }
}
