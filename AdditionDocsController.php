<?php

namespace App\Http\Controllers;
use App\Models\AdditionDoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class AdditionDocsController extends Controller
{
        public function store(Request $request)
    {
        $request->validate([
            'tracking_code' => 'required|string',
            'title' => 'required|string|max:255',
            'file' => 'required|file',
            'officer' => 'nullable|string',
        ]);

        // ذخیره فایل
        $path = $request->file('file')->storeAs(
            'addition_docs/' . $request->tr_code,
            $request->title . '.' . $request->file('file')->getClientOriginalExtension(),
            'public'
        );

        // ذخیره رکورد در دیتابیس
        $doc = AdditionDoc::create([
            'tracking_code' => $request->tracking_code,
            'title' => $request->title,
            'data' => $path,
            'time' => now(),
            'officer' => $request->officer,
        ]);

        return response()->json(['message' => 'فایل با موفقیت ذخیره شد', 'data' => $doc], 201);
    }
}
