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
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property int $status 1 - Active, 2 - Blocked
 * @property int $role 1 - Admin, 2 - Manager
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App\src\entities{
/**
 * App\src\entities\Encashment
 *
 * @property int $id
 * @property int $machine_id
 * @property string $machine_unique_number
 * @property int|null $b1
 * @property int|null $b2
 * @property int|null $b3
 * @property int|null $b4
 * @property int|null $b5
 * @property int|null $b6
 * @property int|null $c1
 * @property int|null $c2
 * @property int|null $c3
 * @property int|null $c4
 * @property int|null $c5
 * @property int|null $c6
 * @property int $total
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\src\entities\Machine $machine
 * @method static \Illuminate\Database\Eloquent\Builder|Encashment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Encashment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Encashment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Encashment whereB1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Encashment whereB2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Encashment whereB3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Encashment whereB4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Encashment whereB5($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Encashment whereB6($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Encashment whereC1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Encashment whereC2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Encashment whereC3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Encashment whereC4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Encashment whereC5($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Encashment whereC6($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Encashment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Encashment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Encashment whereMachineId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Encashment whereMachineUniqueNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Encashment whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Encashment whereUpdatedAt($value)
 */
	class Encashment extends \Eloquent {}
}

namespace App\src\entities{
/**
 * App\src\entities\Machine
 *
 * @property int $id
 * @property string $unique_number
 * @property int $user_id
 * @property string|null $price
 * @property int $status 1 - Active, 2 - Blocked
 * @property string|null $address
 * @property string|null $address_full
 * @property int $water_up
 * @property int $water_down
 * @property int $max_banknotes
 * @property int $max_coins
 * @property int $timing_connect
 * @property int $calibration
 * @property string|null $lender_contacts
 * @property string|null $lender_address
 * @property string|null $lender_price
 * @property string|null $lender_description
 * @property float|null $water_amount
 * @property string|null $contact_time
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\src\entities\Encashment[] $encashment
 * @property-read int|null $encashment_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\src\entities\Order[] $orders
 * @property-read int|null $orders_count
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Machine newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Machine newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Machine query()
 * @method static \Illuminate\Database\Eloquent\Builder|Machine whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Machine whereCalibration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Machine whereContactTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Machine whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Machine whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Machine whereLenderAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Machine whereLenderContacts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Machine whereLenderDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Machine whereLenderPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Machine whereMaxBanknotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Machine whereMaxCoins($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Machine wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Machine whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Machine whereTimingConnect($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Machine whereUniqueNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Machine whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Machine whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Machine whereWaterAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Machine whereWaterDown($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Machine whereWaterUp($value)
 */
	class Machine extends \Eloquent {}
}

namespace App\src\entities{
/**
 * App\src\entities\Order
 *
 * @property int $id
 * @property int $machine_id
 * @property string $machine_unique_number
 * @property float|null $put_amount
 * @property float|null $sold_amount
 * @property float|null $water_paid
 * @property float|null $water_given
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\src\entities\Machine $machine
 * @method static \Illuminate\Database\Eloquent\Builder|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereMachineId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereMachineUniqueNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePutAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereSoldAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereWaterGiven($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereWaterPaid($value)
 */
	class Order extends \Eloquent {}
}

