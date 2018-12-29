<?php

namespace App\Scopes;

trait CallTenant {

    /**
	 * Boot the scope.
	 *
	 * @return void
	 */
	public static function bootCallTenant()
	{
		static::addGlobalScope(new TenantScope);
	}

	protected static function boot()
    {

		parent::boot();
		static::creating(function ($model) {
			$model->tenant_id = config('tenant.id');

		});
    }


}
