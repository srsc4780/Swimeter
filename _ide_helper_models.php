<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\Consumption
 *
 * @property int $id
 * @property int $meter_id
 * @property float $usage
 * @property float $cost
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Consumption forTheLastThirtyDays()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Consumption newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Consumption newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Consumption query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Consumption whereCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Consumption whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Consumption whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Consumption whereMeterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Consumption whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Consumption whereUsage($value)
 */
	class Consumption extends \Eloquent {}
}

namespace App{
/**
 * App\Invoice
 *
 * @property int $id
 * @property int $user_id
 * @property string $status
 * @property float|null $amount
 * @property string $txn_id
 * @property float|null $charges
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Invoice newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Invoice newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Invoice query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Invoice whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Invoice whereCharges($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Invoice whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Invoice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Invoice whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Invoice whereTxnId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Invoice whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Invoice whereUserId($value)
 */
	class Invoice extends \Eloquent {}
}

namespace App{
/**
 * App\Meter
 *
 * @property int $id
 * @property int $user_id
 * @property string $status
 * @property string $uuid
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $grace_period_started_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Consumption[] $consumptions
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Meter newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Meter newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Meter query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Meter whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Meter whereGracePeriodStartedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Meter whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Meter whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Meter whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Meter whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Meter whereUuid($value)
 */
	class Meter extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property int $is_admin
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\UserAddress $address
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Consumption[] $consumptions
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Invoice[] $invoices
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Meter[] $meters
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \App\UserStatus $status
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereIsAdmin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App{
/**
 * App\UserAddress
 *
 * @property int $id
 * @property int $user_id
 * @property string $address_line_1
 * @property string|null $address_line_2
 * @property string $postal_code
 * @property string $locality
 * @property string $administrative_area
 * @property string $country
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserAddress newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserAddress newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserAddress query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserAddress whereAddressLine1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserAddress whereAddressLine2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserAddress whereAdministrativeArea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserAddress whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserAddress whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserAddress whereLocality($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserAddress wherePostalCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserAddress whereUserId($value)
 */
	class UserAddress extends \Eloquent {}
}

namespace App{
/**
 * App\UserStatus
 *
 * @property int $id
 * @property int $user_id
 * @property string $type
 * @property float $balance
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserStatus whereBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserStatus whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserStatus whereUserId($value)
 */
	class UserStatus extends \Eloquent {}
}

