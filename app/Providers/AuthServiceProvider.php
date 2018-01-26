<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Blade;
use App\Permission;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // cache permissions and roles
        Cache::remember(config('permissions.cachekey'), config('permissions.expire_timeout'), function () {
            return Permission::with('roles')->get();
        });

        // define function to check permissions
        Gate::before(function (Authenticatable $user, string $ability) {
            try {
                if (method_exists($user, 'hasPermission')) {
                    return $user->hasPermission($ability) ?: null;
                }
            } catch (\Exception $e) {
                // TODO: add exception handling
            }
        });

        // add additional blade directives
        Blade::directive('role', function ($role) {
             return "<?php if(auth()->user()->hasRole({$role})): ?>";
        });

        Blade::directive('endrole', function () {
            return '<?php endif; ?>';
        });

    }
}
