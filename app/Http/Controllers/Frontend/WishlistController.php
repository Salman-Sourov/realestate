<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\MultiImage;
use App\Models\Facility;
use App\Models\Amenities;
use App\Models\PropertyType;
use App\Models\User;
use App\Models\PackagePlan;
use App\Models\Wishlist;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function AddToWishList(Request $request, $property_id)
{
    if (Auth::check()) {
        $exists = Wishlist::where('user_id', Auth::id())->where('property_id', $property_id)->first();
        $user_id = Auth::id(); // Get the authenticated user's ID

        if (!$exists) {
            Wishlist::insert([
                'user_id' => $user_id,
                'property_id' => $property_id,
                'created_at' => Carbon::now()
            ]);

            return response()->json(['success' => 'Successfully Added To Your Wishlist']);
        } else {
            return response()->json(['error' => 'Property Already In Wishlist']);
        }
    } else {
        return response()->json(['error' => 'Please Login First']);
    }
}

public function UserWishlist(){

    $id = Auth::user()->id;
    $userData = User::find($id);

    return view('frontend.dashboard.wishlist',compact('userData'));

}// End Method



}
