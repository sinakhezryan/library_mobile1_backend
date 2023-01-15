<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    //
    public function create(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if ($validation->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'خطا در اعتبار سنجی'
            ]);
        } else {
            $book = Book::create([
                'name' => $request->name,
                'writer' => $request->writer,
                'cover' => $request->cover,
                'price' => $request->price,
                'publishers' => $request->publishers,
                'style' => $request->style,

            ]);
            return response()->json([
                'success' => true,
                'book' => $book,
                'message' => 'کتاب اضافه شد'
            ]);
        }
    }
    public function update(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'id' => 'required',
        ]);
        if ($validation->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'خطا در اعتبار سنجی'
            ]);
        } else {
            $book = Book::find($request->id);
            $book->update([
                'name' => $request->name,
                'writer' => $request->writer,
                'cover' => $request->cover,
                'price' => $request->price,
                'publishers' => $request->publishers,
                'style' => $request->style,

            ]);
            return response()->json([
                'success' => true,
                'book' => $book,
                'message' => 'کتاب ویرایش شد'
            ]);
        }
    }
    public function read()
    {
        $books = Book::orderBy('created_at','DESC')->get();
        return response()->json([
            'books' => $books,
            'success' => true,
            'message' => "اطلاعات دریافت شد",

        ]);
    }
    public function distroy(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'id' => 'required',
        ]);
        if ($validation->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'خطا در اعتبار سنجی'
            ]);
        } else {
            $book = Book::find($request->id);
            $book->delete();
            return response()->json([
                'success' => true,
                'message' => 'کتاب حذف شد'
            ]);
        }
    }
}
