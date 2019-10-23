<?php declare(strict_types=1);
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://swoft.org/docs
 * @contact  group@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\Http\Controller;

use Swoft;
use Swoft\Exception\SwoftException;
use Swoft\Http\Message\ContentType;
use Swoft\Http\Message\Response;
use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;
use Swoft\View\Renderer;
use Throwable;
use function context;
use App\Exception\ApiException;
use Swlib\SaberGM;
use Swoft\Db\DB;
use Swoft\Bean\Annotation\Mapping\Inject;
use App\Model\Dao\AccountDao;
use Swoft\Redis\Pool;
use Swoft\Redis\Redis;
use Swoft\Log\Helper\Log;

/**
 * Class HomeController
 * @Controller()
 */
class HomeController
{
    /**
     * @Inject()
     * @var AccountDao
     */
    private $AccountDao;
    /**
     * 例子 1: 如果 Inject 没有参数,会使用 var 定义的类型
     *
     * @Inject()
     *
     * @var Pool 默认连接使用的是 redis.pool
     */
    private $redis;

    /**
     * @RequestMapping("/")
     * @throws Throwable
     */
    public function index(): Response
    {
        /** @var Renderer $renderer */
        $renderer = Swoft::getBean('view');
        $content  = $renderer->render('home/index');

        return context()->getResponse()->withContentType(ContentType::HTML)->withContent($content);
    }

    /**
     * @RequestMapping("/hi")
     *
     * @return Response
     * @throws SwoftException
     */
    public function hi(): Response
    {
        return context()->getResponse()->withContent('hi');
    }

    /**
     * @RequestMapping("/hello[/{name}]")
     * @param string $name
     *
     * @return Response
     * @throws SwoftException
     */
    public function hello(string $name): Response
    {
        return context()->getResponse()->withContent('Hello' . ($name === '' ? '' : ", {$name}"));
    }

    /**
     * @RequestMapping("/testThrow")
     * @throws ApiException
     */
    public function testThrow()
    {
        //$url = 'http://tingapi.ting.baidu.com/v1/restserver/ting/?from=qianqian&version=2.1.0&method=baidu.ting.billboard.billList&format=json&size=20&type=1&offset=0';
        throw new ApiException("失败", 500);
    }

    /**
     * @RequestMapping("/test")
     * @return Response
     */
    public function testHttpClient()
    {

        /*sgo(function(){
            $url = 'https://api.apiopen.top/getJoke?page=1&count=2&type=video';
            $a = SaberGM::get($url);
            var_dump($a->body);
        });*/
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'https://api.apiopen.top/getJoke?page=1&count=2&type=video');

        echo $response->getStatusCode(); # 200
        echo $response->getHeaderLine('content-type'); # 'application/json; charset=utf8'
        echo $response->getBody(); # '{"id": 1420053, "name": "guzzle", ...}'

        return context()->getResponse()->withContent('http');
    }

    /**
     * @RequestMapping("/model")
     * @return Response
     */
    public function testModel()
    {
        $users = $this->AccountDao->getAccountInfo();
        //var_dump($users);
        return context()->getResponse()->withContent('model');
    }
    /**
     * @RequestMapping("/testRedis")
     * @return Response
     */
    public function testRedis()
    {
        $this->redis->set('user', ["name"=>"gimi", "age"=>"18"]);

        var_dump($this->redis->get('user'));
        $res = $this->redis->rawCommand('geoRadius','citys', 121.47, 39.55, 100000, 'km','count',100);
        //$res = $this->redis->rawCommand('geopos ','citys','beijing');
        var_dump($res);
        var_dump(Redis::get('user'));

        echo 'geodist: ' . $this->redis->rawCommand('geodist', 'citys', 'beijing', 'shanghai', 'km') . PHP_EOL;

        return context()->getResponse()->withContent('redis');
    }
    /**
     * @RequestMapping("/testLog")
     * @return Response
     */
    public function testLog()
    {
        Log::error('this %s log', 'error');
        return context()->getResponse()->withContent('log');
    }
}
