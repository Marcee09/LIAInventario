<?php

namespace App\Utils;

class FakeUtils
{
    public static function email(string $first, string $last): string
    {
        $normalized_first = TextUtils::normalize($first);
        $normalized_last = TextUtils::normalize($last);
        $free_email_domain = fake()->freeEmailDomain();
        $first_letter = substr($normalized_first, 0, 1);
        $fake_email = "$first_letter$normalized_last@$free_email_domain";
        return $fake_email;
    }
}
