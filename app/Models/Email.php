<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Email extends Model
{
    use HasFactory;
    protected $fillable = ['request', 'to'];

    public static function createFromRequest(Request $request)
    {
        preg_match('/<(.*?)>/', $request->input('To'), $to);
        $sender = $to[1];

        $email = Email::create([
            'request' => json_encode($request->all()),
            'to' => $sender
        ]);

        $rule = Rule::whereEmail($email->to)->first();

        if ($rule) {
            $rule->setConfig();

            $attachments = intVal($request->input('attachment-count'));

            for ($i=0; $i<$attachments; $i++) {
                $file = $request->file('attachment-' . $i+1);
                if ($file->getMimeType() === $rule->mimeType) {
                    $email->attachments()->create([
                        'path' => $file->store($rule->path, 's3')
                    ]);
                }
            }
        }

        return $email;
    }

    public function attachments(): HasMany
    {
        return $this->hasMany(Attachment::class);
    }
}
