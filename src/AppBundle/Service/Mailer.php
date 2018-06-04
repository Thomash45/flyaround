<?php
/**
 * Created by PhpStorm.
 * User: wilder9
 * Date: 02/06/18
 * Time: 17:12
 */

namespace AppBundle\Service;


class Mailer
{

    protected $mailer;
    protected $templating;
    private $from = "reservations@flyaround.com";


    public function __construct(\Swift_Mailer $mailer, \Twig_Environment $templating)
    {
        $this->mailer = $mailer;
        $this->templating = $templating;
    }

    public function sendMail($user,$pilot,$type)
    {
        $mail = \Swift_Message::newInstance();


        if ($type==0){
            $mail
                ->setFrom($this->from)
                ->setTo($user)
                ->setSubject('Notification de reservation')
                ->setBody($this->templating->render('Mail/notification.html.twig'),'text/html');


            $this->mailer->send($mail);

            $mail
                ->setFrom($this->from)
                ->setTo($pilot)
                ->setSubject('Notification de reservation')
                ->setBody($this->templating->render('Mail/notificationPilot.html.twig'),'text/html');


            $this->mailer->send($mail);
        }else {
            $mail
                ->setFrom($this->from)
                ->setTo($user)
                ->setSubject('Confirmation de reservation')
                ->setBody($this->templating->render('Mail/confirmation.html.twig'),'text/html');


            $this->mailer->send($mail);

            $mail
                ->setFrom($this->from)
                ->setTo($pilot)
                ->setSubject('Confirmation de reservation')
                ->setBody($this->templating->render('Mail/confirmationPilot.html.twig'),'text/html');


            $this->mailer->send($mail);
        }


    }

}