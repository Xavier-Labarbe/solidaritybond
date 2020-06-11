<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMessageRequest;
use App\Repository\ConversationRepository;
use App\User;
use Illuminate\Auth\AuthManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConversationsController extends Controller
{

    /**
     * @var ConversationRepository
     */
    private $conversationRepository;
    /**
     * @var AuthManager
     */
    private $authManager;

    public function __construct(ConversationRepository $conversationRepository, AuthManager $authManager)
    {
        $this->conversationRepository = $conversationRepository;
        $this->authManager = $authManager;
    }

    public function index ()
    {
        return view('conversations/index', [
            'users' => $this->conversationRepository->getConversations($this->authManager->user()->id)
        ]);
    }

    public function show (User $user)
    {
        return view('conversations/show', [
            'users' => $this->conversationRepository->getConversations($this->authManager->user()->id),
            'user' => $user,
            'messages' => $this->conversationRepository->getMessagesFor($this->authManager->user()->id, $user->id)->get()->reverse()
        ]);
    }

    public function store (User $user, StoreMessageRequest $request)
    {
        $this->conversationRepository->createMessage(
            $request->get('content'),
            $this->authManager->user()->id,
            $user->id
        );
        return redirect(route('conversations.show', ['user' => $user->id]));
    }

    }
