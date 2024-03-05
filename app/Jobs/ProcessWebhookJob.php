<?php
namespace App\Jobs;

use Spatie\WebhookClient\Jobs\ProcessWebhookJob as SpatieProcessWebhookJob;

class ProcessWebhookJob extends SpatieProcessWebhookJob
{
    public function handle()
    {
        $kk = $this->webhookCall;
        dd($kk);

        // $this->webhookCall // contains an instance of `WebhookCall`

        // perform the work here
    }
}
?>