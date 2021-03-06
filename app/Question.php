<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Answer;

class Question extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'body',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function answers() {
        return $this->hasMany(Answer::class);
    }

    public function favorites() {
        return $this->belongsToMany(User::class, 'favorites');
    }

    public function setTitleAttribute($value) {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }

    public function getUrlAttribute() {
        return route('questions.show', $this->slug);
    }

    public function getCreatedDateAttribute() {
        return $this->created_at->diffForHumans();
    }

    public function getBodyHtmlAttribute() {
        return \Parsedown::instance()->text($this->body);
    }

    public function getStatusAttribute() {
        if ($this->best_answer_id) {
            return 'answered-accepted';
        } else if ($this->answers_count > 0) {
            return 'answered';
        } else {
            return 'unanswered';
        }
    }

    public function acceptBestAnswer(Answer $answer) {
        $this->best_answer_id = $answer->id;
        $this->save();
    }
}
