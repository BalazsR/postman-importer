<?php

namespace HarToPostmanCollection\Collection;

class Item {

    /**
     *
     * @var string 
     */
    protected $name;

    /**
     *
     * @var ItemEvent 
     */
    protected $event;

    /**
     *
     * @var ItemRequest 
     */
    protected $request;

    /**
     * @var array
     */
    protected $response;

    /**
     * 
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * 
     * @return ItemEvent
     */
    public function getEvent() {
        return $this->event;
    }

    /**
     * 
     * @return ItemRequest
     */
    public function getRequest() {
        return $this->request;
    }

    /**
     * @return array
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * 
     * @param string $name
     */
    public function setName($name) {
        $this->name = $name;
    }

    /**
     * 
     * @param ItemEvent $event
     */
    public function setEvent(ItemEvent $event) {
        $this->event = $event;
    }

    /**
     * 
     * @param ItemRequest $request
     */
    public function setRequest(ItemRequest $request) {
        $this->request = $request;
    }

    /**
     * @param array $response
     */
    public function setResponse($response)
    {
        $this->response = $response;
    }

    /**
     * 
     * @return array
     */
    public function toArray() {
        return [
            'name' => $this->name,
            'event' => $this->event instanceof ItemEvent ? $this->event->toArray() : [],
            'request' => $this->request instanceof ItemRequest ? $this->request->toArray() : [],
            'response' => array_map(function(ItemResponse $response) {
                return $response->toArray();
            }, $this->response)
        ];
    }

}
