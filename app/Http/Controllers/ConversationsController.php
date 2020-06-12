<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMessageRequest;
use App\Notifications\MessageReceived;
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
        $this->middleware('auth');
        $this->conversationRepository = $conversationRepository;
        $this->authManager = $authManager;
    }

    public function index ()
    {
        return view('conversations/index', [
            'users' => $this->conversationRepository->getConversations($this->authManager->user()->id),
            'unread' => $this->conversationRepository->unreadCount($this->authManager->user()->id)
        ]);
    }

    public function show (User $user)
    {
        $me = $this->authManager->user();
        $messages = $this->conversationRepository->getMessagesFor($me->id, $user->id)->paginate(6);
        $unread = $this->conversationRepository->unreadCount($me->id);
        if (isset($unread[$user->id]))
        {
            $this->conversationRepository->readAllFrom($user->id, $me->id);
            unset($unread[$user->id]);
;        }
        return view('conversations/show', [
            'users' => $this->conversationRepository->getConversations($me->id),
            'user' => $user,
            'messages' => $messages,
            'unread' => $unread

        ]);
    }

    public function store (User $user, StoreMessageRequest $request)
    {
        $message = $this->conversationRepository->createMessage(
            $request->get('content'),
            $this->authManager->user()->id,
            $user->id
        );
        //$user->notify(new MessageReceived($message));
        return redirect(route('conversations.show', ['user' => $user->id]));
    }

    }
