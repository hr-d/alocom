<?php


namespace HRD\Alocom\Collection;


use HRD\Alocom\HttpClients\Request;
use HRD\Alocom\Models\Room;

/**
 * Class RoomCollection
 * @package HRD\Alocom\Collection
 */
class RoomCollection extends Room
{
    /**
     * @var Request
     */
    private $request;

    /**
     * ClassRoom constructor.
     */
    public function __construct()
    {
        $this->request = new Request();
    }

    /**
     * create room
     * @return $this
     */
    public function save()
    {
        $data = $this->toArray();
        $id = $this->get_id();
        if (empty($id)) {
            $response = $this->request->make('agents/events', 'POST', $data);
        } else {
            $response = $this->request->make("agents/events/{$id}", 'PATCH', $data);
        }
        $this->setAllAttribute($response);

        return $this;
    }

    /**
     * get room
     *
     * @return $this
     */
    public function get()
    {
        $id = $this->get_id();
        $room = $this->request->make("agents/events/{$id}", 'GET', []);
        $this->setAllAttribute($room);
        return $this;
    }

    /**
     * delete room
     */
    public function delete()
    {
        $id = $this->get_id();
        $this->request->make("agents/events/{$id}", 'DELETE', []);
    }

    /**
     * the class room url
     * @return string
     */
    public function url()
    {
        return $this->get_alocomLink();
    }

    /**
     * the class room files
     * @return string
     */
    public function recordingFiles($skip = 0, $take = 100, $flag = null)
    {
        $id = $this->get_id();
        if (empty($id)) {
            return [];
        }
        return $this->request->make("agents/events/{$id}/files", 'POST', ['flag' => $flag, 'skip' => $skip, 'take' => $take]);
    }

}
