<?php

namespace App\Http\Controllers;

use App\Models\DiscountCode;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UploadController extends Controller
{
    public function upload(Request $request)
    {
        // Get the file from the request
        $file = $request->file('file');

        // Get the contents of the file
        $contents = file_get_contents($file);

        // Split the contents into an array of lines
        $lines = explode("\n", $contents);

        // Loop through each line and create a new discount code
        foreach ($lines as $line) {
            $line = trim($line);
            if (!empty($line)) {
                $discountCode = new DiscountCode;
                $discountCode->code = $line;
                $discountCode->save();
            }
        }

        // Redirect back to the upload form
        return redirect()->back();
    }
}
