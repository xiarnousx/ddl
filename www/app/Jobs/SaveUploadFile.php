<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Symfony\Component\HttpFoundation\File\File;
use App\Models\UserUpload;
use Illuminate\Support\Facades\Auth;

class SaveUploadFile implements ShouldQueue
{
    use Queueable, Dispatchable, InteractsWithQueue, SerializesModels;

    protected $fileName;

    protected $upload;

    /**
     * Create a new job instance.
     */
    public function __construct(File $upload)
    {
        $this->upload = $upload;
    }

    /**
     * Execute the job.
     */
    public function handle(): string
    {
        $path = $this->upload->move('uploads');
        $upload = UserUpload::create([
            'user_id' => Auth::user()->id,
            'filename' => $path,
        ]);

        if (!is_file($path)) {
            throw new \Exception('Problem saving file');
        }

        return $path;
    }
}
