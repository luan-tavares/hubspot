<?php

namespace LTL\Hubspot\Resources\V3;

use LTL\Hubspot\Hubspot;
use LTL\Hubspot\Core\BodyBuilder\BaseBodyBuilder;

/**
 * @link https://app.hubspot.com/developer-docs/api?spec=v1/apis/conversations/v3/conversations
 *
 * @method static $this getAllActors(BaseBodyBuilder|array $requestBody) Resolve ActorIds to the underlying actors/participants.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/conversations/v3/conversations
 *
 * @method $this getAllActors(BaseBodyBuilder|array $requestBody) Resolve ActorIds to the underlying actors/participants.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/conversations/v3/conversations
 *
 * @method static $this getActor(int|string $actorId) Get a single actor.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/conversations/v3/conversations
 *
 * @method $this getActor(int|string $actorId) Get a single actor.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/conversations/v3/conversations
 *
 * @method static $this getAllChannelsAccounts() Get channel accounts.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/conversations/v3/conversations
 *
 * @method $this getAllChannelsAccounts() Get channel accounts.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/conversations/v3/conversations
 *
 * @method static $this getChannelAccount(int|string $channelAccountId) Get a single channel account.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/conversations/v3/conversations
 *
 * @method $this getChannelAccount(int|string $channelAccountId) Get a single channel account.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/conversations/v3/conversations
 *
 * @method static $this getAllChannels() Get channels.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/conversations/v3/conversations
 *
 * @method $this getAllChannels() Get channels.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/conversations/v3/conversations
 *
 * @method static $this getChannel(int|string $channelId) Get a single channel.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/conversations/v3/conversations
 *
 * @method $this getChannel(int|string $channelId) Get a single channel.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/conversations/v3/conversations
 *
 * @method static $this getAllInboxes() Get conversations inboxes.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/conversations/v3/conversations
 *
 * @method $this getAllInboxes() Get conversations inboxes.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/conversations/v3/conversations
 *
 * @method static $this getInbox(int|string $inboxId) Get a single conversations inbox.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/conversations/v3/conversations
 *
 * @method $this getInbox(int|string $inboxId) Get a single conversations inbox.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/conversations/v3/conversations
 *
 * @method static $this getAllThreads() Get threads.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/conversations/v3/conversations
 *
 * @method $this getAllThreads() Get threads.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/conversations/v3/conversations
 *
 * @method static $this getThread(int|string $threadId) Get a single thread.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/conversations/v3/conversations
 *
 * @method $this getThread(int|string $threadId) Get a single thread.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/conversations/v3/conversations
 *
 * @method static $this updateThread(int|string $threadId, BaseBodyBuilder|array $requestBody) Updates a single thread. Either a thread's status can be updated, or the thread can be restored.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/conversations/v3/conversations
 *
 * @method $this updateThread(int|string $threadId, BaseBodyBuilder|array $requestBody) Updates a single thread. Either a thread's status can be updated, or the thread can be restored.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/conversations/v3/conversations
 *
 * @method static $this deleteThread(int|string $threadId) Archives a single thread. The thread will be permanently deleted 30 days after placed in an archived state.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/conversations/v3/conversations
 *
 * @method $this deleteThread(int|string $threadId) Archives a single thread. The thread will be permanently deleted 30 days after placed in an archived state.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/conversations/v3/conversations
 *
 * @method static $this getAllMessages(int|string $threadId) Get message history for a thread.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/conversations/v3/conversations
 *
 * @method $this getAllMessages(int|string $threadId) Get message history for a thread.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/conversations/v3/conversations
 *
 * @method static $this sendMessage(int|string $threadId, BaseBodyBuilder|array $requestBody) Send a new message on a thread at the current timestamp.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/conversations/v3/conversations
 *
 * @method $this sendMessage(int|string $threadId, BaseBodyBuilder|array $requestBody) Send a new message on a thread at the current timestamp.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/conversations/v3/conversations
 *
 * @method static $this getMessage(int|string $threadId, int|string $messageId) Get a single message.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/conversations/v3/conversations
 *
 * @method $this getMessage(int|string $threadId, int|string $messageId) Get a single message.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/conversations/v3/conversations
 *
 * @method static $this getMessageOriginalContent(int|string $threadId, int|string $messageId) Returns the complete original text and rich text bodies of a message. This will be different from the text and rich text in the message itself if the message's truncationStatus is anything other than NOT_TRUNCATED.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/conversations/v3/conversations
 *
 * @method $this getMessageOriginalContent(int|string $threadId, int|string $messageId) Returns the complete original text and rich text bodies of a message. This will be different from the text and rich text in the message itself if the message's truncationStatus is anything other than NOT_TRUNCATED.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/conversations/v3/conversations
 *
 */
class ConversationHubspot extends Hubspot
{
    protected string $resource = "conversations-v3";

    protected int $version = 3;
}