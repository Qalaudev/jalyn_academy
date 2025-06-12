<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Certificate;

class CertificateController extends Controller
{
    public function index()
    {
        $certificates = Certificate::where('user_id', auth()->id())
            ->with(['course'])
            ->get();

        return view('certificates.index', compact('certificates'));
    }

    public function show(Certificate $certificate)
    {
        if ($certificate->user_id !== auth()->id()) {
            abort(403);
        }

        return view('certificates.show', compact('certificate'));
    }

    public function download(Certificate $certificate)
    {
        if ($certificate->user_id !== auth()->id()) {
            abort(403);
        }

        $data = [
            'name' => $certificate->user->name,
            'course_title' => $certificate->course->title,
            'issue_date' => $certificate->issue_date->format('d.m.Y'),
            'certificate_number' => $certificate->certificate_number,
        ];

        $pdf = Pdf::loadView('certificates.pdf', $data);

        return $pdf->download("certificate-{$certificate->certificate_number}.pdf");
    }

    public function verify($certificateNumber)
    {
        $certificate = Certificate::where('certificate_number', $certificateNumber)
            ->with(['user', 'course'])
            ->firstOrFail();

        return view('certificates.verify', compact('certificate'));
    }
}
