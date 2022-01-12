<?php

    namespace App\Console\Commands;

    use Illuminate\Console\Command;

    class Fixture extends Command
    {
        /**
         * The name and signature of the console command.
         *
         * @var string
         */
        protected $signature = 'fixture';

        /**
         * The console command description.
         *
         * @var string
         */
        protected $description = 'Create a new fixture on league';

        /**
         * Create a new command instance.
         *
         * @return void
         */
        public function __construct()
        {
            parent::__construct();
        }

        /**
         * Execute the console command.
         *
         * @return int
         */
        public function handle()
        {
            $this->info('Fixture Creating...');
            $teams_ary = array();
            $x = 18;

            for ($i = 0; $i < $x; $i++) {
                $teams_ary[$i] = 'Team ' . ($i + 1);
            }

            $schedule_ary = array();
            for ($i = -2; $i < $x; $i++) {
                for ($j = $i + 1; $j <= $x; $j++) {
                    if (isset($teams_ary[$j]) && isset($teams_ary[$j+2])) {
                        $home = $teams_ary[$i+2];
                        $away = $teams_ary[$j+2];
                        $schedule_ary[$i][] = [
                            'week' => $i,
                            'home' => $home,
                            'away' => $away
                        ];
                    }

                    /*if (isset($teams_ary[($i + $j)])) {
                        $week = $i + $j;
                        $t_two = $teams_ary[($i + $j)];
                        $schedule_ary[$week][] = array(
                            'Week' => $week,
                            'Team 1' => $t_one,
                            'Teams 2' => $t_two);
                    }else {
                        dump($i . ' - ' . $j);
                    } //end for j*/
                }

            } //end for i
            dd($schedule_ary);
        }
    }
