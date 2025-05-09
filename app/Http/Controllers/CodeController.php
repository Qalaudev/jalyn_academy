<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CodeController extends Controller
{
    public function executePHP(Request $request)
    {
        $code = $request->input('code');
        if (!str_contains($code, '<?php')) {
            $code = "<?php " . $code;
        }
        $tempFile = storage_path('app/temp_php.php');
        file_put_contents($tempFile, $code);
        ob_start();
        include $tempFile;
        $output = ob_get_clean();
        unlink($tempFile);
        return $output;
    }

    public function executePython(Request $request)
    {
        $code = $request->input('code');
        $tempFile = storage_path('app/temp_python.py');
        if (file_put_contents($tempFile, $code) === false) {
            return response("Error: Unable to write to file", 500);
        }
        $output = shell_exec("python3 " . escapeshellarg($tempFile) . " 2>&1");
        unlink($tempFile);
        return response($output);
    }
}
