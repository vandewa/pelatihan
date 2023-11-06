<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];



    /*Check the course is published*/
    public function scopePublished($query)
    {
        $today = date('Y-m-d');
        return $query->where(function ($query) use ($today) {
            $query->where('is_published', true)->whereRaw("DATE(berakhir_pendaftaran) >= $today");
        })->orWhere(function ($query) use ($today) {
            $query->where('level', 'Terbuka')->whereRaw("DATE(berakhir_pendaftaran) >= $today");
        });
    }


    /*Check the course is published*/
    public function scopeNotFree($query)
    {
        return $query->where('is_free', false);
    }

    // relationBetweenCategory
    public function relationBetweenCategory()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    // relationBetweenLanguage
    public function relationBetweenLanguage()
    {
        return $this->hasOne(Language::class, 'id', 'language');
    }

    public function relationBetweenInstructorUser()
    {

        return $this->belongsTo(User::class, 'user_id', 'id')->where('user_type', 'Admin');
    }

    // classes
    public function classes()
    {
        return $this->hasMany(Classes::class)
            ->where('is_published', true)
            ->with('contents');
    }

    public function classesAll()
    {
        return $this->hasMany(Classes::class)
            ->with('contentsAll');
    }

    //enroll
    public function enrollClasses()
    {
        return $this->hasMany(Classes::class)
            ->where('is_published', true)
            ->with('enrollContents');
    }

    // category
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    // enrollment
    public function enrollment()
    {
        return $this->belongsTo(Enrollment::class)->where('course_id', 'id');
    }

    // meeting
    public function meeting()
    {
        return $this->hasOne('App\Meeting', 'course_id', 'id');
    }

    // subscription
    public function subscription()
    {
        return $this->hasOne('App\SubscriptionCourse', 'course_id', 'id');
    }

    // logbook
    public function logbook()
    {
        return $this->hasMany(Logbook::class, 'course_id', 'id');
    }

    //END
}
