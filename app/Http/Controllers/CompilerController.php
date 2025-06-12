<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CompilerController extends Controller
{
    public function runCode(Request $request)
    {
        $request->validate([
            'language' => 'required|string',
            'code' => 'required|string',
        ]);

        $language = strtolower($request->language);
        $code = $request->code;
        $output = '';
        $error = null;
        $status = 'error';

        $tempDir = storage_path('app/temp');
        if (!File::isDirectory($tempDir)) {
            File::makeDirectory($tempDir, 0755, true, true);
        }

        try {
            switch ($language) {
                case 'python':
                    $filename = $tempDir . '/' . Str::random(10) . '.py';
                    File::put($filename, $code);
                    $command = "python3 " . escapeshellarg($filename) . " 2>&1";
                    $output = shell_exec($command);
                    File::delete($filename);
                    $status = 'success';
                    break;

                case 'cpp':
                    $base = $tempDir . '/' . Str::random(10);
                    $cppFile = $base . '.cpp';
                    $exeFile = $base . '.out';

                    File::put($cppFile, $code);
                    $compile = shell_exec("g++ " . escapeshellarg($cppFile) . " -o " . escapeshellarg($exeFile) . " 2>&1");
                    if (file_exists($exeFile)) {
                        $output = shell_exec($exeFile . " 2>&1");
                        $status = 'success';
                        File::delete($exeFile);
                    } else {
                        $output = $compile;
                    }
                    File::delete($cppFile);
                    break;

                case 'java':
                    $className = 'Main' . Str::random(5);
                    $javaFile = $tempDir . '/' . $className . '.java';
                    File::put($javaFile, str_replace('Main', $className, $code));
                    $compile = shell_exec("javac " . escapeshellarg($javaFile) . " 2>&1");

                    if (file_exists($tempDir . '/' . $className . '.class')) {
                        $output = shell_exec("cd " . $tempDir . " && java " . escapeshellarg($className) . " 2>&1");
                        $status = 'success';
                        File::delete($tempDir . '/' . $className . '.class');
                    } else {
                        $output = $compile;
                    }
                    File::delete($javaFile);
                    break;

                case 'javascript':
                    $filename = $tempDir . '/' . Str::random(10) . '.js';
                    File::put($filename, $code);
                    $output = shell_exec("node " . escapeshellarg($filename) . " 2>&1");
                    $status = 'success';
                    File::delete($filename);
                    break;

                case 'php':
                    $filename = $tempDir . '/' . Str::random(10) . '.php';
                    File::put($filename, $code);
                    $output = shell_exec("php " . escapeshellarg($filename) . " 2>&1");
                    $status = 'success';
                    File::delete($filename);
                    break;


                default:
                    $output = "Язык '{$language}' не поддерживается.";
            }

            if (trim($output) === '') {
                $output = 'Код выполнен, но не дал вывода.';
            }

        } catch (\Exception $e) {
            $error = $e->getMessage();
            $status = 'error';
        }

        return response()->json([
            'output' => $output,
            'error' => $error,
            'status' => $status,
        ]);
    }
}
