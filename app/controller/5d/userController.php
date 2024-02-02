<?php
class userController{

     /**
     * User balance
     * @param $uid int user id

     */
    public function userBalance($uid)
    {
        $user = new userModel();
        $res = $user->userBalance($uid);
        // var_dump($res);
        // $res = 'koif';
        return ['message' => 'User balance', 'type' => 'success', 'data' =>bcdiv(number_format($res['balance'],0,'',''),1,4)];
    }

}