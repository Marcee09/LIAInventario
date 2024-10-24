<?php

namespace App\Traits;

trait ToastTrigger
{
    const DEFAULT_TOAST_DURATION = 3000;

    private function _toast(
        string $message,
        int $duration = self::DEFAULT_TOAST_DURATION,
        string $name = 'toast',
        bool $delayed = true
    ) {
        $session_storage = $delayed ? 'delayed_events' : 'events';
        $name = strtolower(preg_replace('/(?<!^)[A-Z]/', '-$0', $name));
        $duration = $duration < 1000 ? 3000 : $duration;
        $events = session($session_storage, []);
        // if toast_name is already in the session, ignore it
        foreach ($events as $event) {
            if ($event['name'] === 'toast' && $event['data']['toast_name'] === $name) {
                //return;
            }
        }
        $events[] = [
            'name' => 'toast',
            'data' => [
                'toast_name' => $name,
                'duration' => $duration,
                'message' => $message,
            ],
        ];
        session([$session_storage => $events]);
    }

    public function toast(
        string $message,
        int $duration = self::DEFAULT_TOAST_DURATION,
        string $name = 'toast'
    ) {
        $this->_toast($message, $duration, $name);
    }

    public function warningToast(
        string $message,
        int $duration = self::DEFAULT_TOAST_DURATION
    ) {
        $this->_toast($message, $duration, "warning");
    }

    public function errorToast(
        string $message,
        int $duration = self::DEFAULT_TOAST_DURATION
    ) {
        $this->_toast($message, $duration, "error");
    }

    public function successToast(
        string $message,
        int $duration = self::DEFAULT_TOAST_DURATION
    ) {
        $this->_toast($message, $duration, "success");
    }

    public function infoToast(
        string $message,
        int $duration = self::DEFAULT_TOAST_DURATION
    ) {
        $this->_toast($message, $duration, "info");
    }

    public function delayedToast(
        string $message,
        int $duration = self::DEFAULT_TOAST_DURATION,
        string $name = 'toast'
    ) {
        $this->_toast($message, $duration, $name, true);
    }

    public function alert(string $message) {
        $this->_toast($message, 100000, "alert");
    }
}
