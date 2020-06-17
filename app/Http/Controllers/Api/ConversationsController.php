<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMessageRequest;
use App\Repository\ConversationRepository;
use App\User;
use Illuminate\Http\Request;

/**
 * @property  conversationRepository
 */
class ConversationsController extends Controller
{

    /**
     * @var ConversationRepository
     */
    private $conversationsRepository;

    public function __construct(ConversationRepository $conversationsRepository)
    {
        $this->conversationsRepository = $conversationsRepository;
    }

    public function index(Request $request)
    {
        return [
                'conversations' => $this->conversationsRepository->getConversations($request->user()->id)
            ];
    }

    public function show(Request $request, User $user)
    {
        $messages = $this->conversationsRepository->getMessagesFor($request->user()->id, $user->id)->get();
        return [
            'messages' => $messages->reverse()
        ];
    }

    public function store(User $user, StoreMessageRequest $request)
    {
        $message = $this->conversationsRepository->createMessage(
            $request->get('content'),
            $request->user()->id,
            $user->id
        );
        return [
            'message' => $message
        ];
    }
}
