<?php

namespace App\Http\Controllers;


use App\HuyaUser;
use App\MyModel;
use Elasticsearch\ClientBuilder;
use Illuminate\Http\Request;
use App\Test;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;

class TestTestController extends Controller
{
    public static $tableName = 'test1';
    var $a = 5;

    //~~todo 分离到模型层~~
    public function get()
    {
        define("p1", "我是php333");
        //写法1
//        echo "1111";
//        $test = DB::table('test1')->get();
//        return $test;

        // 写法2: 重构写法1
        echo "1111";
        $a = 222;
        echo PHP_EOL;
        $test = DB::table(self::$tableName)->get();
        echo p1;
        echo PHP_EOL;
        echo $a;
        echo PHP_EOL;
        $b = $a + 1;
        echo $b;
        echo PHP_EOL;
        return $test;
    }

//    public function getAll(Request $request)
//    {
//        echo 555;
//        dump($request);
//        return Test::getAllitem();
//    }

    /**
     * 增
     */
    public function add()
    {
        echo "add";
        $test = DB::table(self::$tableName)->insert(
            [
                'name' => 's1',
                'age' => '18'
            ]
        );
        return '增加成功';
    }

    /**
     * 删
     */
    public function delete()
    {
        echo "delete";
        $test = DB::table(self::$tableName)->where('id', '=', 2)->delete(); // 什么时候用-> ? 什么时候用 =>???
        return "删除成功";
    }

