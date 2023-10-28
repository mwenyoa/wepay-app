<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class LogViewerController extends Controller
{
    public function index()
    {
        // Get a list of log files in the storage/logs directory
        $logFiles = File::files(storage_path('logs'));

        // Reverse the array to display the most recent log file first
        $logFiles = array_reverse($logFiles);

        // Read the contents of the first log file (most recent)
        $logContent = File::get($logFiles[0]);

        return view('log-viewer', ['logContent' => $logContent]);
    }
}
