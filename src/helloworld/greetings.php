<?php
namespace HelloWorld;

use PHP_Timer;
use Airbrake;
use Exception;

class Greetings {
  public static function sayHelloWorld() {

    $notifier = new Airbrake\Notifier(array(
      'projectId' => 280381,
      'projectKey' => '70b2263cc1347a0d69e4658995d7a3e4',
      'keysBlocklist' => ['/thingo/i', '/bingo/i'],
    ));

    Airbrake\Instance::set($notifier);

    $handler = new Airbrake\ErrorHandler($notifier);
    $handler->register();

    try {
      throw new Exception('hello from phpbrake CDCDC');
    } catch(Exception $e) {
      $notice = $notifier->buildNotice($e);
      $notice['context']['thingo'] = 'please filter me';
      $notice['context']['bingo'] = 'please filter this too';
      $notifier->sendNotice($notice);
    }

    $timer = new PHP_Timer();
    $timer->start();
    return "Hello World\n" . $timer->resourceUsage() . "\n";
  }
}
