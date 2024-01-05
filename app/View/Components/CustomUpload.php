<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CustomUpload extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $label,
        public string $fileName,
        public string $table,
        public int $memberID,
        public string $filePath
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.custom-upload');
    }
}
