<?php

namespace SimplySuggest;

class User extends ApiResource
{
    /**
     * @var string
     */
    protected $userId;

    /**
     * @return string
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param string $userId
     * @return $this
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * @param string $userId
     */
    public function __construct($userId)
    {
        $this->setUserId($userId);
    }

    /**
     * @param int $limit
     * @param int $page
     * @return array
     */
    public function loadRecommendations($limit = 30, $page = 1)
    {
        $this->setEndpoint("/user/recommendations/" . $this->getUserId());
        $this->initCurlClient();

        return $this->executeRequest();
    }
}