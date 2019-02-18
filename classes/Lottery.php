<?php
class Lottery extends Main
{
    /**
     * Получает из базы массив правил
     * @return Array Массив правил
     */
    public function getLotteryRules(){
        $result = $this->dbQuery("SELECT * FROM prizes");
        $rules = $result->fetchAll(PDO::FETCH_ASSOC);
        return $rules;
    }

    /**
     * Формирует массив участвующих в розыгрыше элементов по формуле 1 денежный, 1 вещевой, 8 поинтов
     * @return Array Отсортированный в случайном порядке массив
     */
    public function createLotteryArray()
    {
        $lotteryArray = array();
        $rules = $this->getLotteryRules();

        foreach ($rules as $rule) {
            if ($rule['prize_name'] == 'money') {
                array_push($lotteryArray, array($rule['prize_name'], rand(1, $rule['prize_rule'])));
            } elseif ($rule['prize_name'] == 'things') {
                array_push($lotteryArray, array($rule['prize_name'], 1));
            } elseif ($rule['prize_name'] == 'loyalty_points') {
                for ($i = 0; $i < 8; $i++) {
                    array_push($lotteryArray, array($rule['prize_name'], rand(1, $rule['prize_rule'])));
                };
            }
        }
        shuffle($lotteryArray);
        return $lotteryArray;
    }

    /**
     * Уменьшает в базе количество денежных и вещевых призов
     */
    public function incrementPrize(){

    }

    /**
     * Выдает случайный приз
     * @param Array заранее сформированный массив призов
     * @return Array приз в виде массива [кол-во, название приза]
     */
    public function getPrize($prizeArray){
        $win = rand(0, count($prizeArray));
        return $prizeArray[$win];
    }
}