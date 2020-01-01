<?php
/**
 * Created by PhpStorm.
 * User: hao
 * Date: 2020/1/1
 * Time: 13:38
 */

namespace app\api\controller\v1;


use app\api\controller\BaseController;
use app\api\service\Token as TokenService;
use app\api\validate\OrderPlace;
use think\Controller;

class Order extends BaseController {
    // 用户在选择商品后,向api 提交包含所选择商品的相关信息
    // api在接受到信息后，需要检查订单相关商品的库存量
    // 有库存,把订单数据存入数据库中,下单成功，返回客户端消息，告诉客户端可以支付
    // 使用我们的支付接口，进行支付
    // 还需要再次进行库存量检测
    // 服务器这边就可以调用微信的支付接口进行支付
    // 微信回返回我们一个支付结果(异步)
    // 成功,也需要进行库存量检查
    // 成功，进行库存量的扣除，失败，返回一个支付失败的结果
    protected $beforeActionList = [
        'checkExclusiveScope' => ['only'=>'placeOrder']
    ];
    public function placeOrder(){
        (new OrderPlace())->goCheck();
        $product = input('post.product/a');
        $uid = TokenService::getCurrentUid();
    }
}