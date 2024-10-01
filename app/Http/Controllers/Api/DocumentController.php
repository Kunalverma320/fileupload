<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Http\Request;
use Smalot\PdfParser\Parser as PdfParser;
use PhpOffice\PhpWord\IOFactory;

class DocumentController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'document' => 'required|mimes:pdf,docx|max:2048',
        ]);

        $file = $request->file('document');
        $filename = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('uploads', $filename, 'public');

        $content = '';
        if ($file->getClientOriginalExtension() == 'pdf') {
            $parser = new PdfParser();
            $pdf = $parser->parseFile(storage_path("app/public/uploads/{$filename}"));
            $content = $pdf->getText();
        } elseif ($file->getClientOriginalExtension() == 'docx') {
            $phpWord = IOFactory::load($file->getRealPath(), 'Word2007');
            $content = $this->extractTextFromDocx($phpWord);
        }
        $document = Document::create([
            'document_name' => $filename,
            'content' => $content,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Document uploaded and saved successfully.',
            'document' => [
                'id' => $document->id,
                'document_name' => $document->document_name,
                'content' => $document->content
            ]
        ]);
    }


    private function extractTextFromDocx($phpWord)
    {
        $text = '';
        foreach ($phpWord->getSections() as $section) {
            $elements = $section->getElements();
            foreach ($elements as $element) {
                if (method_exists($element, 'getElements')) {
                    foreach ($element->getElements() as $e) {
                        if (method_exists($e, 'getText')) {
                            $text .= $e->getText() . " ";
                        }
                    }
                }
            }
        }
        return $text;
    }

    public function listdocument()
    {
        $documents = Document::all();

        return response()->json([
            'success' => true,
            'documents' => $documents
        ]);
    }
}
