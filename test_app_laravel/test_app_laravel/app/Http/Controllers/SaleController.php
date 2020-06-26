<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\User\QuestionsRequest;
use App\Http\Requests\User\CommentRequest;
use App\Http\Controllers\Controller;
use App\product;
use App\TagCategory;
use App\Favorite;
use App\Contact;
use Auth;

class SaleController extends Controller
{
    private $product;
    private $contact;
    private $tagCategory;
    private $favorite;

    public function __construct(Product $product, Contact $contact, TagCategory $tagCategory, Favorite $favorite)
    {
        $this->product = $product;
        $this->contact = $contact;
        $this->tagCategory = $tagCategory;
        $this->favorite = $favorite;
    }

    public function index(Request $request)
    {
        $searches = $request->all();
        $tagCategories = $this->tagCategory->all();
        $products = $this->product->all();
        return view('user.index', compact('searches', 'tagCategories', 'products'));
    }

    public function create()
    {
        $tagCategories = $this->tagCategory->pluck('name', 'id');
        return view('user.question.create', compact('tagCategories'));
    }

    public function createConfirm(QuestionsRequest $request)
    {
        $inputs = $request->all();
        $tagCategory = $this->tagCategory->find($inputs['tag_category_id']);
        return view('user.question.createConfirm', compact('inputs', 'tagCategory'));
    }

    public function store(QuestionsRequest $request)
    {
        $inputs = $request->all();
        $this->question->user_id = Auth::id();
        $this->question->fill($inputs)->save();
        return redirect()->route('question.index');
    }

    public function show($questionId)
    {
        $question = $this->question->find($questionId);
        $comments = $this->comment->where('question_id', $questionId)->get();
        return view('user.question.show', compact('question', 'comments'));
    }

    public function commentCreate(CommentRequest $request, $questionId)
    {
       $inputs = $request->all();
       $this->comment->user_id = Auth::id();
       $this->comment->question_id = $questionId;
       $this->comment->fill($inputs)->save();
       return redirect()->route('question.index');
    }


    public function showMypage(Request $request)
    {
        $questions = $this->question->getLoginUser();
        return view('user.question.mypage', compact('questions'));
    }

    public function edit($questionId)
    {
        $tagCategories = $this->tagCategory->pluck('name', 'id');
        $question = $this->question->find($questionId);
        return view('user.question.edit', compact('question', 'tagCategories'));
    }

    public function updateConfirm(QuestionsRequest $request, $questionId)
    {
        $inputs =$request->all();
        $tagCategory = $this->tagCategory->find($inputs['tag_category_id']);
        return view('user.question.updateConfirm', compact('inputs', 'tagCategory'));
    }

    public function update(QuestionsRequest $request, $questionId)
    {
        $inputs = $request->all();
        $this->question->find($questionId)->fill($inputs)->save();
        return redirect()->route('question.index');
    }

    public function destroy($questionId)
    {
        $this->question->find($questionId)->delete();
        return redirect()->route('question.index');
    }
}

