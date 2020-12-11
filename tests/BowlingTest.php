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

         $this->assertSame(0, $bowling->score());
     }

     /**
      * @test
      */
     public function it_scores_all_ones()
     {
         $bowling = new Bowling();

         foreach (range(1, 20) as $roll) {
             $bowling->roll(1);
         }

         $this->assertSame(20, $bowling->score());
     }

     /**
      * @test
      */
     public function it_awards_a_one_roll_bonus_for_every_spare()
     {
         $bowling = new Bowling();

         $bowling->roll(5);
         $bowling->roll(5); //spare

         $bowling->roll(8);

         foreach (range(1, 17) as $roll) {
             $bowling->roll(0);
         }

         $this->assertSame(26, $bowling->score());
     }

     /**
      * @test
      */
     public function it_awards_a_two_roll_bonus_for_every_strike()
     {
         $bowling = new Bowling();

         $bowling->roll(10); //strike

         $bowling->roll(5);
         $bowling->roll(2);

         foreach (range(1, 16) as $roll) {
             $bowling->roll(0);
         }

         $this->assertSame(24, $bowling->score());
     }

     /**
      * @test
      */
     public function it_awards_a_two_roll_bonus_for_strike_and_strik_again()
     {
         $bowling = new Bowling();

         $bowling->roll(10); //strike

         $bowling->roll(10); //strike

         $bowling->roll(3);
         $bowling->roll(2);

         foreach (range(1, 14) as $roll) {
             $bowling->roll(0);
         }

         $this->assertSame(43, $bowling->score());
     }

     /**
      * @test
      */
     public function a_spare_on_the_final_frame_grans_one_extra_ball()
     {
         $bowling = new Bowling();

         foreach (range(1, 18) as $roll) {
             $bowling->roll(0);
         }

         $bowling->roll(5);
         $bowling->roll(5); //spare

         $bowling->roll(5);

         $this->assertSame(15, $bowling->score());
     }
     /**
      * @test
      */
     public function a_strike_on_the_final_frame_grans_two_extra_balls()
     {
         $bowling = new Bowling();

         foreach (range(1, 18) as $roll) {
             $bowling->roll(0);
         }

         $bowling->roll(10); //strike

         $bowling->roll(8);
         $bowling->roll(8);

         $this->assertSame(26, $bowling->score());
     }

     /**
      * @test
      */
     public function a_strike_on_the_final_frame_grans_two_extra_balls_even_the_are_also_strikes()
     {
         $bowling = new Bowling();

         foreach (range(1, 18) as $roll) {
             $bowling->roll(0);
         }

         $bowling->roll(10); //strike

         $bowling->roll(10);
         $bowling->roll(10);

         $this->assertSame(30, $bowling->score());
     }

     /**
      * @test
      */
     public function it_scores_a_perfect_game()
     {
         $bowling = new Bowling();

         foreach (range(1, 12) as $roll) {
             $bowling->roll(10);
         }

         $this->assertSame(300, $bowling->score());
     }
 }
