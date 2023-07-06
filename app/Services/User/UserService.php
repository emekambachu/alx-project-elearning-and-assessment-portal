<?php

namespace App\Services\User;

use App\Http\Resources\User\UserResource;
use App\Models\Brace\User;
use App\Services\Base\CrudService;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserService
{
    protected string $imagePath = 'photos/users';
    protected string $documentPath = 'documents/businesses';

    public function braceUser(): User
    {
        return new User;
    }

    public function user(): User
    {
        return new User;
    }

    public function userWithRelations(): \Illuminate\Database\Eloquent\Builder
    {
        return $this->braceUser()->with('business', 'question', 'country', 'submitted_assignment');
    }

    public function userById($userId){
        return $this->userWithRelations()->findOrFail($userId);
    }

    public function selectedUsers(): \Illuminate\Database\Eloquent\Builder
    {
        return $this->userWithRelations()->where('selected', 1);
    }

    public function selectedUsersWithAssessments(): \Illuminate\Database\Eloquent\Builder
    {
        return $this->braceUser()->with('module_assessments', 'business')
            ->has('module_assessments')
            ->where('selected', 1);
    }

    public function updateAnyField($request, $userId): array
    {
        $input = $request->all();
        $userArray = $this->userById($userId)->toArray();
        $user = $this->userById($userId);
        $fields = ['image', 'password']; // Include fields

        $updatedInput = [];
        // Add password field to array, for some reason password field dissapears when user object is converted to array
        $userArray['password'] = $this->userById($userId)->password;

        foreach ($userArray as $key => $value){
            if(!empty($input[$key]) && in_array($key, $fields)){
                if($key === 'image'){
                    Session::put('previous_image', $user->image);
                    $image = CrudService::uploadAndCompressImage(
                        $request,
                        $this->imagePath,
                        null,
                        null,
                        'image'
                    );
                    $updatedInput[$key] = $image;
                    $updatedInput['image_path'] = $this->imagePath;

                }else if($key === 'password'){
                    $updatedInput[$key] = Hash::make($input[$key]);

                }else{
                    $updatedInput[$key] = $input[$key];
                }
            }
        }

        $user->update($updatedInput);
        // Delete previous image if it was updated
        if(Session::has('previous_image') && Session::get('previous_image') !== $user->image){
            if(File::exists(public_path() . '/'.$this->imagePath.'/' . Session::get('previous_image'))){
                FILE::delete(public_path() . '/'.$this->imagePath.'/' . Session::get('previous_image'));
            }
        }

        return [
            'success' => true,
            'user' => new UserResource($user),
            'message' => 'Updated',
        ];
    }
}
