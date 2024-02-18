<?php

namespace HRD\Alocom\Models;

/**
 * Class User
 * @package HRD\Alocom\Models
 */
class User
{
    /**
     * @var string|null
     */
    private $userId = null;
    /**
     * @var int
     */
    private $eventId;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $name = "";

    /**
     * @var string
     */
    private $surname = "";

    /**
     * @var username
     */
    private $username = "";

    /**
     * @var string
     */
    private $role = Authority::ACCESS_LEVEL_ATTENDEE;

    /**
     * @var string
     */
    private $eventLink;

    /**
     * @var string
     */
    private $token;

    /**
     * set userId
     * @param string $userId
     *
     * @return User
     */
    public function set_userId(string $userId = null)
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * get userId
     *
     * @return int|null
     */
    public function get_userId()
    {
        return $this->userId;
    }

    /**
     * set evnetId
     * @param int $evnetId
     *
     * @return User
     */
    public function set_eventId(int $eventId)
    {
        $this->eventId = $eventId;
        return $this;
    }

    /**
     * get classroomId
     *
     * @return int
     */
    public function get_eventId(): int
    {
        return $this->eventId;
    }

    /**
     * set password
     * @param string $password
     *
     * @return User
     */
    public function set_password(string $password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * get password
     *
     * @return string
     */
    public function get_password(): string
    {
        return $this->password;
    }

    /**
     * set name
     * @param string $name
     *
     * @return User
     */
    public function set_name(string $name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * get name
     *
     * @return string
     */
    public function get_name(): string
    {
        return $this->name;
    }

    /**
     * set surname
     * @param string $surname
     *
     * @return User
     */
    public function set_surname(string $surname)
    {
        $this->surname = $surname;
        return $this;
    }

    /**
     * get surname
     *
     * @return string
     */
    public function get_surname(): string
    {
        return $this->surname;
    }

    /**
     * set username
     * @param string $username
     *
     * @return User
     */
    public function set_username(string $username)
    {
        $this->username = $username;
        return $this;
    }

    /**
     * get username
     *
     * @return string
     */
    public function get_username(): string
    {
        return $this->username;
    }

    /**
     * set role
     * @param string $role
     *
     * @return User
     */
    public function set_role(string $role)
    {
        if (Authority::check($role)) {
            $this->role = $role;
        }
        return $this;
    }

    /**
     * get role
     *
     * @return string
     */
    public function get_role(): string
    {
        return $this->role;
    }

    /**
     * set eventLink
     * @param string $eventLink
     *
     * @return User
     */
    public function set_eventLink(string $eventLink)
    {
        $this->eventLink = $eventLink;
        return $this;
    }

    /**
     * get eventLink
     *
     * @return string
     */
    public function get_eventLink(): string
    {
        return $this->eventLink;
    }

    /**
     * set token
     * @param string $token
     *
     * @return User
     */
    public function set_token(string $token)
    {
        $this->token = $token;
        return $this;
    }

    /**
     * get token
     *
     * @return string
     */
    public function get_token(): string
    {
        return $this->token;
    }

    /**
     * toArray Attribute
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'password' => $this->get_password(),
            'name' => $this->get_name(),
            'surname' => $this->get_surname(),
            'username' => $this->get_username(),
            'role' => $this->get_role(),
            'status' => true
        ];
    }

    /**
     * set all attribute
     * @param array $data
     */
    public function setAllAttribute(array $data): User
    {
        foreach ($data as $param => $value) {
            $function_name = 'set_' . $param;
            if (method_exists($this, $function_name)) {
                $this->$function_name($value);
            }
        }
        return $this;
    }
}
