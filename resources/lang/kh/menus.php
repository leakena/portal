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
                'all'             => 'All Users',
                'change-password' => 'Change Password',
                'create'          => 'Create User',
                'deactivated'     => 'Deactivated Users',
                'deleted'         => 'Deleted Users',
                'edit'            => 'Edit User',
                'main'            => 'Users',
                'view'            => 'View User',
            ],
        ],

        'log-viewer' => [
            'main'      => 'Log Viewer',
            'dashboard' => 'Dashboard',
            'logs'      => 'Logs',
        ],

        'sidebar' => [
            'dashboard' => 'Dashboard',
            'general'   => 'General',
            'system'    => 'System',
        ],
    ],

    'language-picker' => [
        'language' => 'Language',
        /*
         * Add the new language to this array.
         * The key should have the same language code as the folder name.
         * The string should be: 'Language-name-in-your-own-language (Language-name-in-English)'.
         * Be sure to add the new language in alphabetical order.
         */
        'langs' => [
            'kh'    => 'ខ្មែរ',
            'ar'    => 'Arabic',
            'da'    => 'Danish',
            'de'    => 'អាលឺម៉ង់',
            'el'    => 'Greek',
            'en'    => 'អង់គ្លេស',
            'es'    => 'Spanish',
            'fr'    => 'បារំាង',
            'id'    => 'Indonesian',
            'it'    => 'អ៊ីុតាលី',
            'nl'    => 'Dutch',
            'pt_BR' => 'Brazilian Portuguese',
            'sv'    => 'ស្វ៊ិល',
            'th'    => 'ថៃ',
        ],
    ],
];