    /**
     * 改
     */
    public function update()
    {
        echo "update";
        $test = DB::table(self::$tableName)->where(['name' => 't3'])->update(
            ['age' => 24]
        ); // 中括号的作用？
        return "更新成功";
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    /**
     * post 路径参数; body 参数
     */
    public function postupdate(Request $request)
    {
        // 写法一: 写死了
//        echo "update";
//        $test = DB::table(self::$tableName)->where(['name' => 'tom'])->update(
//            ['age' => 666]
//        ); // 中括号的作用？
//        return "更新成功";

        // 写法二: 根据传过来的参数进行更新
        echo "update";
        $test = DB::table(self::$tableName)->where(['name' => $request->get("name")])->update(
            ['age' => $request->get("age")]
        ); // 中括号的作用？

        logs()->info("test log >>> " . $request);

        return "更新成功";

    }


    /**
     * 路径参数
     */
    public function pathuri(Request $request, $args1)
    {
        echo "update";
        echo $args1;
        echo PHP_EOL;
        $test = DB::table(self::$tableName)->where(['name' => 't3'])->update(
            ['age' => $args1]
        ); // 中括号的作用？
        return "更新路径参数成功777";
    }

    /**
     * 路径参数: 通过数组（这里是字典）的方式取键获得值。
     */
    public function queryuri(Request $request)
    {
//        echo "update";
        echo PHP_EOL;
        $myarray = $request->all();
//        var_dump($request->all());

//        foreach ($myarray as $value) {
//            echo $value . PHP_EOL;
//        }

        echo $myarray["id"];
        echo PHP_EOL;
        echo $myarray['name'];
        echo PHP_EOL;


        echo PHP_EOL;
//        $test = DB::table(self::$tableName)->where(['name' => 't3'])->update(
//            ['age' => $args1]
//        ); // 中括号的作用？

        LOG::info('queryuri' . $request);


        return "查询参数更新成功";
    }

    public function testbracks()
    {
        $a = "wgy123";
        echo $a{0};
        echo PHP_EOL;
        echo $a[1];
        echo PHP_EOL;
//        echo $a(0); // 报错

        // 实现字典的逻辑
        $array = array(
            "foo" => "bar",
            "bar" => "foo"
        );

        echo $array["bar"];

        return "查询testbracks";
    }

    /**
     * set
     */
    public function redisSet(Request $request, $args1)
    {
        Redis::set($args1, 777);
        return "redis set 成功";
    }

    /**
     * get
     */
    public function redisGet()
    {
//        $res = Redis::get("hl66", "7777"); // 错误写法
//        $res = cache()->get("hl666");
        $res = Redis::get('hl888');
        logs()->info('redisGet 请求来了');
        return "redis get 成功, " . "content is " . $res;
    }

    /**
     * es search
     */
    public function searches()
    {
//        $res = Redis::get("hl66", "7777"); // 错误写法
//        $res = cache()->get("hl666");
//        $res = Redis::get('hl888');

        $keywords = "你是猪粑粑";

        //        如果都没满足,则最后进行模糊查询
        $esRes = HuyaUser::search($keywords)
            ->orderBy('score', 'desc')
            ->paginate(50)
            ->take(50);

        return "redis get 成功, " . "content is " . $esRes;
    }


    // es
//    public function getData(Request $request)
    public function getDataOld()
    {
        logs()->info("es 开始搜索");

        // 不使用babenkoivan的时候。
//        $params = [
//          'index'=>'my_index',
//            'body'=>[
//                'query'=>[
//                    'match'=>[
//                        'color'=>'red'
//                    ]
//                ]
//            ]
//        ];

        // set query string
        $res = MyModel::search('phone')
//        $res = MyModel::search($params)
//             specify columns to select
            ->select(['title', 'price'])
            // filter
            ->where('color', 'red')
            // sort
            ->orderBy('price', 'asc')
            // collapse by field
            ->collapse('brand')
            // set offset
            ->from(0)
            // set limit
            ->take(10)
            // get results
            ->get();

//        $res = MyModel::search('phone')
//            ->count();
        logs()->info("记录php es 查询结果");
        logs()->info("res->" . $res);
        return $res;
    }

    public function createIndex()
    {
        logs()->info("createIndex");
        $es = ClientBuilder::create()->setHosts(['192.168.1.102:9200'])->build();
        $params = [
            'index' => 'my_index'
        ];
        $r = $es->indices()->create($params);
        dump($r);
    }

    public function addDoc()
    {
        logs()->info("add doc");
        $es = ClientBuilder::create()->setHosts(['192.168.1.102:9200'])->build();
        $params = [
            'index' => 'my_index',
            'type' => 'test_type',
            'id' => 100,
            'body' => ['id' => 100, 'title' => '新冠决赛阶段', 'author' => '张三']
        ];

        $r = $es->index($params);
        dump($r);
    }

    public function searchDoc()
    {
        logs()->info("search doc");
        $es = ClientBuilder::create()->setHosts(['192.168.1.102:9200'])->build();
        $params = [
            'index' => 'my_index',
            'body' => [
                'query' => [
                    'match' => [
                        'author' => '张三'
                    ]
                ]
            ]
        ];

        $r = $es->search($params);
        dump($r);
    }

    public function getData()
    {
        logs()->info("es 开始搜索");

        $client = ClientBuilder::create()
            ->setHosts(['192.168.1.102:9200'])
            ->build();

        $params = [
            'index' => 'my_index',
            'id' => 'my_id',
            'body' => ['testField' => 'abc']
        ];

        $result = $client->index($params);
        var_dump($result);

    }

//    public function getAllData(Request $request)
//    {
//        $from = 0;
//        $size = 200;
////        $response = $this->es_service->all($from, $size);
//        $response = $this->all($from, $size);
//        return $this->jsonpSuccess($response);
//    }

//    public function all($from = 0, $size = 200)
//    {
//        $es = $this->es;
//        $params['index'] = $this->index;
//        $params['type'] = $this->type;
//        $params['size'] = $size;
//        $params['from'] = $from;
//        try {
//            $results = $es->search($params);
//            $hits = $results['hits'];
//            return $hits;
//        } catch (\Exception $ex) {
//            \Log::critical($ex);
//            $this->apiError("ES - Unable to get Entries", 400);
//        }
//    }
//
//
//    public function insertData(Request $request)
//    {
//        $parameters = $request->json()->all();
//        if (isset($parameters['type']) & amp;
//        &
//        amp;
//        $parameters['type'] != '') {
//        $response = $this->es_service->create($parameters);
//        return $this->jsonpSuccess($response);
//    } else {
//        return $this->jsonpError('Validation error(s) occurred', 400, 400, 'Data is not inserted!.');
//    }
// }


}
