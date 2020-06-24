<?php
namespace App\Http\Controllers\Api;

use App\Events\NewMessage;
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
        $conversations = $this->conversationRepository->getConversations($request->user()->id);
        $unread = $this->conversationRepository->unreadCount($request->user()->id);

        return [
                'conversations' => $conversations
            ];
    }

    public function show (Request $request, User $user) {
        $messagesQuery = $this->conversationRepository->getMessagesFor($request->user()->id, $user->id);
        $count = null;
        if ($request->get('before')) {
            $messagesQuery = $messagesQuery->where('created_at', '<', $request->get('before'));
        } else {
            $count = $messagesQuery->count();
        }
        $messages = $messagesQuery->limit(10)->get();
        foreach ($messages as $message) {
            if ($message->read_at === null && $message->to_id = $request->user()->id) {
                $this->conversationRepository->readAllFrom($message->from_id, $message->to_id);
                break;
            }
        }
        return [
            'messages' => array_reverse($messages->toArray()),
            'count' => $count
        ];
    }

    public function store (User $user, StoreMessageRequest $request) {
        $message = $this->conversationRepository->createMessage(
            $request->get('content'),
            $request->user()->id,
            $user->id
        );
        broadcast(new NewMessage($message));
        return [
            'message' => $message
        ];
    }
}
