<?php

namespace HarToPostmanCollection\Collection;

class ItemResponse {

    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var ItemRequest
     */
    protected $originalRequest;

    /**
     * @var string
     */
    protected $status;

    /**
     * @var string
     */
    protected $code;

    /**
     * @var string
     */
    protected $body;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return ItemRequest
     */
    public function getOriginalRequest()
    {
        return $this->originalRequest;
    }

    /**
     * @param ItemRequest $request
     */
    public function setOriginalRequest($originalRequest)
    {
        $this->originalRequest = $originalRequest;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param string $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }

    /**
     * @return array
     */
    public function toArray() {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'originalRequest' => $this->originalRequest instanceof ItemRequest ? $this->originalRequest->toArray() : [],
            'status' => $this->status,
            'code' => $this->code,
            'body' => $this->body
        ];
    }

}
