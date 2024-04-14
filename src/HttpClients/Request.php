<?php

namespace HRD\Alocom\HttpClients;

class Request
{
    const ALOCOM_BASE_API_URL_ENV_NAME = "ALOCOM_BASE_API_URL";
    const ALOCOM_USERNAME_ENV_NAME = "ALOCOM_USERNAME";
    const ALOCOM_PASSWORD_ENV_NAME = "ALOCOM_PASSWORD";

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
        $username = getenv(self::ALOCOM_USERNAME_ENV_NAME);
        $password = getenv(self::ALOCOM_PASSWORD_ENV_NAME);
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
        return getenv(self::ALOCOM_BASE_API_URL_ENV_NAME) . '/api/v1/' . $path;
    }
}
