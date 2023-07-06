<?php

namespace App\Jobs;

use App\Models\Brace\ApplicationBusiness;
use App\Models\Brace\ApplicationQuestion;
use App\Services\Base\BaseService;
use App\Services\Brace\BraceApplicationService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Artisan;

class CreateTablesAndSendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $tries = 3;

    protected array $user;
    protected array $inputs;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(array $user, array $inputs)
    {
        $this->user = $user;
        $this->inputs = $inputs;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        sleep(5);
        $this->inputs['user_id'] = $this->user['id'];
        ApplicationBusiness::create($this->inputs);
        ApplicationQuestion::create($this->inputs);

        $emailData = [
            'email' => $this->inputs['email'],
            'name' => $this->inputs['first_name'].' '.$this->inputs['last_name']
        ];

        try {
            // Send email to applicant
            BaseService::sendEmailGeneral(
                $emailData,
                'emails.application.notify-applicant',
                'BRACE | Application Complete',
                $emailData['email'],
                $emailData['name']
            );

        } catch (\Exception $e) {
            // If email fails, still return successful
            info("Line ".$e->getLine()." of ".$e->getFile().", ".$e->getMessage());
        }
    }

    public function failed($e)
    {
        info("Line ".$e->getLine()." of ".$e->getFile().", ".$e->getMessage());
        Artisan::call('dump-autoload');
        Artisan::call('config:cache');
        Artisan::call('cache:clear');
    }
}
