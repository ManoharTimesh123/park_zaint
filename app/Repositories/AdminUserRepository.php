<?php

namespace App\Repositories;

use App\Interfaces\AdminUserRepositoryInterface;
use App\Mail\NotificationMail;
use App\Models\PasswordReset;
use App\Models\User;

class AdminUserRepository implements AdminUserRepositoryInterface
{
    /**
     * This function retrieves an admin user by their ID.
     *
     * @param int userId The parameter `userId` is an integer that represents the unique identifier of
     * the admin user that we want to retrieve from the database.
     *
     * @return A user with the given ID is being returned. However, the `first()` method is unnecessary
     * since `find()` already returns a single model instance. So, the corrected code would be:
     */
    public function getUserById(int $userId)
    {
        return User::find($userId);
    }

    /**
     * This function retrieves an admin user by their Email ID.
     *
     * @param string emailId The parameter `emailId` is an string that represents the unique identifier of
     * the admin user that we want to retrieve from the database.
     *
     * @return A user with the given Email ID is being returned. However, the `first()` method is unnecessary
     * since `find()` already returns a single model instance. So, the corrected code would be:
     */
    public function getUserByEmailId(string $emailId)
    {
        return User::where('email', '=', $emailId)->first();
    }

    /**
     * @param $passwordResetData
     *
     * Store generated token for passowrd reset.
     */
    public function storeToken(array $passwordResetData)
    {
        return PasswordReset::updateOrInsert(
            ['email' => $passwordResetData['email']],
            ['created_at' => now(), 'token' => $passwordResetData['token']]
        );
    }

    /**
     * @param $token
     *
     * Get all token data using token.
     */
    public function getTokenDataWithToken(string $token)
    {
        return PasswordReset::where('token', $token)->first();
    }

    /**
     * @param $emailId
     *
     * Get all token data using email id.
     */
    public function getTokenDataWithEmailId(string $emailId)
    {
        return PasswordReset::where('email', $emailId)->first();
    }

    /**
     * @param $userDetails
     *
     * Update password using provided payload.
     */
    public function updatePassword(array $userDetails)
    {
        $user = User::where('email', '=', $userDetails[0]['email'])->first();
        $user->password = $userDetails[1]['password'];
        $user->created_at = now();
        $user->save();

        return $user;
    }

    /**
     * @param $emailId, $content
     *
     * Notify user on email id about event from content.
     */
    public function notifyUser(string $emailId, array $mailDetails)
    {
        try {
            \Mail::to($emailId)->send(new NotificationMail($mailDetails));
        } catch(\Exception $e) {
            return;
        }
    }

    /**
     * This function creates an admin user.
     *
     * @param array $userDetails The parameter `userDetails` is an array that contains the details of
     * the admin user that we want to create.
     *
     * @return The created user is being returned.
     */
    public function createUser(array $userDetails, int $roleId)
    {
        $user = User::create($userDetails);
        $user->assignRole($roleId);

        return $user;
    }

    /**
     * This function updates a user.
     *
     * @param int $userId The parameter `userId` is an integer that represents the unique identifier of
     * the admin user that we want to update.
     *
     * @param array $userDetails The parameter `userDetails` is an array that contains the details of
     * the admin user that we want to update.
     *
     * @return The updated user is being returned.
     */
    public function updateUser(int $userId, array $userDetails, int $roleId)
    {
        $user = User::findOrFail($userId);
        $user->update($userDetails);

        // Get Role of the User
        $userRole = $user->roles->first();
        if ($userRole) {
            // Remove Role of User
            $user->removeRole($userRole);
        }
        $user->assignRole($roleId);

        return $user;
    }

    /**
     * This function updates a customer with the id and updated payload provided.
     * @param userId, userDetails
     */
    public function updateCustomer(int $userId, array $userDetails)
    {
        $user = User::findOrFail($userId);
        $user->update($userDetails);

        return $user;
    }

    /**
     * This function deletes a user.
     *
     * @param int $userId The parameter `userId` is an integer that represents the unique identifier of
     * the admin user that we want to delete.
     *
     * @return A boolean value is being returned.
     */
    public function deleteUserById(int $userId)
    {
        $user = User::find($userId);
        $user->delete();
        // Get Role of the User
        $userRole = $user->roles->first();
        if ($userRole) {
            // Remove Role of User
            $user->removeRole($userRole);
        }

        return true;
    }
}
