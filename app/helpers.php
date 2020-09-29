<?php

function gravatar_url($email)
{
    $email= md5($email);

    return "https://i.pravatar.cc/200?u={{$email}}" . http_build_query([

            'd' => 'https://s3.amazonaws.com/laracasts/images/default-square-avatar.jpg'

        ]);
}
