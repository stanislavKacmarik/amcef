<?php

namespace App\Services;

use App\Mail\Todo\NewShare;
use App\Models\Todo;
use Illuminate\Support\Facades\Log;
use Mail;
use Symfony\Component\Mailer\Exception\TransportException;

class MailService
{

    public function sendTodoShareEmails(array $emails, Todo $todo): void
    {
        foreach ($emails as $email) {
            try {
                Mail::to($email)->send(new NewShare($todo));
            } catch (TransportException $e){
                Log::emergency('Unable to send email! Message: '. $e->getMessage());
            }
        }
    }

}