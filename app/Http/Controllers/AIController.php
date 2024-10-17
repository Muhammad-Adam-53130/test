<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Parsedown;

class AIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.ai.index');
    }

    public function processRequest(Request $request)
    {
        // get the value from form param using $request "?title=hello%20"
        $input = $request->input('data');

        Log::debug("input: ", ['$input' => $input]);

        // if $queryTitle empty return default view

        if(empty($input)) {
            return redirect()->route('ai.index')->with('error', 'Cannot send empty input.');
        }

        // Define the API URL and the payload
        $url = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key='.env('AI_API_KEY');
        
        $payload = [
            "contents" => [
                [
                    "parts" => [
                        ["text" => $input]
                    ]
                ]
            ]
        ];

        // Send the POST request
        $response = Http::withHeaders([
            'Content-Type' => 'application/json'
        ])->post($url, $payload);

        // Handle the response and pass it to the view
        if ($response->successful()) {
            $data = $response->json();

            Log::debug("Generate Feed Content", [ 'candidates' => $data['candidates'] ]);

            // dd($data->candidates->content);

            // Initialize Parsedown
            $parsedown = new Parsedown();

            // Convert Markdown to HTML
            if (isset($data['candidates'])) {
                foreach ($data['candidates'] as &$item) {
                    if (isset($item['content']['parts'])) {
                        foreach ($item['content']['parts'] as &$part) {
                            $part['text'] = $parsedown->text($part['text']); // Convert to HTML
                        }
                    }
                }
            }

            return view('pages.ai.index', ['data' => $data]);
        } else {
            $error = $response->body();
            return view('pages.ai.index', ['error' => $error]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
