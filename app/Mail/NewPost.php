<?php

namespace App\Mail;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewPost extends Mailable
{
    use Queueable, SerializesModels;

    public $post;
    public $name;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, Post $post)
    {
        $this->post = $post;
        $this->name = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('news@michaelbacy.com', 'Misha Batsiashvili')
            ->subject('new post')
            ->view('mail.newpost');
    }
}
