<?php

namespace App\Http\Services;

use App\Http\Services\ImageService;
use App\Http\Services\BaseService;
use App\Http\Models\User;
use App\Http\Models\Role;
use Auth;
use DB;
use Exception;

class UserService extends BaseService
{
    public function updatePassword($data)
    {
        try {
            $user = Auth::user();
            $user->password = bcrypt($data['password']);
            $user->save();
        } catch (Exception $e) {
             \Log::error($e->getMessage());
            return ['message' => 'Couldn\'t update the password.', 'type' => 'danger'];
        }
        return ['message' => 'Successfully updated the password.', 'type' => 'success'];
    }

    public function createUser($data)
    {
        try {
            $user = new User;
            $user->first_name       = $data['first_name'];
            $user->last_name        = $data['last_name'];
            $user->home_phone_no    = $data['home_phone'];
            $user->mobile_no        = $data['mobile_no'];
            $user->email            = $data['email'];
            $user->address          = $data['address'];
            $user->password         = bcrypt($data['password']);
            $user->status           = $data['status'];
            DB::transaction(function () use ($user, $data) {
                $user->save();

                $role = Role::where('id', $data['role'])->first();
                if (!is_null($role)) {
                    $user->roles()->attach($role->id);
                } else {
                    throw new Exception('Invalid role type');
                }
            });
        } catch (Exception $e) {
            \Log::error($e->getMessage());
            return ['message' => 'Couldn\'t create the user.', 'type' => 'danger'];
        }
        return ['message' => 'Successfully created the user.', 'type' => 'success'];
    }

    public function updateUser($data)
    {
        try {
            $user = User::find($data['id']);
            $user->first_name       = $data['first_name'];
            $user->last_name        = $data['last_name'];
            $user->home_phone_no    = $data['home_phone'];
            $user->mobile_no        = $data['mobile_no'];
            $user->email            = $data['email'];
            $user->address          = $data['address'];
            $user->status           = $data['status'];
            DB::transaction(function () use ($user, $data) {
                $user->save();

                $role = Role::where('id', $data['role'])->first();
                if (!is_null($role)) {
                    $user->roles()->detach();
                    $user->roles()->attach($role->id);
                } else {
                    throw new Exception('Invalid role type', 1);
                }
            });
        } catch (Exception $e) {
            \Log::error($e->getMessage());
            return ['message' => 'Couldn\'t update the user.', 'type' => 'danger'];
        }
        return ['message' => 'Successfully updated the user.', 'type' => 'success'];
    }

    public function updateUserProfile($data)
    {
        try {
            $user = User::find($data['id']);
            $user->first_name       = $data['first_name'];
            $user->last_name        = $data['last_name'];
            $user->home_phone_no    = $data['home_phone'];
            $user->mobile_no        = $data['mobile_no'];
            $user->address          = $data['address'];
            if (isset($data['avatar'])) {
                $imageService = new ImageService;
                $path = $imageService->uploadImageByFile($data['avatar'], 'images/avatars/'.$data['id']);
                $user->avatar       = $path;
            }
            DB::transaction(function () use ($user, $data) {
                $user->save();
            });
        } catch (Exception $e) {
            \Log::error($e->getMessage());
            return ['message' => 'Couldn\'t update the profile.', 'type' => 'danger'];
        }
        return ['message' => 'Successfully updated the profile.', 'type' => 'success'];
    }
}