<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\NguyenPhuongNam27;
use App\Models\Book;
use App\Models\BorrowBook;
use Validator;
class BorrowBooksController extends Controller
{
    public function borrowBook($id){
        $user_id = Auth::user()->id;
        $book = BorrowBook::where('account_id',$user_id)
                            ->where('book_id',$id)
                            ->get();
        if(count($book) >= 1){
            return redirect('loginSuccess')->with('messageBorrowBook', 'Borrow Book Fail');
        }
        else{
            $borrow = new BorrowBook();
            $borrow->account_id = $user_id;
            $borrow->book_id = $id;
            $borrow->save();
            return redirect('loginSuccess')->with('messageBorrowBook', 'Borrow Book Success');
        }
    }
    public function listBorrow(){
        $borrows = BorrowBook::paginate(10)->load('book');
        return view('Layout/listBorrow',['borrows' => $borrows]);
    }
    public function sendBorrowBook($id){
        $borrow = BorrowBook::find($id);
        $borrow->sendBook = 1;
        $borrow->save();
        return redirect('/loginSuccess/listBorrow')->with('messageBorrowBook', 'Borrow Book Success');
    }
    public function deleteBook($id){
        $deleteBook = BorrowBook::find($id)->delete();
        return redirect('/loginSuccess/listBorrow')->with('messageBorrowBook', 'Delete Book Success');

    }
    public function searchBook(Request $request){
        $books = Book::where('bookname',$request->search)
        ->get();
        if(count($books) >= 1){
        return view('/loginSuccess',['books' => $books]);
        }else{
            return redirect('/loginSuccess')->with('messageSearch','Book not find');
        }
    }
}
