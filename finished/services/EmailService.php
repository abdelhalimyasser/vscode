<?php

declare(strict_types=1);

namespace services;
use models\User;

use Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class EmailService
{
    private PHPMailer $mailer;

    public function __construct()
    {
        $this->mailer = new PHPMailer(true);
        $this->setup();
    }

    private function setup(): void
    {
        $this->mailer->isSMTP();
        $this->mailer->Host       = 'smtp.gmail.com';
        $this->mailer->SMTPAuth   = true;
        $this->mailer->Username   = 'email@gmail.com';
        $this->mailer->Password   = 'App_Password';
        $this->mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $this->mailer->Port       = 587;
        $this->mailer->CharSet    = 'UTF-8';

        $this->mailer->setFrom('email@gmail.com', 'NextHire AI Recruitment');
    }

    /**
     * This method sends a welcome email to the specified user after successful registration. It constructs a visually appealing HTML email template and sends it using PHPMailer.
     * The email includes a personalized greeting, a brief introduction to the NextHire system,
     * and a call-to-action button for the user to start their journey with NextHire.
     *
     * @param User $user This User object contains the recipient's email and first name for personalization.
     * @return bool Returns true if the email was sent successfully, false otherwise.
     * @throws Exception if there is an error during the email sending process
     */
    public function sendWelcomeEmail(User $user): bool
    {
        try {
            $this->mailer->addAddress($user->getEmail(), $user->getFirstName());

            $this->mailer->isHTML(true);
            $this->mailer->Subject = 'Welcome to NextHire 🚀';

            $this->mailer->Body = "";

            $this->mailer->send();

            $this->mailer->clearAddresses();
            return true;

        } catch (Exception $e) {
            error_log("Email sending failed: {$this->mailer->ErrorInfo}");
            return false;
        }
    }

    /**
     * This method sends a welcome email to a newly created employee.
     * It constructs a professional HTML email template that includes a personalized greeting,
     * an introduction to the NextHire system, and important information about their role and responsibilities within the company.
     *
     * @param User $user
     * @return bool
     */
    public function sendEmployeeWelcomeEmail(User $user): bool
    {
        try {
            $this->mailer->addAddress($user->getEmail(), $user->getFirstName());

            $this->mailer->isHTML(true);
            $this->mailer->Subject = 'Welcome to NextHire 🚀';

            $this->mailer->Body = "";

            $this->mailer->send();

            $this->mailer->clearAddresses();
            return true;

        } catch (Exception $e) {
            error_log("Email sending failed: {$this->mailer->ErrorInfo}");
            return false;
        }
    }

//    /
//    public function ()
//    {
//
//    }
}