<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // カテゴリの一覧を表示するメソッド
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    // カテゴリを削除するメソッド
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('message', 'カテゴリが削除されました');
    }
}
