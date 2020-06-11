<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use App\Repository\ConversationRepository;
use Illuminate\Auth\AuthManager;

class ConversationsController extends Controller
{

    private $conversationRepository;
    private $authManager;

    public function __construct(ConversationRepository $conversationRepository, AuthManager $authManager)
    {
        $this->conversationRepository = $conversationRepository;
        $this->authManager = $authManager;  
    }

    public function index () 
    {
        return view('conversations/index', [
            'users'->$this->conversationRepository->getConversations($this->authManager->user()->id())
        ]);
    }

    public function show (User $user) 
    {
        return view('conversations/show', [
            'users'=> $this->conversationRepository->getConversations($this->authManager->user()->id()),
            'user' => $user
        ]);
    }
}
