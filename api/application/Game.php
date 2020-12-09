<?php
    class Game{
        function __construct(){
            $this->db = new DB();
            $this->table = new Table();
        }

        protected $card = array(
            ['v'=>2,'s'=>'H'],
            ['v'=>3,'s'=>'H'],
            ['v'=>4,'s'=>'H'],
            ['v'=>5,'s'=>'H'],
            ['v'=>6,'s'=>'H'],
            ['v'=>7,'s'=>'H'],
            ['v'=>8,'s'=>'H'],
            ['v'=>9,'s'=>'H'],
            ['v'=>10,'s'=>'H'],
            ['v'=>11,'s'=>'H'],
            ['v'=>12,'s'=>'H'],
            ['v'=>13,'s'=>'H'],
            ['v'=>14,'s'=>'H'],
            ['v'=>2,'s'=>'D'],
            ['v'=>3,'s'=>'D'],
            ['v'=>4,'s'=>'D'],
            ['v'=>5,'s'=>'D'],
            ['v'=>6,'s'=>'D'],
            ['v'=>7,'s'=>'D'],
            ['v'=>8,'s'=>'D'],
            ['v'=>9,'s'=>'D'],
            ['v'=>10,'s'=>'D'],
            ['v'=>11,'s'=>'D'],
            ['v'=>12,'s'=>'D'],
            ['v'=>13,'s'=>'D'],
            ['v'=>14,'s'=>'D'],
            ['v'=>2,'s'=>'C'],
            ['v'=>3,'s'=>'C'],
            ['v'=>4,'s'=>'C'],
            ['v'=>5,'s'=>'C'],
            ['v'=>6,'s'=>'C'],
            ['v'=>7,'s'=>'C'],
            ['v'=>8,'s'=>'C'],
            ['v'=>9,'s'=>'C'],
            ['v'=>10,'s'=>'C'],
            ['v'=>11,'s'=>'C'],
            ['v'=>12,'s'=>'C'],
            ['v'=>13,'s'=>'C'],
            ['v'=>14,'s'=>'C'],
            ['v'=>2,'s'=>'S'],
            ['v'=>3,'s'=>'S'],
            ['v'=>4,'s'=>'S'],
            ['v'=>5,'s'=>'S'],
            ['v'=>6,'s'=>'S'],
            ['v'=>7,'s'=>'S'],
            ['v'=>8,'s'=>'S'],
            ['v'=>9,'s'=>'S'],
            ['v'=>10,'s'=>'S'],
            ['v'=>11,'s'=>'S'],
            ['v'=>12,'s'=>'S'],
            ['v'=>13,'s'=>'S'],
            ['v'=>14,'s'=>'S'],
        );// s(suit) = H,D,C,S; v(values) = 2,3,4,5,6,7,8,9,10,11-J,12-Q,13-K,14-A;

        public function getRandomCard($n){//n - кол-во карт, которые нужно раздать;
            $allCards = $this->card;
            $m = 51;
            $gameCard = [];
            while($m > 51-$n){
                $i = rand (0, $m);
                $m--;
                $gameCard[] = $allCards[$i];
                array_splice($allCards, $i, 1);
            }
            return $gameCard;
        }

        public function checkCombination(){
            $gameCards = $this->getRandomCard(7);
            $arr = $this->divArrayOnSuit($gameCards);
            $checkFlash = false;
            $checkFlashSuit;
            for($i=0;$i<4;$i++){
                if(count($arr[$i]) >= 5){
                    $checkFlash = true;
                    $checkFlashSuit = $i;
                }
            }
            if($checkFlash){
                if($arr[$checkFlashSuit][0]['v'] == 14 && $arr[$checkFlashSuit][4]['v'] == 10){
                    return ['ok', 10];//Флеш-рояль
                }
                else{
                    $values = [];
                    for($i = 0; $i < count($arr[$checkFlashSuit]); $i++){
                        $values[] = $arr[$checkFlashSuit][$i]['v'];
                    }
                    for($i = 0; $i < count($values)-4; $i++){
                        for($j = 14; $j > 6; $j--){
                            if($values[$i] == $j && $values[$i+4] == $j-4){
                                return ['ok', 9];//Стрит-флеш
                            }
                        }
                    }
                    return ['ok', 6];//just флеш
                }
            }
            else{
                //Сортируем все карты по значению v
                $value = array_column($gameCards, 'v');
                array_multisort($value, SORT_DESC, $gameCards);


                $values = [];//Фигачим массив, который содержит только value карт
                for($i = 0; $i < count($gameCards); $i++){
                    $values[] = $gameCards[$i]['v'];
                }
                $arr2 = array_count_values ($values);//Массив, который считает кол-во повторяющихся карт

                //Проверка на КАРЕ, СЕТ, ПАРА, ДВЕ ПАРЫ, ФУЛЛ ХАУС;
                foreach($arr2 as $key1 => $va1){
                    if($va1 == 4){
                        return ['ok', 8];//Каре
                    }
                    elseif($va1 == 3){
                        foreach($arr2 as $va2){
                            if($va2 == 2){
                                return ['ok',7];//Фулл Хаус
                            }
                        }
                        return ['ok',4];//Сет -  триплет
                    }
                    elseif($va1 == 2){
                        foreach($arr2 as $key2 => $va2){
                            if($va2 == 2 && $key2 != $key1){
                                return ['ok', 3];//Две пары
                            }
                        }
                        return ['ok', 2];//Пара
                    }
                }

                //Проверка на стрит
                $uniq = array_unique($values);
                for($i = 0; $i < count($uniq)-4; $i++){
                    for($j = 14; $j > 6; $j--){
                        if($uniq[$i] == $j && $uniq[$i+4] == $j-4){
                            return ['ok', 5];
                        }
                    }
                }

                return ['ok', 1];
            }
        }

        public function divArrayOnSuit($arr){
            $arrH = [];
            $arrD = [];
            $arrC = [];
            $arrS = [];
            for($i=0; $i<count($arr); $i++){
                if($arr[$i]['s'] == 'H'){
                    $arrH[] = $arr[$i];
                }
                elseif($arr[$i]['s'] == 'D'){
                    $arrD[] = $arr[$i];
                }
                elseif($arr[$i]['s'] == 'C'){
                    $arrC[] = $arr[$i];
                }
                elseif($arr[$i]['s'] == 'S'){
                    $arrS[] = $arr[$i];
                }
            }

            $value1 = array_column($arrH, 'v');
            array_multisort($value1, SORT_DESC, $arrH);
            $value2 = array_column($arrD, 'v');
            array_multisort($value2, SORT_DESC, $arrD);
            $value3 = array_column($arrC, 'v');
            array_multisort($value3, SORT_DESC, $arrC);
            $value4 = array_column($arrS, 'v');
            array_multisort($value4, SORT_DESC, $arrS);

            return [$arrH,$arrD,$arrC,$arrS];
        }

        public function winner($id,$money){
            $user = $this->db->getUserById($id);
            $stats = $this->db->getStatsById($id);
            if($user && $stats){
                $activeMoney = $user['money'] + $money;
                $allMoney = $stats['win'] + $money;
                if($stats['biggest_win']<$money){
                    $this->db->updBiggestWin($id, $money);
                }
                $this->db->updWinStats($id,$allMoney);
                return ['ok',$this->db->transferMoney($id, $activeMoney, $user['bank'])];
            }
            return ['error','8'];
        }

        public function loser($id,$money){
            $user = $this->db->getUserById($id);
            $stats = $this->db->getStatsById($id);
            if($user && $stats){
                if($user['money'])
                $activeMoney = $user['money'] - $money;
                $allMoney = $stats['loss'] + $money;
                if($stats['biggest_loss'] < $money){
                    $this->db->updBiggestLoss($id, $money);
                }
                $this->db->updLossStats($id,$allMoney);
                return ['ok',$this->db->transferMoney($id, $activeMoney, $user['bank'])];
            }
            return ['error','8'];
        }
    }
?>