<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\WeeklyTodoReport;
use Illuminate\Console\Command;

class CreateWeeklyTodoReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'todo-report:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        User::get()->map(function($user){
            $todo =$user->todos()->where('status', 'TODO')->count();
            $done = $user->todos()->where('status', 'DONE')->count();
            $in_progress = $user->todos()->where('status', 'IN_PROGRESS')->count();
            WeeklyTodoReport::create([
                'todo' => $todo,
                'done' => $done,
                'in_progress' => $in_progress,
                'user_id' => $user->id
            ]);
        });

        return Command::SUCCESS;
    }
}
