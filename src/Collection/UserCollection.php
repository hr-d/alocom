<?php


namespace HRD\Alocom\Collection;


use HRD\Alocom\HttpClients\Request;
use HRD\Alocom\Models\User;

/**
 * Class UserCollection
 * @package HRD\Alocom\Collection
 */
class UserCollection extends User
{
    /**
     * @var Request
     */
    private $request;

    /**
     * User constructor.
     */
    public function __construct()
    {
        $this->request = new Request();
    }

    /**
     * attach user to the event
     * create user if not exists username
     * update user when user id exists
     * @param int $eventId
     * @return $this
     */
    public function attach(int $eventId)
    {
        $data = $this->toArray();
        $response = $this->request->make("agents/events/{$eventId}/enroll-user-with-token", 'POST', $data);
        $this->setAllAttribute($response);
        return $this;
    }

    /**
     * detach user
     * @param int $eventId
     *
     */
    public function detach(int $eventId)
    {
        $data = ['users'=>[$this->get_userId()]];
        $this->request->make("agents/events/{$eventId}/remove_users", 'PATCH', $data);
    }

    /**
     * ligin url to the event
     * @return string
     */
    public function loginUrl():string
    {
        return $this->get_eventLink();
    }
}
