<?php

namespace SimplySuggest;

class Object extends ApiResource
{
    /**
     * @var string
     */
    protected $objectId;

    /**
     * @var string
     */
    protected $objectType;

    /**
     * @return string
     */
    public function getObjectType()
    {
        return $this->objectType;
    }

    /**
     * @param string $objectType
     * @return $this;
     */
    public function setObjectType($objectType)
    {
        $this->objectType = $objectType;
        return $this;
    }

    /**
     * @return string
     */
    public function getObjectId()
    {
        return $this->objectId;
    }

    /**
     * @param string $objectId
     * @return $this
     */
    public function setObjectId($objectId)
    {
        $this->objectId = $objectId;
        return $this;
    }

    /**
     * @param string $objectId
     * @param string $objectType
     */
    public function __construct($objectId, $objectType)
    {
        $this->setObjectId($objectId);
        $this->setObjectType($objectType);
    }

    /**
     * @param int $limit
     * @param int $page
     * @return array
     */
    public function loadRecommendations($limit = 30, $page = 1)
    {
        $this->setEndpoint("/object_type/" . $this->getObjectType() . "/object/recommendations/" . $this->getObjectId());
        $this->initCurlClient();

        return $this->executeRequest();
    }
}