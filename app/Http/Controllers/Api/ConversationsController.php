<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMessageRequest;
use App\Repository\ConversationRepository;
use App\User;
use Illuminate\Http\Request;

class ConversationsController extends Controller {
    /**
     * @var ConversationRepository
     */
    private $conversationRepository;

    public function __construct(ConversationRepository $conversationRepository)
    {
        $this->conversationRepository = $conversationRepository;
    }

    public function index (Request $request) {
        return [
                'conversations' => $this->conversationRepository->getConversations($request->user()->id)
            ];
    }

    public function show (Request $request, User $user) {
        $messages = $this->conversationRepository->getMessagesFor($request->user()->id, $user->id)->get();
        return [
            'messages' => array_reverse($messages->toArray())
        ];
    }

    public function store (User $user, StoreMessageRequest $request) {
        $message = $this->conversationRepository->createMessage(
            $request->get('content'),
            $request->user()->id,
            $user->id
        );
        return [
            'message' => $message
        ];
    }
}
