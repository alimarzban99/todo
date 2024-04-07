<?php

namespace App\Jobs;

use App\Notifications\TaskNotification;
use App\Repositories\TaskRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class TaskDueDateJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $tomorrowTasks = app(TaskRepository::class)->getTomorrowTasks();

        foreach ($tomorrowTasks as $task) {
            $task->user->notify(new TaskNotification($task));
        }
    }
}
