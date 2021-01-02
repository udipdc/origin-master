<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Conversations\V1\Service;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Options;
use Twilio\Rest\Conversations\V1\Service\Conversation\MessageList;
use Twilio\Rest\Conversations\V1\Service\Conversation\ParticipantList;
use Twilio\Rest\Conversations\V1\Service\Conversation\WebhookList;
use Twilio\Values;
use Twilio\Version;

/**
 * @property string $accountSid
 * @property string $chatServiceSid
 * @property string $messagingServiceSid
 * @property string $sid
 * @property string $friendlyName
 * @property string $uniqueName
 * @property string $attributes
 * @property string $state
 * @property \DateTime $dateCreated
 * @property \DateTime $dateUpdated
 * @property array $timers
 * @property string $url
 * @property array $links
 */
class ConversationInstance extends InstanceResource {
    protected $_participants;
    protected $_messages;
    protected $_webhooks;

    /**
     * Initialize the ConversationInstance
     *
     * @param Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $chatServiceSid The unique ID of the Conversation Service this
     *                               conversation belongs to.
     * @param string $sid A 34 character string that uniquely identifies this
     *                    resource.
     */
    public function __construct(Version $version, array $payload, string $chatServiceSid, string $sid = null) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = [
            'accountSid' => Values::array_get($payload, 'account_sid'),
            'chatServiceSid' => Values::array_get($payload, 'chat_service_sid'),
            'messagingServiceSid' => Values::array_get($payload, 'messaging_service_sid'),
            'sid' => Values::array_get($payload, 'sid'),
            'friendlyName' => Values::array_get($payload, 'friendly_name'),
            'uniqueName' => Values::array_get($payload, 'unique_name'),
            'attributes' => Values::array_get($payload, 'attributes'),
            'state' => Values::array_get($payload, 'state'),
            'dateCreated' => Deserialize::dateTime(Values::array_get($payload, 'date_created')),
            'dateUpdated' => Deserialize::dateTime(Values::array_get($payload, 'date_updated')),
            'timers' => Values::array_get($payload, 'timers'),
            'url' => Values::array_get($payload, 'url'),
            'links' => Values::array_get($payload, 'links'),
        ];

        $this->solution = ['chatServiceSid' => $chatServiceSid, 'sid' => $sid ?: $this->properties['sid'], ];
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return ConversationContext Context for this ConversationInstance
     */
    protected function proxy(): ConversationContext {
        if (!$this->context) {
            $this->context = new ConversationContext(
                $this->version,
                $this->solution['chatServiceSid'],
                $this->solution['sid']
            );
        }

        return $this->context;
    }

    /**
     * Update the ConversationInstance
     *
     * @param array|Options $options Optional Arguments
     * @return ConversationInstance Updated ConversationInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(array $options = []): ConversationInstance {
        return $this->proxy()->update($options);
    }

    /**
     * Delete the ConversationInstance
     *
     * @param array|Options $options Optional Arguments
     * @return bool True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete(array $options = []): bool {
        return $this->proxy()->delete($options);
    }

    /**
     * Fetch the ConversationInstance
     *
     * @return ConversationInstance Fetched ConversationInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch(): ConversationInstance {
        return $this->proxy()->fetch();
    }

    /**
     * Access the participants
     */
    protected function getParticipants(): ParticipantList {
        return $this->proxy()->participants;
    }

    /**
     * Access the messages
     */
    protected function getMessages(): MessageList {
        return $this->proxy()->messages;
    }

    /**
     * Access the webhooks
     */
    protected function getWebhooks(): WebhookList {
        return $this->proxy()->webhooks;
    }

    /**
     * Magic getter to access properties
     *
     * @param string $name Property to access
     * @return mixed The requested property
     * @throws TwilioException For unknown properties
     */
    public function __get(string $name) {
        if (\array_key_exists($name, $this->properties)) {
            return $this->properties[$name];
        }

        if (\property_exists($this, '_' . $name)) {
            $method = 'get' . \ucfirst($name);
            return $this->$method();
        }

        throw new TwilioException('Unknown property: ' . $name);
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string {
        $context = [];
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.Conversations.V1.ConversationInstance ' . \implode(' ', $context) . ']';
    }
}