<?php

namespace App\Traits;

trait DebugHelper
{
    const SESSION_KEY = 'delayed_events';

    public function debug(mixed $data)
    {
        if (is_object($data)) {
            $data = $data->toArray();
        }
        $message = is_array($data) ? json_encode(
            $data,
            JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE
        ) : (string) $data;
        $this->log($message);
    }

    public function log(string $message)
    {
        $events = session(self::SESSION_KEY, []);
        $events[] = [
            'name' => 'log',
            'data' => $message,
        ];
        session([self::SESSION_KEY => $events]);
    }

    public function logBacktrace()
    {
        $callers = debug_backtrace();
        array_shift($callers);
        $stack = [];
        foreach ($callers as $i => $caller) {
            if (!isset($caller['file'])) {
                continue;
            }
            if (strpos($caller['file'], 'vendor') !== false) {
                continue;
            }
            $fileName = $caller['file'];
            $fileName = str_replace(base_path(), '', $fileName);
            $stack[] = $fileName . ' (' . $caller['line'] . ')';
        }
        $this->log(json_encode($stack, JSON_PRETTY_PRINT));
    }
}
