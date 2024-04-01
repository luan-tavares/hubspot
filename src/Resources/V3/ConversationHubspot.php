<?php

namespace LTL\Hubspot\Resources\V3;

use LTL\Hubspot\Hubspot;
use LTL\HubspotRequestBody\Resources as Body;
use LTL\Hubspot\Objects as Objects;

/**
 * @template TResponse
 * @template TIterator
 * @extends Hubspot<TResponse, TIterator>
 *
 * @link https://app.hubspot.com/developer-docs/api?spec=v1/apis/conversations/v3/conversations
 *
 * @method static self<array<int, object>, object> getAllActors(array $requestBody) Resolve ActorIds to the underlying actors/participants.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/conversations/v3/conversations
 *
 * @method self<array<int, object>, object> getAllActors(array $requestBody) Resolve ActorIds to the underlying actors/participants.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/conversations/v3/conversations
 *
 * @method static self<object, null> getActor(int|string $actorId) Get a single actor.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/conversations/v3/conversations
 *
 * @method self<object, null> getActor(int|string $actorId) Get a single actor.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/conversations/v3/conversations
 *
 * @method static self<array<int, object>, object> getAllChannelsAccounts() Get channel accounts.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/conversations/v3/conversations
 *
 * @method self<array<int, object>, object> getAllChannelsAccounts() Get channel accounts.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/conversations/v3/conversations
 *
 * @method static self<object, null> getChannelAccount(int|string $channelAccountId) Get a single channel account.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/conversations/v3/conversations
 *
 * @method self<object, null> getChannelAccount(int|string $channelAccountId) Get a single channel account.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/conversations/v3/conversations
 *
 * @method static self<array<int, object>, object> getAllChannels() Get channels.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/conversations/v3/conversations
 *
 * @method self<array<int, object>, object> getAllChannels() Get channels.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/conversations/v3/conversations
 *
 * @method static self<object, null> getChannel(int|string $channelId) Get a single channel.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/conversations/v3/conversations
 *
 * @method self<object, null> getChannel(int|string $channelId) Get a single channel.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/conversations/v3/conversations
 *
 * @method static self<array<int, object>, object> getAllInboxes() Get conversations inboxes.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/conversations/v3/conversations
 *
 * @method self<array<int, object>, object> getAllInboxes() Get conversations inboxes.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/conversations/v3/conversations
 *
 * @method static self<object, null> getInbox(int|string $inboxId) Get a single conversations inbox.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/conversations/v3/conversations
 *
 * @method self<object, null> getInbox(int|string $inboxId) Get a single conversations inbox.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/conversations/v3/conversations
 *
 * @method static self<array<int, object>, object> getAllThreads() Get threads.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/conversations/v3/conversations
 *
 * @method self<array<int, object>, object> getAllThreads() Get threads.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/conversations/v3/conversations
 *
 * @method static self<object, null> getThread(int|string $threadId) Get a single thread.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/conversations/v3/conversations
 *
 * @method self<object, null> getThread(int|string $threadId) Get a single thread.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/conversations/v3/conversations
 *
 * @method static self<object, null> updateThread(int|string $threadId, array $requestBody) Updates a single thread. Either a thread's status can be updated, or the thread can be restored.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/conversations/v3/conversations
 *
 * @method self<object, null> updateThread(int|string $threadId, array $requestBody) Updates a single thread. Either a thread's status can be updated, or the thread can be restored.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/conversations/v3/conversations
 *
 * @method static self<object, null> deleteThread(int|string $threadId) Archives a single thread. The thread will be permanently deleted 30 days after placed in an archived state.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/conversations/v3/conversations
 *
 * @method self<object, null> deleteThread(int|string $threadId) Archives a single thread. The thread will be permanently deleted 30 days after placed in an archived state.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/conversations/v3/conversations
 *
 * @method static self<array<int, object>, object> getAllMessages(int|string $threadId) Get message history for a thread.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/conversations/v3/conversations
 *
 * @method self<array<int, object>, object> getAllMessages(int|string $threadId) Get message history for a thread.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/conversations/v3/conversations
 *
 * @method static self<object, null> sendMessage(int|string $threadId, array $requestBody) Send a new message on a thread at the current timestamp.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/conversations/v3/conversations
 *
 * @method self<object, null> sendMessage(int|string $threadId, array $requestBody) Send a new message on a thread at the current timestamp.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/conversations/v3/conversations
 *
 * @method static self<object, null> getMessage(int|string $threadId, int|string $messageId) Get a single message.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/conversations/v3/conversations
 *
 * @method self<object, null> getMessage(int|string $threadId, int|string $messageId) Get a single message.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/conversations/v3/conversations
 *
 * @method static self<object, null> getMessageOriginalContent(int|string $threadId, int|string $messageId) Returns the complete original text and rich text bodies of a message. This will be different from the text and rich text in the message itself if the message's truncationStatus is anything other than NOT_TRUNCATED.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/conversations/v3/conversations
 *
 * @method self<object, null> getMessageOriginalContent(int|string $threadId, int|string $messageId) Returns the complete original text and rich text bodies of a message. This will be different from the text and rich text in the message itself if the message's truncationStatus is anything other than NOT_TRUNCATED.
 * See https://app.hubspot.com/developer-docs/api?spec=v1/apis/conversations/v3/conversations
 *
 */
class ConversationHubspot extends Hubspot
{
    protected string $resource = "conversations-v3";

    protected int $version = 3;
}