<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\NguyenPhuongNam27;
use App\Models\Book;
use App\Models\Category;
use App\Models\BorrowBook;
use App\Models\Role;
use Validator;
class ManageBooksController extends Controller
{
    public function getBook(){
        $books = Book::paginate(5);
        $books->load('category');
        return view('Layout/listBook',['books' => $books]);
    }
    public function getcategoryBook(){
        $categorybooks = Category::paginate(5);
        return view('Layout/categoryBook',['categorybooks' => $categorybooks]);
    }
    public function getAddCategoryPost(Request $request){
                $categorybook = new Category();
                $categorybook->category = $request->category;
                $categorybook->description = $request->description;
                $categorybook->save();
                return redirect('/admin/manageAdmin/categoryBook')->with('messagecategory', 'Add Category Success');
    }
    public function getAddBookPost(Request $request){
                $book = new Book();
                $book->bookcode = $request->bookcode;
                $book->bookname = $request->bookname;
                $book->author = $request->author;
                $book->publishingyear = $request->publishingyear;
                $book->publishingcompany = $request->publishingcompany;
                $book->category_ID = $request->category_ID;
                $book->description = $request->description;
                $book->amount = $request->amount;
                $book->unitprice = $request->unitprice;
                $book->save();
                return redirect('/admin/manageAdmin/listBook')->with('messagebook', 'Add Book Success');
    }
    public function getAddBook(){
        $categories = Category::all();
        return view('Layout/addBook',['categories' => $categories]);
    }
    public function getDelete($id){
        $book= Book::find($id);
        $book->delete();
        return redirect('/admin/manageAdmin/listBook')->with('messagedeletebook', 'Delete Book Success');
    }
    public function getDeleteCategory($id){
        $category = Category::find($id);
        $category->delete();
        return redirect('/admin/manageAdmin/categoryBook')->with('messagedeletecategory','Delete Category Success');
    }
    public function getEditBook($id){
        $books = Book::find($id);
        $categories = Category::all();
        return view('Layout/editBook',['books' => $books],['categories' => $categories ]);

    }
    public function getEditBookPost($id,Request $request){
        $request->offsetUnset('_token');
        Book::where(['id'=>$id])->update($request->all());
        return redirect('admin/manageAdmin/listBook')->with('messageeditbook', 'Edit Book Success');;
    }
    public function getEditCategory($id){
        $categories = Category::find($id);
        return view('Layout/editCategory',['categories' => $categories]);
    }
    public function getEditCategoryPost($id,Request $request){
        $request->offsetUnset('_token');
        Category::where(['id'=>$id])->update($request->all());
        return redirect('admin/manageAdmin/categoryBook')->with('messageeditcategory', 'Edit category Success');;
    }
    public function getAddCategory(){
        return view('Layout/addCategory');
    }
}
