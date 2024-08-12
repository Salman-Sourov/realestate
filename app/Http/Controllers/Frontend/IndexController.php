<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use App\Models\MultiImage;
use App\Models\Property;
use App\Models\PropertyMessage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\propertyType;

class IndexController extends Controller
{
    public function PropertyDetails($id, $slug)
    {

        $property = Property::findOrFail($id);
        $multiImage = MultiImage::where('property_id', $id)->get();
        $facility = Facility::where('property_id', $id)->get();

        $amenities = $property->amenities_id;
        $property_amen = explode(',', $amenities);

        $property_type = $property->ptype_id;
        $relatedProperty = Property::where('ptype_id', $property_type)->where('id', '!=', $id)->orderBy('id', 'DESC')->limit(3)->get();

        return view('frontend.property.property_details', compact('property', 'multiImage', 'property_amen', 'facility', 'relatedProperty'));
    } // End Method

    public function PropertyMessage(Request $request)
    {

        if (Auth::check()) {

            PropertyMessage::insert([

                'user_id' => Auth::user()->id,
                'agent_id' => $request->agent_id,
                'property_id' => $request->property_id,
                'msg_name' => $request->msg_name,
                'msg_email' => $request->msg_email,
                'msg_phone' => $request->msg_phone,
                'message' => $request->message,
                'created_at' => Carbon::now(),

            ]);

            $notification = array(
                'message' => 'Send Message Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        } else {
            $notification = array(
                'message' => 'Plz Login Your Account First',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        }
    } // End Method

    public function AgentDetails($id)
    {

        $agent = User::findOrFail($id);
        $property = Property::where('agent_id', $id)->get();
        $featured = Property::where('featured', '1')->orderBy('id', 'DESC')->limit(3)->get();
        $rentproperty = Property::where('property_status', 'rent')->get();
        $buyproperty = Property::where('property_status', 'buy')->get();

        return view('frontend.agent.agent_details', compact('agent', 'property', 'featured', 'rentproperty', 'buyproperty'));
    } // End Method

    public function AgentDetailsMessage(Request $request)
    {

        $aid = $request->agent_id;

        if (Auth::check()) {

            PropertyMessage::insert([

                'user_id' => Auth::user()->id,
                'agent_id' => $aid,
                'msg_name' => $request->msg_name,
                'msg_email' => $request->msg_email,
                'msg_phone' => $request->msg_phone,
                'message' => $request->message,
                'created_at' => Carbon::now(),

            ]);

            $notification = array(
                'message' => 'Send Message Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        } else {

            $notification = array(
                'message' => 'Plz Login Your Account First',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        }
    } // End Method

    public function RentProperty()
    {

        $property = Property::where('status', '1')->where('property_status', 'rent')->get();
        $rentproperty = Property::where('property_status', 'rent')->get();
        $buyproperty = Property::where('property_status', 'buy')->get();

        return view('agent.property.rent_property', compact('property', 'rentproperty', 'buyproperty'));
    } //End Method

    public function BuyProperty()
    {

        $property = Property::where('status', '1')->where('property_status', 'buy')->get();
        $rentproperty = Property::where('property_status', 'rent')->get();
        $buyproperty = Property::where('property_status', 'buy')->get();

        return view('agent.property.buy_property', compact('property', 'rentproperty', 'buyproperty'));
    } //End Method

    public function PropertyType($id){
        $property= Property::where('status','1')->where('ptype_id',$id)->get();
        $rentproperty= property::where('property_status','rent')->get();
        $buyproperty= property::where('property_status','buy')->get();
        $pbread = PropertyType::where('id',$id)->first();
        return view('frontend.property.property_type',compact('property','rentproperty','buyproperty','pbread'));


    } //End Method



}
