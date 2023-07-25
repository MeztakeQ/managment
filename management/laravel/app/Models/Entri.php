<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entri extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function sizeForHuman(): string
    {
        if (!$this->size) return 'Размер не определен';
        $units = ['б', 'Кб', 'Мб', 'Гб', 'Тб', 'PiB'];

        for ($i = 0; $this->size > 1024; $i++) {
            $this->size /= 1024;
        }

        return round($this->size, 2) . ' ' . $units[$i];
    }

    public function getName(): string
    {
        if ($this->original_name) {
            return $this->original_name;
        }
        return $this->home_file;
    }
}
