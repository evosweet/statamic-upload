<?php

namespace Statamic\Addons\PdfUpload;

use Statamic\API\Nav;
use Statamic\Extend\Listener;

class PdfUploadListener extends Listener
{
    /**
     * The events to be listened for, and the methods to call.
     *
     * @var array
     */
    public $events = [
        'cp.nav.created' => 'addNavItems'
    ];
    public function addNavItems($nav){
        $pdfUpload = Nav::item('PdfUpload')->icon('folder')->url('/cp/addons/pdfupload')->name('pdf-upload');
        $nav->addTo('content', $pdfUpload);
        $pdfUpload->add(NAV::item('Edit')->url('/cp/addons/pdfupload/getAll')->name('pdf-edit'));

    }
}