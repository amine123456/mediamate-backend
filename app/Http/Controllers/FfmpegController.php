<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use FFMpeg\FFMpeg;
use FFMpeg\Format\Audio\Flac;
use FFMpeg\Format\Audio\Mp3;

class FfmpegController extends Controller
{
    public function convert(Request $request)
    {
        $request->validate([
            'input_file' => 'required|string',
            'output_format' => 'required|string|in:mp3,flac',
        ]);

        $inputFile = $request->input('input_file');
        $outputFormat = $request->input('output_format');
        $outputFile = 'output.' . $outputFormat;

        // Initialize FFmpeg
        $ffmpeg = FFMpeg::create();

        // Open the input file
        $audio = $ffmpeg->open($inputFile);

        // Set the output format
        if ($outputFormat === 'mp3') {
            $format = new Mp3();
        } elseif ($outputFormat === 'flac') {
            $format = new Flac();
        }

        // Save the output file
        $audio->save($format, $outputFile);

        return response()->json([
            'message' => 'Conversion successful',
            'output_file' => $outputFile,
        ]);
    }
}