<?php

namespace App\Interfaces;

interface AdminUserRepositoryInterface
{
    /**
     * @param $userId
     *
     * Get the user by id.
     */
    public function getUserById(int $userId);

    /**
     * @param $emailId
     *
     * Get the user by email id.
     */
    public function getUserByEmailId(string $emailId);

    /**
     * @param $passwordResetData
     *
     * Store generated token for passowrd reset.
     */
    public function storeToken(array $passwordResetData);

    /**
     * @param $token
     *
     * Get all token data using token.
     */
    public function getTokenDataWithToken(string $token);

    /**
     * @param $emailId
     *
     * Get all token data using email id.
     */
    public function getTokenDataWithEmailId(string $emailId);

    /**
     * @param $userDetails
     *
     * Update password using provided payload.
     */
    public function updatePassword(array $userDetails);

    /**
     * @param $emailId, $content
     *
     * Notify user on email id about event from content.
     */
    public function notifyUser(string $emailId, array $content);

    /**
     * @param $userDetails, $roleId
     *
     * Create a user and provide role according to the payload provided.
     */
    public function createUser(array $userDetails, int $roleId);

    /**
     * @param $userId, $userDetails, $roleId
     *
     * Update a user and provide role according to the payload provided.
     */
    public function updateUser(int $userId, array $userDetails, int $roleId);

    public function updateCustomer(int $userId, array $customerDetails);

    /**
     * @param $userId
     *
     * Soft delete a user using id.
     */
    public function deleteUserById(int $userId);
}
