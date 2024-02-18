<?php

namespace HRD\Alocom\Models;

/**
 * Class Room
 * @package HRD\Alocom\Models
 */
class Room
{

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $title = "";

    /**
     * @var int
     */
    private $agentServiceId;

    /**
     * @var string
     */
    private $slug = "";

    /**
     * @var int
     */
    private $maxUser;

    /**
     * @var bool
     */
    private $status = true;

    /**
     * @var string
     */
    private $backLink;
    /**
     * @var bool
     */
    private $startByAdmin;

    /**
     * @var bool
     */
    private $guestAccess;

    /**
     * @var int
     */
    private $guestCount;

    /**
     * @var array
     */
    private $guestCode = true;

    /**
     * @var string
     */
    private $language = "";

    /**
     * @var array
     */
    private $users;

    /**
     * set id
     * @param int $id
     *
     * @return ClassRoom
     */
    public function set_id(string $id = null)
    {
        if (!is_null($id))
            $this->id = $id;
        return $this;
    }

    /**
     * get id
     *
     * @return int
     */
    public function get_id()
    {
        return $this->id;
    }

    /**
     * set title
     * @param string $title
     *
     * @return ClassRoom
     */
    public function set_title(string $title)
    {
        mb_internal_encoding('UTF-8');
        if (mb_strlen($title) > 50)
            $title = mb_substr($title, 0, 50);
        $this->title = $this->clean($title);
        return $this;
    }

    /**
     * get title
     *
     * @return string
     */
    public function get_title(): string
    {
        return $this->title;
    }

    /**
     * set agentServiceId
     * @param int $agentServiceId
     *
     * @return ClassRoom
     */
    public function set_agentServiceId(int $agentServiceId)
    {
        $this->agentServiceId = $agentServiceId;
        return $this;
    }

    /**
     * get agentServiceId
     *
     * @return int
     */
    public function get_agentServiceId(): int
    {
        return $this->agentServiceId;
    }

    /**
     * set slug
     * @param string $slug
     *
     * @return ClassRoom
     */
    public function set_slug(string $slug)
    {
        $this->slug = $slug;
        return $this;
    }

    /**
     * get slug
     *
     * @return string
     */
    public function get_slug(): string
    {
        return $this->slug;
    }

    /**
     * set maxUser
     * @param int $maxUser
     *
     * @return ClassRoom
     */
    public function set_maxUser(int $maxUser)
    {
        $this->maxUser = $maxUser;
        return $this;
    }

    /**
     * get maxUser
     *
     * @return int
     */
    public function get_maxUser(): int
    {
        return $this->maxUser;
    }

    /**
     * set status
     * @param bool $status
     *
     * @return ClassRoom
     */
    public function set_status(bool $status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * get status
     *
     * @return bool
     */
    public function get_status(): bool
    {
        return $this->status;
    }

    /**
     * set backLink
     * @param string $backLink
     *
     * @return ClassRoom
     */
    public function set_backLink(string $backLink)
    {
        $this->backLink = $backLink;
        return $this;
    }

    /**
     * get backLink
     *
     * @return string
     */
    public function get_backLink(): string
    {
        return $this->backLink;
    }

    /**
     * set startByAdmin
     * @param bool $startByAdmin
     *
     * @return ClassRoom
     */
    public function set_startByAdmin(bool $startByAdmin)
    {
        $this->startByAdmin = $startByAdmin;
        return $this;
    }

    /**
     * get startByAdmin
     *
     * @return bool
     */
    public function get_startByAdmin(): bool
    {
        return $this->startByAdmin;
    }

    /**
     * set guestAccess
     * @param bool $guestAccess
     *
     * @return ClassRoom
     */
    public function set_guestAccess(bool $guestAccess)
    {
        $this->guestAccess = $guestAccess;
        return $this;
    }

    /**
     * get guestAccess
     *
     * @return bool
     */
    public function get_guestAccess(): bool
    {
        return $this->guestAccess;
    }

    /**
     * set guestCount
     * @param int $guestCount
     *
     * @return ClassRoom
     */
    public function set_guestCount(int $guestCount)
    {
        $this->guestCount = $guestCount;
        return $this;
    }

    /**
     * get guestCount
     *
     * @return int
     */
    public function get_guestCount(): int
    {
        return $this->guestCount;
    }

    /**
     * set guestCode
     * @param array $guestCode
     *
     * @return ClassRoom
     */
    public function set_guestCode(array $guestCode)
    {
        $this->guestCode = $guestCode;
        return $this;
    }

    /**
     * get guestCode
     *
     * @return array
     */
    public function get_guestCode(): array
    {
        return $this->guestCode;
    }

    /**
     * set language
     * @param string $language
     *
     * @return ClassRoom
     */
    public function set_language(string $language)
    {
        $this->language = $language;
        return $this;
    }

    /**
     * get language
     *
     * @return string
     */
    public function get_language(): string
    {
        return $this->language;
    }

    /**
     * set users
     * @param array $users
     *
     * @return ClassRoom
     */
    public function set_users(array $users)
    {
        $this->users = $users;
        return $this;
    }

    /**
     * get users
     *
     * @return array
     */
    public function get_users(): array
    {
        return $this->users;
    }

    /**
     * set alocomLink
     * @param string $alocomLink
     *
     * @return ClassRoom
     */
    public function set_alocomLink(string $alocomLink)
    {
        $this->alocomLink = $alocomLink;
        return $this;
    }

    /**
     * get alocomLink
     *
     * @return string
     */
    public function get_alocomLink(): string
    {
        return $this->alocomLink;
    }

    /**
     * toArray Attribute
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'agent_service_id' => $this->get_agentServiceId(),
            'title' => $this->get_title(),
            'status' => $this->get_status(),
            'max_user' => $this->get_maxUser(),
            'slug' => $this->get_slug(),
            'back_link' => $this->get_backLink(),
            'start_by_admin' => $this->get_startByAdmin(),
            'guest_count' => $this->get_guestCount(),
            'guest_access' => $this->get_guestAccess(),
            'guest_code' => $this->get_guestCode(),
            'language' => $this->get_language(),
            'users' => $this->get_users(),
        ];
    }

    /**
     * set all attribute
     * @param array $data
     */
    public function setAllAttribute(array $data): Room
    {
        foreach ($data['event'] as $param => $value) {
            $param = $this->snakeToCamelCase($param);
            $function_name = 'set_' . $param;
            if (method_exists($this, $function_name)) {
                $this->$function_name($value);
            }
        }
        return $this;
    }

    private function clean($string)
    {
        $string = mb_strtolower($string, 'UTF-8');
        $string = $this->convertNumber($string);
        $string = mb_ereg_replace('[^a-z0-9 پچجحخهعغفقثصضشسیبلاتنمکگوئدذرزطظژؤإآأًٌٍَُِّ]', '', $string); // Removes special chars.
        return $string;
    }

    private function convertNumber(string $string)
    {
        $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $arabic = ['٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩'];

        $num = range(0, 9);
        $convertedPersianNums = str_replace($persian, $num, $string);
        $englishNumbersOnly = str_replace($arabic, $num, $convertedPersianNums);

        return $englishNumbersOnly;
    }

    private function snakeToCamelCase($string, $capitalizeFirstCharacter = false)
    {
        $str = str_replace('_', '', ucwords($string, '_'));

        if (!$capitalizeFirstCharacter) {
            $str = lcfirst($str);
        }

        return $str;
    }
}
