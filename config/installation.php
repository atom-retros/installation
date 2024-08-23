<?php

return [
    'settings' => [
        1 => [
            'theme' => [
                'default' => 'atom',
                'comment' => 'Specifies the active CMS theme',
            ],
            'hotel_name' => [
                'default' => env('APP_NAME', 'Atom'),
                'comment' => 'Specifies the name of the hotel',
            ],
            'cms_color_mode' => [
                'default' => 'light',
                'comment' => 'Determines the color mode of the CMS (light = normal, dark = dark mode)',
            ],
            'disable_registration' => [
                'default' => 0,
                'comment' => 'Determines whether the registration is disabled or not',
            ],
            'hotel_home_room' => [
                'default' => 0,
                'comment' => 'The homeroom every new users will be assigned to, leave as 0 if you do not wish to assign any home room',
            ],
        ],
        2 => [
            'start_motto' => [
                'default' => 'This is my motto',
                'comment' => 'Specifies the start motto the user gets assigned upon registration',
            ],
            'start_credits' => [
                'default' => 5000,
                'comment' => 'Specifies the amount of credits a user receives upon registration',
            ],
            'start_duckets' => [
                'default' => 5000,
                'comment' => 'Specifies the amount of duckets a user receives upon registration',
            ],
            'start_diamonds' => [
                'default' => 100,
                'comment' => 'Specifies the amount of diamonds a user receives upon registration',
            ],
            'start_points' => [
                'default' => 0,
                'comment' => 'Specifies the amount of points a user receives upon registration',
            ],
            'start_look' => [
                'default' => 'fa-201407-1324.hr-828-1035.ch-3001-1261-1408.sh-3068-92-1408.cp-9032-1308.lg-270-1281.hd-209-3',
                'comment' => 'Sets the starting outfit for any new user registering',
            ],
            'give_hc_on_register' => [
                'default' => 0,
                'comment' => 'Determines whether the registered user will receive HC upon registration',
            ],
            'hc_on_register_duration' => [
                'default' => 315569260,
                'comment' => 'Specifies the amount of time a user receives their HC subscription for (The default amount is 10 years)',
            ],
        ],
        3 => [
            'referrals_needed' => [
                'default' => 5,
                'comment' => 'Specifies the amount of referrals needed before being able to claim the referral reward',
            ],
            'referral_reward_amount' => [
                'default' => 30,
                'comment' => 'Specifies the reward amount when a user claims a reward',
            ],
            'referral_reward_currency_type' => [
                'default' => 'diamonds',
                'comment' => 'Specify what type of currency that are given upon referral reward claim (credits, duckets, diamonds, points)',
            ],
            'min_staff_rank' => [
                'default' => 4,
                'comment' => 'The minimum rank before being considered a staff member',
            ],
            'min_rank_to_see_hidden_staff' => [
                'default' => 6,
                'comment' => 'The minimum rank to enable seeing hidden staff ranks & members',
            ],
            'min_housekeeping_rank' => [
                'default' => 6,
                'comment' => 'The minimum rank required to see the housekeeping button',
            ],
            'max_accounts_per_ip' => [
                'default' => 2,
                'comment' => 'The maximum allowed accounts registered per IP address',
            ],
        ],
        4 => [],
    ],
];
