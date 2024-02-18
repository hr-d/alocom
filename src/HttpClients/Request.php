<?php

namespace HRD\Alocom\HttpClients;

class Request
{
    const ALOCOME_BASE_API_URL_ENV_NAME = "ALOCOME_BASE_API_URL";
    const ALOCOME_USERNAME_ENV_NAME = "ALOCOME_USERNAME";
    const ALOCOME_PASSWORD_ENV_NAME = "ALOCOME_PASSWORD";

    /**
     * @var GuzzleHttpClient
     */
    private $client;


    /**
     * Constructor.
     *
     * @param GuzzleHttpClient|null $client
     */
    public function __construct(GuzzleHttpClient $client = null)
    {
        $this->client = $client ?: new GuzzleHttpClient();
    }

    /**
     * @param string $path
     * @param string $method
     * @param array $params
     * @return mixed
     * @throws \Exception
     */
    public function make(string $path, string $method, array $params)
    {
        $Authorization = $this->get_auth();
        try {
            return $this->client->make($this->get_apiUrl($path), $method, $params, [
                'Authorization' => "Bearer " . $Authorization]);
        } catch (\Throwable $e) {
            throw $e;
        }
    }

    /**
     * get_auth
     *
     * @return string
     * @throws \Exception
     */
    private function get_auth()
    {
        $username = getenv(self::ALOCOME_USERNAME_ENV_NAME);
        $password = getenv(self::ALOCOME_PASSWORD_ENV_NAME);
        try {
            $result = $this->client->make($this->get_apiUrl('auth/login'), "post", [
                "username" => $username,
                "password" => $password,
            ]);
            return $result['token'];
        } catch (\Throwable $e) {
            throw $e;
        }
    }

    /**
     * @param string $path
     * @return string
     */
    private function get_apiUrl(string $path)
    {
        return getenv(self::ALOCOME_BASE_API_URL_ENV_NAME) . '/api/v1/' . $path;
    }
}
