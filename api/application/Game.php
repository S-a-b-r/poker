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
                array_slice($allCards, $i);
            }
            return $gameCard;
        }

        public function checkCombination($gameCard){
            //$values = [];
            //$suit = [];
            //$sorted = array_orderby($gameCard, 'v', SORT_ASC);
            return $gameCard;
        }

        



    }
?>