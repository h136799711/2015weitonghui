<?php
// .-----------------------------------------------------------------------------------
// | 
// | WE TRY THE BEST WAY
// | Site: http://www.gooraye.net
// |-----------------------------------------------------------------------------------
// | Author: 贝贝 <hebiduhebi@163.com>
// | Copyright (c) 2012-2014, http://www.gooraye.net. All Rights Reserved.
// |-----------------------------------------------------------------------------------

namespace Wap\Model;
use Think\Model;

class PrintqueueModel extends Model{
	
	
	/**
	 * 一行16个字
	 * 插入订单
                      * @userinfo 用户信息
                      * @dishlist  点菜列表
                      * @company 企业信息
                      * @return 1 成功 0：没有打印机可供打印
	 */
	public function insertOrder($userinfo,$dishList,$company) {
		//总价
		$price = 0 ;
		$orderid = $userinfo['orderid'];
        		$time = $userinfo['time'];
        		//list
        		$info = unserialize($userinfo['time']);

        		$printStr = '';

        		$printStr .= '订单编号：'.$orderid.'%%';
        		$printStr .= '条目      单价(元)  数量%%';
        		$printStr .= '----------------------'.'%%';

                    foreach ($dishList as $r){
                                        $printStr .= ($r['name'].'%%'.$this->padLeft($r['price'],15).$this->padLeft($r['num'],6).'%%'); 
                                        $price = $price + ($r['price']*$r['num']);
                    }
                        
        		$printStr .= '----------------------'.'%%';
        		$printStr .= '合计：'.$price.'(元)%%';
        		$printStr .= '----------------------'.'%%';
        		$printStr .= $userinfo["name"].' '.$userinfo["tel"].'%%';
        		// $printStr .= '联系电话：'.$userinfo["tel"].'%%';
        		$printStr .= '下单时间:'.date("Y-m-d H:i:s",$time).'%%';
        		$printStr .= '送货地址: '.$userinfo['address'].'%%';
        		$printStr .= '备注'.$userinfo['des'].'%%';

        		$data['status'] = 0;
        		$data['failed_cnt'] = 0;	
        		$data['ownerid'] = $userinfo['token'];
        		$data['printerid'] = $this->getPrinter($userinfo['token'],$company['cid']);

        		$data['insert_time'] = time();
        		$data['submitters'] = $userinfo['wecha_id'];
        		$data['data'] = $printStr;
                    if(!empty($data['printerid'])){
                            M('Printqueue')->data($data)->add();
                            return 1;
                    }

                    return 0;
	}

          private function seed()
            {

            list($msec, $sec) = explode(' ', microtime());

            return (float) $sec;

            }
                     //返回一台符合条件的可用的打印机
                     /*
                     * @token Token
                     * @cid      企业id
                     * @userpos 下单人位置
                     */
	public function getPrinter($token,$cid){

                     $printer = M('Printer')->where(array("ownerid"=>$token,"cid"=>$cid))->select();
                     if($printer === FALSE){
                            return "";
                     }else{
                            if(count($printer) > 1){
                                
                                //播下随机数发生器种子，用srand函数调用seed函数的返回结果
                                srand($this->seed());
                                $index = rand(0,count($printer)-1);
                                //输出产生的随机数，随机数的范围为10-100
                                return $printer[$index]['printerid'];

                            }else{                                
                                return $printer[0]['printerid'];
                            }
	           }	
          }

         /*
         * 右补空格，如果字符串不足制定长度，则补空格
         * @len 制定长度
         * @str 字符串
         */
         public function padRight($str,$len){
                    $strlen = strlen($str,'UTF8');
                    // $strlen = strlen($str);
                    if($strlen < $len){
                            $spaceLen = $len - $strlen;
                            $space = '';
                            for ($i=0; $i < $spaceLen; $i++) {                                                
                                   $space .= ' ';
                            }
                            return $str.$space;
                    }
                    return $str;
         }

        /*
         * 左补空格，如果字符串不足制定长度，则补空格
         * @len 制定长度
         * @str 字符串
         */
         public function padLeft($str,$len){
                    $strlen = strlen($str,'UTF8');

                    if($strlen < $len){
                            $spaceLen = $len - $strlen;
                            $space = '';
                            for ($i=0; $i < $spaceLen; $i++) {                                                
                                   $space .= ' ';
                            }
                            return $space.$str;
                    }
                    return $str;
         }
}
?>