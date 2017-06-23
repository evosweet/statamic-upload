<?php

namespace Statamic\Addons\PdfUpload;

use Statamic\Extend\Tags;

class PdfUploadTags extends Tags
{
    /**
     * The {{ pdf_upload }} tag
     *
     * @return string|array
     */
    public function index()
    {
        //
    }

    /**
     * The {{ pdf_upload:example }} tag
     *
     * @return string|array
     */
    public function example()
    {
        return [

            'todo_title' => 'test',
            'todo_added' => 'test'
        ];
    }
}
