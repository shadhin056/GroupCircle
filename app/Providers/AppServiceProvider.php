<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use View;
use Auth;
use DB;
use App\StatasPost;
use App\CategoryList;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Schema::defaultStringLength(191);
        View::share('shadhin', 'shadhin');


        View::composer('*', function ($view) {
            /*$categoryObj=CategoryList::where('user_id',Auth::user()->id)->get();*/

            try {
                $notificationObj = DB::table('notification_models')
                    ->select('notification_models.*')
                    ->orderBy('id', 'desc')
                    ->get();

                $id = Auth::user()->id;
                $categoryObj = DB::table('category_lists')

                    /*->select('category_lists.*')*/
                    /*->where('id',$id)
                        ->first()*/

                    /*->orderBy('id', 'desc')*/
                    ->distinct()
                    ->where('user_id', $id)
                    ->get(['Category_name']);
                $view->with('CategoryListById', $categoryObj);
                $view->with('notificationObj', $notificationObj);
            } catch (\Exception $e) {

                return redirect('/home');
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
        //
    }
}
