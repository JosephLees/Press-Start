<?php

namespace App\Http\Controllers;

use App\Preorder;
use App\Item;
use App\Customer;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PreorderController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		$preorders = DB::table('preorders')->get();
		$customers = DB::table('customers')->get();

		return view('pages.preorder.preorder')->with('preorders', $preorders, 'customers', $customers);
	}

	public function create()
	{
		return view('pages.preorder.preorderCreate');
	}

	public function store(Request $request)
	{
		$this->validate(request(), [
			'itemName' => 'required',
			'customerEmail' => 'required|email'
		]);

		$itemName = $request->itemName;
		$item_id = Item::where('itemName', $itemName)->value('id');

		$customerEmail = $request->customerEmail;
		$customer_id = Customer::where('email', $customerEmail)->value('id');

		$balance = Item::where('itemName', $itemName)->value('price');

		$preorder = new Preorder;

		$preorder->item_id = $item_id;
		$preorder->customer_id = $customer_id;
		$preorder->dateCreated = Carbon::now();
		$preorder->user_id = $request->user()->id;
		$preorder->status = 'Open';
		$preorder->balance = $balance;

		$preorder->save();

		return redirect('/preorder');
	}

	public function complete($id)
	{
		$preorder = Preorder::find($id);

		$preorder->status = 'Completed';
		$preorder->balance = '0';

		$preorder->save();

		return redirect('/preorder');
	}

	public function view($id)
	{
		$preorder = DB::table('preorders')->where('id', $id)->first();

		return view('pages.preorder.preorderView', compact('preorder'));
	}

	public function delete($id)
	{
		$preorder = Preorder::find($id);

		$preorder->delete();

		return redirect('/preorder');
	}
}
