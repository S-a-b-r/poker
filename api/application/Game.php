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

        public function checkCombination($gameCards){

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
                    return '1000';//Флеш-рояль
                }
                else{
                    $values = [];
                    for($i = 0; $i < count($arr[$checkFlashSuit]); $i++){
                        $values[] = $arr[$checkFlashSuit][$i]['v'];
                    }
                    for($i = 0; $i < count($values)-4; $i++){
                        for($j = 9; $j > 6; $j--){
                            if($values[$i] == $j && $values[$i+4] == $j-4){
                                return  '90'.$j;//Стрит-флеш
                            }
                        }
                        for($j = 14; $j > 9; $j--){
                            if($values[$i] == $j && $values[$i+4] == $j-4){
                                return  '9'.$j;//Стрит-флеш
                            }
                        }
                    }
                    if(strlen($arr[$checkFlashSuit][0]['v']) == 1){
                        return '60'.$arr[$checkFlashSuit][0]['v'];//just флеш
                    }
                    return '6'.$arr[$checkFlashSuit][0]['v'];//just флеш
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
                $arr2 = array_count_values($values);//Массив, который считает кол-во повторяющихся карт

                //Проверка на КАРЕ, СЕТ, ПАРА, ДВЕ ПАРЫ, ФУЛЛ ХАУС;
                foreach($arr2 as $key1 => $va1){
                    if($va1 == 4){
                        if(strlen($key1) == 1){
                            return '80'.$key1;//Каре
                        }
                        return '8'.$key1;//Каре
                    }
                    elseif($va1 == 3){
                        foreach($arr2 as $key2 => $va2){
                            if($va2 == 2){
                                if(strlen($key1) == 1){
                                    return '70'.$key1;//Фулл хаус
                                }
                                return '7'.$key1;//Фулл хаус
                            }
                        }
                        if(strlen($key1) == 1){
                            return '40'.$key1;//Сет -  триплет
                        }
                        return '4'.$key1;//Сет -  триплет
                    }

                    elseif($va1 == 2){
                        foreach($arr2 as $key2 => $va2){
                            if($va2 == 2 && $key2 != $key1){
                                if($key2 > $key1){
                                    if(strlen($key2) == 1){
                                        return '30'.$key2;//Две пары
                                    }
                                    return '3'.$key2;//Две пары
                                }
                                if(strlen($key1) == 1){
                                    return '30'.$key1;//Две пары
                                }
                                return '3'.$key1;//Две пары
                            }
                        }
                        if(strlen($key1) == 1){
                            return '20'.$key1;//Пара
                        }
                        return '2'.$key1;//Пара
                    }
                }

                //Проверка на стрит
                $uniq = array_unique($values);
                for($i = 0; $i < count($uniq)-4; $i++){
                    for($j = 14; $j > 9; $j--){
                        if($uniq[$i] == $j && $uniq[$i+4] == $j-4){
                            return '5'.$j;//Стрит
                        }
                    }
                    for($j = 9; $j > 6; $j--){
                        if($uniq[$i] == $j && $uniq[$i+4] == $j-4){
                            return '50'.$j;//Стрит
                        }
                    }
                }
                return '1'.$values[0];//Теперь у нас комбинации хранятся в виде **??, где ** - номер комбинации, а ?? - номер старшей карты в комбинации
            }
        }

        //Разделение массива карт на 4 массива по мастям
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

        //Создание игрока
        public function createPlayer($userId, $card1, $card2, $combination, $rates){
            if($card1 && $card2 && $combination){
                return $this->db->createPlayer($userId, $card1, $card2, $combination, $rates);
            }
            return ['error', '15'];
        }
        
        //Старт игры
        public function startGame($tableId){
            $table = $this->db->getTableById($tableId);
            $playersId = explode(" ",$table['active_players_id']);
            if(count($playersId) < 2){
                return ['error','14'];
            }
            $cards = $this->getRandomCard(5 + count($playersId)*2);
            $closeCards = array_slice($cards, 0, 5);
            $playersCards = array_slice($cards, 5, count($playersId)*2);
            $players = [];//Все игроки
            $closeCardsStr;
            for($i = 0; $i< 5; $i++){
                $closeCardsStr .= $this->cardToString($closeCards[$i])." ";
            }

            for($i = 0; $i < count($playersId); $i++){
                $cardForComb = $closeCards;
                $cardForComb[] = $playersCards[0];
                $cardForComb[] = $playersCards[1];
                $player = $this->db->createPlayer( $playersId[$i], $this->cardToString($playersCards[0]), $this->cardToString($playersCards[1]), $this->checkCombination($cardForComb), 0);
                $players[] = $player;
                array_splice($playersCards, 0, 2);
            }
            return $this->db->createGame($tableId, $closeCardsStr, $players[1], $players[0], $players[1], $players[2], $players[3], $players[4], $players[5], $players[6]);
        }

        //Преобразование карты в строку(Для хранения в БД)
        public function cardToString($card){
            return $card['v'].":".$card['s'];
        }
        //Обратное преобразование из строки в карту
        public function stringToCard($str){
            $card = explode(":", $str);
            $result['v'] = $card[0];
            $result['s'] = $card[1];
            return  $result;
        }

        //Получение игры из БД и преобразование в нормальный вид
        public function getGame($id){
            $game = $this->db->getGame($id);
            for($i = 1; $i < 8; $i++){
                $game['player'.$i] = $this->db->getPlayer($game['player'.$i]);
            }

            for($i = 1; $i < 8; $i++){
                for($j = 1; $j < 3; $j++){
                    if($game['player'.$i]){
                        $game['player'.$i]['card'.$j] = $this->stringToCard($game['player'.$i]['card'.$j]);
                    }
                }
            }


            $game['board_cards'] = array_slice(explode(" ", $game['board_cards']), 0, 5) ;

            for($i = 0; $i < 5; $i++){
                if($game['board_cards'][$i]){
                    $game['board_cards'][$i] = $this->stringToCard($game['board_cards'][$i]);
                }
            }

            $game['close_cards'] = array_slice(explode(" ", $game['close_cards']), 0, 5) ;

            for($i = 0; $i < 5; $i++){
                if($game['close_cards'][$i]){
                    $game['close_cards'][$i] = $this->stringToCard($game['close_cards'][$i]);
                }
            }


            //$game['player1']['card1'] = $this->stringToCard($game['player1']['card1']);
            //$game['player1']['card2'] = $this->stringToCard($game['player1']['card2']);
            return $game;
        }

        

        //Выдать деньги
        public function raiseMoney($gameId, $sum){
            $game = $this->db->getGame($gameId);
            $playerId = $game['active'];
            $player = $this->db->getPlayer($playerId);
            $user = $this->db->getUserById($player['user_id']);
            $money = $user['money'];
            //Добавить all in;
            //СРОЧНО ДОБАВИТЬ all in;
            if($sum > $money){
                $sum = $money;
            }
            $this->db->updMoney($user['id'], $user['money'] - $sum);
            $this->db->updRatesPlayer($playerId, $player['rates'] + $sum);
            return $this->db->updRatesGame($gameId, $game['all_rates'] + $sum);
        }

        //Ходы
        public function fold($gameId){
            $game = $this->db->getGame($gameId);
            
            
            for($i = 1; $i < 8; $i++){
                if($game['player'.$i] == $game['active']){
                    $this->db->foldPlayer($gameId, 'player'.$i);
                }
            }
            $this->circle($gameId);
            return $this->nextCircle($gameId);
        }

        public function raise($gameId, $sum){
            $this->raiseMoney($gameId, $sum);
            $this->circle($gameId);
            $this->setStartCircle($gameId);
            return $this->nextCircle($gameId);
        }

        public function call($gameId){
            $game = $this->db->getGame($gameId);
            $act = $game['active'];
            $players = [];

            for($i = 1; $i < 8; $i++){
                if($game['player'.$i]){
                    $players[] = $game['player'.$i];
                }
            }

            $prevPlayerId = $players[count($players)-1];

            for($i = 1; $i < count($players); $i++){
                if($players[$i] == $act){
                    $prevPlayerId = $players[$i-1];
                }
            }

            $prevPlayer =  $this->db->getPlayer($prevPlayerId);
            //return $prevPlayer;
            $sum = $prevPlayer['rates'] - $this->db->getPlayer($act)['rates'];
            $this->raiseMoney($gameId, $sum);
            $this->circle($gameId);
            return $this->nextCircle($gameId);
        }

        public function check($gameId){
            $this->circle($gameId);
            
            return $this->nextCircle($gameId);
        }

        //Переопределение начала круга(Для повышения)
        public function setStartCircle($gameId){
            $playerId = $this->db->getGame($gameId)['active'];
            return $this->db->setStartCircle($gameId, $playerId);
        }

        //Проверка на прохождение круга, добавление карт на стол
        public function nextCircle($gameId){
            $game = $this->db->getGame($gameId);
            if($game['active'] == $game['start_circle']){
                if($game['circle']==1){
                    $this->openCards($gameId, 3);
                }
                elseif($game['circle']==2){
                    $this->openCards($gameId, 1);
                }
                elseif($game['circle']==3){
                    $this->openCards($gameId, 1);
                }
                elseif($game['circle'] == 4){
                    return $this->getWinner($gameId);
                }
                return $this->db->nextCircle($gameId, $game['circle'] + 1);
            }
            return true;
        }

        //Открытие карт, повернутых "рубашкой"
        public function openCards($gameId, $count){
            $game = $this->db->getGame($gameId);
            $closeCards = $game['close_cards'];
            $closeCards = explode(' ',$closeCards);
            $activeCards = $game['board_cards'];//Карты, которые уже находятся на столе
            for($i = 0; $i < $count; $i++){
                $activeCards.= $closeCards[$i]." ";
            }
            array_splice($closeCards, 0, $count);
            for($i = 0; $i < count($closeCards); $i++){
                $cards.= $closeCards[$i]." ";
            }
            return $this->db->setCard($gameId, $activeCards, $cards);
        }

        //Переключение на следующего игрока
        private function circle($gameId){
            $game = $this->db->getGame($gameId);
            $act = $game['active'];
            $players = [];
            for($i = 1; $i < 8; $i++){
                if($game['player'.$i]){
                    $players[] = $game['player'.$i];
                }
            }
            for($i = 0; $i < count($players) - 1; $i++){
                if($players[$i] == $act){
                    return $this->db->setActive($gameId, $players[$i+1]);
                }
            }
            return $this->db->setActive($gameId, $players[0]);
        }

        public function getWinner($gameId){
            $game = $this->getGame($gameId);
            
            $players = [];
            for($i = 1; $i < 8; $i++){
                if($game['player'.$i]){
                    $players[] = $game['player'.$i];
                }
            }
            $winner = $players[0];
            for($i = 1; $i < count($players); $i++){
                if($winner['comb']<$players[$i]['comb']){
                    $winner = $players[$i];
                }
            }
            $winners = [];
            for($i = 1; $i < count($players); $i++){
                if($winner['comb'] == $players[$i]['comb']){
                    $winners[] = $players[$i];
                }
            }
            if(count($winners)>1){
                $winner = $winners[0];

                if($winners[0]['card1']['v'] > $winners[0]['card2']['v']){
                    $winnerValue = $winners[0]['card1']['v'];
                }
                else{
                    $winnerValue = $winners[0]['card2']['v'];
                }

                //Ищем победителя
                for($i = 1; $i < count($winners);$i++){
                    for($j = 0; $j < 3; $j++){
                        if($winners[$i]['card'.$j]['v'] >= $winnerValue){
                            $winnerValue = $winners[$i]['card'.$j]['v'];
                            $winner = $winners[$i];
                        }
                    }
                }
                for($i = 1; $i < count($winners);$i++){
                    for($j = 0; $j < 3; $j++){
                        if($winners[$i]['card'.$j]['v'] >= $winnerValue){
                            $winnerValue = $winners[$i]['card'.$j]['v'];
                            $winner = $winners[$i];
                        }
                    }
                }
                $this->winner($winner['user_id'],$game['all_rates']);
                return $winner;
            }
            $this->winner($winner['user_id'], $game['all_rates']);
            return $winner;

            //$winner = $players[0];
            //$winners = [];
            //for($i = 1; $i < count($players); $i++){
            //    if($winner['comb'] < $players[$i]){
            //        $winner = $players[$i];
            //        
            //    }
            //}
            //for($i = 0; $i < count($players); $i++){
            //    if($winner['comb'] == $players[$i]){
            //        $winners[] = $player[$i];
            //    }
            //}
//
            ////Проверка по комбинации(если есть чел, у которого комбинация сильнее остальных)
            //if(count($winners) == 1){
            //    return $winner;
            //}
//
            ////Проверка по значению карт(если у нескольких игроков одинаковые комбинации)
            //else{
            //    //Задаем по стандарту победителя(первогов массиве)
            //    $winner = $winners[0];
//
            //    if($winners[0]['card1']['v'] > $winners[0]['card2']['v']){
            //        $winnerValue = $winners[0]['card1']['v'];
            //    }
            //    else{
            //        $winnerValue = $winners[0]['card2']['v'];
            //    }
//
            //    //Ищем победителя
            //    for($i = 1; $i < count($winners);$i++){
            //        for($j = 0; $j < 3; $j++){
            //            if($winners[$i]['card'.$j]['v'] >= $winnerValue){
            //                $winnerValue = $winners[$i]['card'.$j]['v'];
            //                $winner = $winners[$i];
            //            }
            //        }
            //    }
            //    for($i = 1; $i < count($winners);$i++){
            //        for($j = 0; $j < 3; $j++){
            //            if($winners[$i]['card'.$j]['v'] >= $winnerValue){
            //                $winnerValue = $winners[$i]['card'.$j]['v'];
            //                $winner = $winners[$i];
            //            }
            //        }
            //    }
            //}
            
        }

        public function winner($id, $money){
            $user = $this->db->getUserById($id);
            $stats = $this->db->getStatsById($id);
            if($user && $stats){
                $activeMoney = $user['money'] + $money;
                $allMoney = $stats['win'] + $money;
                if($stats['biggest_win']<$money){
                    $this->db->updBiggestWin($id, $money);
                }
                $this->db->updWinStats($id,$allMoney);
                return $this->db->transferMoney($id, $activeMoney, $user['bank']);
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
                return $this->db->transferMoney($id, $activeMoney, $user['bank']);
                //Написать получение денег с банка
            }
            return ['error','8'];
        }
    }
?>