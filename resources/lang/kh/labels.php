<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Labels Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used in labels throughout the system.
    | Regardless where it is placed, a label can be listed here so it is easily
    | found in a intuitive way.
    |
    */

    'general' => [
        'all'     => 'All',
        'yes'     => 'Yes',
        'no'      => 'No',
        'custom'  => 'Custom',
        'actions' => 'Actions',
        'active'  => 'Active',
        'buttons' => [
            'save'   => 'Save',
            'update' => 'Update',
        ],
        'hide'              => 'Hide',
        'inactive'          => 'Inactive',
        'none'              => 'None',
        'show'              => 'Show',
        'toggle_navigation' => 'Toggle Navigation',
    ],

    'backend' => [
        'access' => [
            'roles' => [
                'create'     => 'Create Role',
                'edit'       => 'Edit Role',
                'management' => 'Role Management',

                'table' => [
                    'number_of_users' => 'Number of Users',
                    'permissions'     => 'Permissions',
                    'role'            => 'Role',
                    'sort'            => 'Sort',
                    'total'           => 'role total|roles total',
                ],
            ],

            'users' => [
                'active'              => 'Active Users',
                'all_permissions'     => 'All Permissions',
                'change_password'     => 'Change Password',
                'change_password_for' => 'Change Password for :user',
                'create'              => 'Create User',
                'deactivated'         => 'Deactivated Users',
                'deleted'             => 'Deleted Users',
                'edit'                => 'Edit User',
                'management'          => 'User Management',
                'no_permissions'      => 'No Permissions',
                'no_roles'            => 'No Roles to set.',
                'permissions'         => 'Permissions',

                'table' => [
                    'confirmed'      => 'Confirmed',
                    'created'        => 'Created',
                    'email'          => 'E-mail',
                    'id'             => 'ID',
                    'last_updated'   => 'Last Updated',
                    'name'           => 'Name',
                    'no_deactivated' => 'No Deactivated Users',
                    'no_deleted'     => 'No Deleted Users',
                    'roles'          => 'Roles',
                    'total'          => 'user total|users total',
                ],

                'tabs' => [
                    'titles' => [
                        'overview' => 'Overview',
                        'history'  => 'History',
                    ],

                    'content' => [
                        'overview' => [
                            'avatar'       => 'រូបតំណាង',
                            'confirmed'    => 'ព្រមទទួល',
                            'created_at'   => 'កាលបរិច្ឆេតការបង្កើត',
                            'deleted_at'   => 'កាលបរិច្ឆេតការលុប',
                            'email'        => 'អុីម៉ែល',
                            'last_updated' => 'កំណែចុងក្រោយ',
                            'name'         => 'ឈ្មោះ',
                            'status'       => 'Status',
                        ],
                    ],
                ],

                'view' => 'View User',
            ],
        ],
    ],

    'frontend' => [

        'auth' => [
            'login_box_title'    => 'ចូលប្រព័ន្ធ',
            'login_button'       => 'ចូលប្រព័ន្ធ',
            'login_with'         => 'ចូលប្រព័ន្ធ ជាមួយ :បណ្តាញទំនាក់ទំនងសង្គម',
            'register_box_title' => 'ចុះឈ្មោះ',
            'register_button'    => 'ចុះឈ្មោះ',
            'remember_me'        => 'ចងចាំខ្ញុំ',
        ],

        'passwords' => [
            'forgot_password'                 => 'ភ្លេចលេខសំងាត់របស់អ្នក?',
            'reset_password_box_title'        => 'ដាក់លេខសំងាត់ថ្មី',
            'reset_password_button'           => 'ដាក់លេខសំងាត់ថ្ម',
            'send_password_reset_link_button' => 'តំណរភ្ជាប់សំរាប់ប្តូរលេខសំងាត់ថ្មី',
        ],

        'macros' => [
            'country' => [
                'alpha'   => 'Country Alpha Codes',
                'alpha2'  => 'Country Alpha 2 Codes',
                'alpha3'  => 'Country Alpha 3 Codes',
                'numeric' => 'Country Numeric Codes',
            ],

            'macro_examples' => 'Macro Examples',

            'state' => [
                'mexico' => 'Mexico State List',
                'us'     => [
                    'us'       => 'US States',
                    'outlying' => 'US Outlying Territories',
                    'armed'    => 'US Armed Forces',
                ],
            ],

            'territories' => [
                'canada' => 'Canada Province & Territories List',
            ],

            'timezone' => 'Timezone',
        ],

        'user' => [
            'passwords' => [
                'change' => 'ផ្លាស់ប្តូរលេខសំងាត់',
            ],

            'profile' => [
                'avatar'             => 'រូបតំណាង',
                'created_at'         => 'កាលបរិច្ឆេតការបង្កើត',
                'edit_information'   => 'កែរប្រែព​ត៌​មាន',
                'email'              => 'អុីម៉ែល',
                'last_updated'       => 'កំណែចុងក្រោយ',
                'name'               => 'ឈ្មោះ',
                'update_information' => 'កែរប្រែព​ត៌​មាន',
            ],
        ],

        'resume' => [
            'career_profile'         => 'សេចក្តីលំអិត',
            'experiences'           => 'បទពិសោធន៍',
            'projects'              => 'ការងារ',
            'skills'                => 'ជំនាញ',
            'languages'             => 'ភាសា',
            'interests'             => 'ចំណាប់អារម្មណ៍',
            'contact'               => 'ទំនាក់ទំនង',
            'education'             => 'ការអប់រំ',
            'languages'             => 'ភាសា'
        ],

        'button' => [
            'add'   => 'បន្ថែម'
        ],

    ],
];