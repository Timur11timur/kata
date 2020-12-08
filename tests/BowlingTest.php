 <?php

 use App\Bowling;
 use PHPUnit\Framework\TestCase;

 class BowlingTest extends TestCase
 {
     /**
      * @test
      */
     public function it_scores_a_gutter_game_as_zero()
     {
         $bowling = new Bowling();

         foreach (range(1, 20) as $roll) {
             $bowling->roll(0);
         }
     }
 }
