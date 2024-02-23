<?php

namespace App\Listeners;

use App\Events\SubmissionSaved;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class SubmissionSavedListener implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  SubmissionSaved  $event
     * @return void
     */
    public function handle(SubmissionSaved $event)
    {
        $submission = $event->submission;
        Log::info('Submission saved successfully. Name: ' . $submission->name . ', Email: ' . $submission->email);
    }
}
