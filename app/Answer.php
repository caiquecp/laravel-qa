<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'body', 'user_id'
    ];

    public function question() {
        return $this->belongsTo(Question::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function getBodyHtmlAttribute() {
        return \Parsedown::instance()->text($this->body);
    }

    public function getCreatedDateAttribute() {
        return $this->created_at->diffForHumans();
    }

    public function getStatusAttribute() {
        return $this->isBest() ? 'vote-accepted' : '';
    }

    public function getIsBestAttribute() {
        return $this->isBest();
    }

    public function isBest() {
        return $this->id == $this->question->best_answer_id;
    }

    public static function boot() {
        parent::boot();

        static::created(function ($answer) {
            $answer->question->increment('answers_count');
        });

        static::deleted(function ($answer) {
            $question = $answer->question;
            
            $question->decrement('answers_count');
            
            // if the answer is the best answer we need to update question
            if ($question->best_answer_id == $answer->id) {
                $question->best_answer_id = NULL;
                $question->save();
            }
        });
    }
}
