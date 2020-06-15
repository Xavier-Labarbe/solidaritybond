<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repository\ConversationRepository;
use Illuminate\Http\Request;

class ConversationsController extends Controller {

    /**
     * @var ConversationRepository
     */
    private $conversationsRepository;

    public function __construct(ConversationRepository $conversationsRepository)
    {
        $this->conversationsRepository = $conversationsRepository;
    }

    public function index (Request $request) {
        return response()
            ->json([
                'conversations' => $this->conversationsRepository->getConversations($request->user()->id)
            ]);
    }
}
