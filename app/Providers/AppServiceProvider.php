<?php

namespace App\Providers;

use App\Models\Portal\Resume\Resume;
use App\Providers\TraitProvider\HelperTraitProvider;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Models\Portal\Resume\PersonalInfo;

class AppServiceProvider extends ServiceProvider
{

    use HelperTraitProvider;
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /*
         * Application locale defaults for various components
         *
         * These will be overridden by LocaleMiddleware if the session local is set
         */

        /*
         * setLocale for php. Enables ->formatLocalized() with localized values for dates
         */
        setlocale(LC_TIME, config('app.locale_php'));

        /*
         * setLocale to use Carbon source locales. Enables diffForHumans() localized
         */
        Carbon::setLocale(config('app.locale'));

        /*
         * Set the session variable for whether or not the app is using RTL support
         * For use in the blade directive in BladeServiceProvider
         */
        if (config('locale.languages')[config('app.locale')][2]) {
            session(['lang-rtl' => true]);
        } else {
            session()->forget('lang-rtl');
        }

        // Force SSL in production
        if ($this->app->environment() == 'production') {
            //URL::forceScheme('https');
        }

        // Set the default string length for Laravel5.4
        // https://laravel-news.com/laravel-5-4-key-too-long-error
        Schema::defaultStringLength(191);

        /*
         *
         */
        view()->composer('backend.resumes.includes.modal.preview', function ($view) {
            $resume = Resume::where('user_uid', auth()->user()->id)->first();
            if ($resume) {
                $name = $resume->user->name;
                $abr_name = "";
                $explode = explode(' ', $name);
                foreach ($explode as $str) {
                    $abr_name .= $str[0];
                }
            } else {
                $abr_name = '';
            }


            $view->with([

                'resume' => $resume,
                'abr_name' => $abr_name
//                    'languages' => $resume->language()->select('language_resume.proficiency', 'languages.name', 'languages.id as language_id')->get(),
            ]);
        });


        View::composer('*', function ($view) {/*--(*) allow to all view to access this currentUser--*/

            if (Auth::check()) {
                $authUser = auth()->user();
                $resume = Resume::where('user_uid', $authUser->id)->first();

                if (is_object($resume)) {
                    $personalInfo = PersonalInfo::where('resume_uid', $resume->id)->first();

                    if (!is_object($personalInfo)) {
                        $personalInfo = null;
                    }
                } else {
                    $resume = null;
                    $personalInfo = null;
                }

                $prefix = 'frontend.portal';
                $homeActiveRoutes = [
                    $prefix . '.index',
                    $prefix . '.profile',
                    $prefix . '.classmate',
                    $prefix . '.involve_project',
                    $prefix . '.history',
                    $prefix . '.setting',
                ];

                $resumeActiveRoute = [
                    $prefix . '.resume.experience',
                    $prefix . '.resume.education',
                    $prefix . '.resume.skill',
                    $prefix . '.resume.reference',
                    $prefix . '.resume.language',
                ];

                $blockActiveRoutes = [
                    $prefix . '.my_post',
                ];

                $homeActiveRoutes = array_merge($homeActiveRoutes, $resumeActiveRoute);

                $view->with([
                    'authUser' => Auth::user(),
                    'resume' => $resume,
                    'personal_info' => $personalInfo,
                    'homeActiveRoutes' => $homeActiveRoutes,
                    'blockActiveRoutes' => $blockActiveRoutes,
                    'resumeActiveRoute' => $resumeActiveRoute,
                    'tags' => $this->tags(),
                    'categories' => $this->categories()
                ]);
            }
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /*
         * Sets third party service providers that are only needed on local/testing environments
         */
        if ($this->app->environment() != 'production') {
            /**
             * Loader for registering facades.
             */
            $loader = \Illuminate\Foundation\AliasLoader::getInstance();

            /*
             * Load third party local providers
             */
            $this->app->register(\Barryvdh\Debugbar\ServiceProvider::class);

            /*
             * Load third party local aliases
             */
            $loader->alias('Debugbar', \Barryvdh\Debugbar\Facade::class);
        }
    }
}
