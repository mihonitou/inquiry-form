<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Category;

class ContactController extends Controller
{
    // お問い合わせフォームの表示
    public function create()
    {
        return view('contact.create');
    }

    // お問い合わせ確認画面の表示
    public function confirm(ContactRequest $request)
    {
        // バリデーション済みデータを取得
        $data = $request->validated();
        return view('contact.confirm', compact('data'));
    }

    // お問い合わせの送信処理
    public function send(ContactRequest $request)
    {

        // バリデーション済みデータを使用してコンタクトを保存
        Contact::create($request->validated());

        return redirect()->route('contact.thanks');
    }

    // お問い合わせの一覧を表示するメソッド（管理画面）
    public function index(Request $request)
    {
        // 検索条件を取得
        $query = Contact::query();

        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }

        if ($request->filled('email')) {
            $query->where('email', 'like', '%' . $request->input('email') . '%');
        }

        if ($request->filled('gender')) {
            $query->where('gender', $request->input('gender'));
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->input('category_id'));
        }

        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->input('date'));
        }

        // ページネーションを使用して結果を取得
        $contacts = $query->paginate(7);

        // カテゴリを取得
        $categories = Category::all();

        return view('admin.index', compact('contacts', 'categories'));
    }

    // お問い合わせを削除するメソッド
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('contacts.index')->with('message', 'データが削除されました');
    }
}
