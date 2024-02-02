<?php
namespace lottery5d;
class lotteryController{

    public function getlotteries(){


        $lottery = new lotteryModel();
        $lotteries = $lottery->getlotteries();
        return $lotteries;
        
        
    }

    public function alllotteriesgames()
    {

        $lottery = new lotteryModel();
        $result = $lottery->alllotteriesgames();
        $lottery  = [];
        foreach ($result as $row) {
            $lottery[] = ['gt_id' => $row['gt_id'], 'label' => $row['name'],'game_type'=>$row['game_type'], 'status' => $row['state']];
        }

        return ['message' => 'ALl Lottery Names', 'type' => 'success', 'data' => $lottery];
    }


      /**
     * get lottery games
     * @param $lt_id int lottery id
     * @return array
     */

     public function getlotterygames($lt_id)
     {
         $lottery = new lotteryModel();
         $result = $lottery->getlotterygames($lt_id);
 
         // $result = $select->fetch('game_type', [['lottery_type', '=', $lt_id]]);
 
         $lottery = [];
 
         foreach ($result as $row) {
             $lottery[] = ['lottery_id' => $row['gt_id'], 'name' => $row['name'], 'status' => $row['state'], 'seconds_per_issue' => $row['seconds_per_issue']];
         }
 
 
         return ['message' => 'Lottery Games', 'type' => 'success', 'data' => $lottery];
     }
 

}