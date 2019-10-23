<?php declare(strict_types=1);
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://swoft.org/docs
 * @contact  group@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\Model\Dao;
use Swoft\Db\DB;
use Swoft\Bean\Annotation\Mapping\Bean;
use App\Model\Entity\Account;
/**
 * @Bean()
 * Class Account
 * @package App\Model\Dao
 */
class AccountDao
{

    public function getAccountInfo()
    {
        //$users = DB::table('account')->get();

        $user =  Account::find(10000, ['uid','username']);
        //var_dump($user);
        $where      = [
            'uid' => 10000
        ];

// 'select * from `user` where (`password` = ? and `user_desc` like ? and `id` in (?))';
        //$sql = Account::whereProp($where)->first();
        //var_dump($sql);
        //$name = DB::table('account')->select('uid', 'username')->where('uid', '10000')->get();
        //$name = DB::table('account')->where('uid', '10000')->first(['uid','username']);
        $name = DB::table('account')->where('uid', '10000')->first();
        var_dump($name);
        return $user;
    }



}
