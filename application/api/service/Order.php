<?php
/**
 * Created by PhpStorm.
 * User: hao
 * Date: 2020/1/1
 * Time: 15:12
 */

namespace app\api\service;


use app\api\model\Product;
use app\lib\exception\OrderException;

class Order
{
    //  订单的商品列表，也就是客户端传递过来的products 参数
    protected $oProducts;

    // 真实的商品信息 （包括库存量）
    protected $products;

    protected $uid;

    public function place($uid, $oProducts)
    {
        // oProducts 和 products 作对比
        // products 从数据库中查询出来
        $this->oProducts = $oProducts;
        $this->products = $this->getProductsByOrder($oProducts);
        $this->uid = $uid;
        $status = $this -> getOrderStatus();
        if($status['pass']){
            $status['order_id'] = -1;
            return $status;
        }

        // 开始创建订单

        $orderSnap = $this -> snapOrder();

    }

    // 生成订单快照
    private function snapOrder(){
        $snap = [
            'orderPrice'=>0,
            'totalCount'=>0,
            'pStatus' => []
        ];
    }
    private function getOrderStatus()
    {
        $status = [
            'pass' => true,
            'orderPrice' => 0,
            'pStatusArray' => []
        ];
        foreach ($this->oProducts as $oProduct) {
            $pStatus = $this->getProductStatus(
                $oProduct['product_id'],
                $oProduct['count'],
                $this->products
            );
            if (!$pStatus['haveStock']) {
                $status['pass'] = false;
            }
            $status['orderPrice'] == $pStatus['totalPrice'];
            array_push($status['pStatusArray'], $pStatus);
        }
        return $status;
    }

    private function getProductStatus($oPID, $oCount, $products)
    {
        $pIndex = -1;
        $pStatus = [
            'id' => null,
            'haveStock' => false,
            'count' => 0,
            'totalPrice' => 0
        ];
        for ($i = 0; $i < count($products); $i++) {
            if ($oPID == $products[$i]['id']) {
                $pIndex = $i;
            }
        }
        if ($pIndex == -1) {
            // 客户端传递的product_id 有可能根本不存在
            throw new OrderException(
                ['msg' => 'id为' . $oPID . '商品不存在，创建订单失败']
            );
        } else {
            $product = $products[$pIndex];
            $pStatus['id'] = $product['id'];
            $pStatus['name'] = $product['name'];
            $pStatus['count'] = $oCount;
            $pStatus['totalPrice'] = $product['price'] * $oCount;
            if ($product['stock'] - $oCount >= 0) {
                $pStatus['haveStock'] = true;
            }
        }
        return $pStatus;
    }

    private function getProductsByOrder($oProducts)
    {
        foreach ($oProducts as $item) {
            array_push($oPIDs, $item['product_id']);
        }
        $products = Product::all($oPIDs)
            ->visible(['id', 'price', 'stock', 'name', 'main_img_url'])
            ->toArray();
        return $products;

    }
}