<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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
        return response()
            ->json([
                'conversations' => $this->conversationRepository->getConversations($request->user()->id)
            ]);
    }

    public function show (Request $request, User $user) {
        $messages = $this->conversationRepository->getMessagesFor($request->user()->id, $user->id)->get();
        return [
            'messages' => $messages->reverse()
        ];
    }
}
