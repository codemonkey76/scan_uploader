<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class Rule extends Model
{
    use HasFactory;

    public function setConfig()
    {
        Config::set('filesystems.disks.s3.bucket', $this->bucket);
        Config::set('filesystems.disks.s3.key', $this->key);
        Config::set('filesystems.disks.s3.secret', $this->secret);
        Config::set('filesystems.disks.s3.region', $this->region);
        Config::set('filesystems.disks.s3.path', $this->path);
    }
}
