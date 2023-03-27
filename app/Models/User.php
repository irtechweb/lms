<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\UserSubscribedPlan;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'name',
        'city',
        'phone_number',
        'email',
        'password',
        'is_active',
        'status',
        'email_verified_at',
        'is_sign_up_free',
        'created_by',
        'password_updated_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */

     protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Auto hash password when create/update
     * @param $value
     * @return void
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = \Hash::needsRehash($value) ? \Hash::make($value) : $value;
    }
    public function getUserSubscription($user_id)
    {
        
        return UserSubscribedPlan::where('user_id',$user_id)->whereRaw('subscription_end_date >= now()')->orderby('subscription_end_date','desc')->first();
    }

    public function getStatusLabelAttribute()
    {
        return $this->status == 1 ? 'Active' : 'Inactive';
    }

    public function availableBookingCounts()
    {
        return $this->hasOne(AvailableBookingCount::class);
    }

    public function coachPayments()
    {
        return $this->hasMany(CoachPayment::class);
    }

    public function eventBookings()
    {
        return $this->hasMany(EventBooking::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function userSubscribedPlans()
    {
        return $this->hasOne(UserSubscribedPlan::class);
    }

    public static function getstudent($id) {
        $results = User::where('id', $id)
                ->first();
        return !empty($results) ? $results->toArray() : [];
    }

    public static function updateData($data, $count = null) {
        $user = User::where('id', $data['id'])->first();
        $update = $user->update([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'phone_number' => $data['phone_number'],
            'city' => $data['city'],
            'status' => $data['status']
        ]);
        if ($update && $count) {
            AvailableBookingCount::updateOrCreate([
                'user_id' => $data['id'],
            ],[
                'booking_count' => $data['booking_count'],
            ]);
        }
        return ($update) ? true : false;
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_user', 'user_id', 'course_id');
    }

    public function logs()
    {
        return $this->hasMany(logroutes::class);
    }
}
