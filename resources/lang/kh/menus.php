<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Menus Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used in menu items throughout the system.
    | Regardless where it is placed, a menu item can be listed here so it is easily
    | found in a intuitive way.
    |
    */

    'backend' => [
        'access' => [
            'title' => 'ការគ្រប់គ្រងក្នុងការចូលប្រព័ន្ធ',

            'roles' => [
                'all'        => 'មានសិទ្ធិគ្រប់យ៉ាង',
                'create'     => 'បង្កើតសិទ្ធិ',
                'edit'       => 'កែប្រែសិទ្ធិ',
                'management' => 'ការគ្រប់គ្រងសិទ្ធិ',
                'main'       => 'សិទ្ធិ',
            ],

            'users' => [
                'all'             => 'អ្នកប្រើប្រាស់ទាំងអស់',
                'change-password' => 'ផ្លាស់ប្តូរលេខសំងាត់',
                'create'          => 'បង្កើតគណនេយ្យ',
                'deactivated'     => 'ផ្អាកការប្រើប្រាស់​ គណនេយ្យ',
                'deleted'         => 'លុបគណនេយ្យ',
                'edit'            => 'កែប្រែគណនេយ្យ',
                'main'            => 'គណនេយ្យ',
                'view'            => 'បង្ហាញគណនេយ្យ',
            ],
        ],

        'log-viewer' => [
            'main'      => 'Log Viewer',
            'dashboard' => 'Dashboard',
            'logs'      => 'Logs',
        ],

        'sidebar' => [
            'dashboard' => 'ផ្ទាំងគ្រប់គ្រង',
            'general'   => 'ទូទៅ',
            'system'    => 'ប្រព័ន្ធ',
        ],
    ],

    'language-picker' => [
        'language' => 'ភាសា',
        /*
         * Add the new language to this array.
         * The key should have the same language code as the folder name.
         * The string should be: 'Language-name-in-your-own-language (Language-name-in-English)'.
         * Be sure to add the new language in alphabetical order.
         */
        'langs' => [
            'kh'    => 'ខ្មែរ',
            'ar'    => 'អារ៉ាប់',
            'da'    => 'ដាណឺម៉ាក',
            'de'    => 'អាលឺម៉ង់',
            'el'    => 'ក្រិច',
            'en'    => 'អង់គ្លេស',
            'es'    => 'អេស្ប៉ាញ',
            'fr'    => 'បារាំង',
            'id'    => 'ឥណ្ឌូនេស៊ី',
            'it'    => 'អ៊ីតាលី',
            'nl'    => 'ហូឡង់',
            'pt_BR' => 'ប្រេស៊ីល ព័រទុយហ្គាល់',
            'sv'    => 'ស្វ៊ិល',
            'th'    => 'ថៃ',
        ],
    ],
];
