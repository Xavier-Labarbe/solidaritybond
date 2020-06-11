<?php

namespace App\Repository;

use App\User;


class ConversationRepository{

    private $user;

    public function __construct(User $user) {
        $this->user = $user;
    }


    public function getConversations (int $userId) {
        return $this->user->newQuery()
            ->select('name', 'id')
            ->where('id', '!=', $userId)
            ->get();
    }
}