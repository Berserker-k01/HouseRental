<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\Coupon;
use DB;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

//--------read-------
    public function coupon(){
        $coupon=DB::table('coupons')->get();
        return view('admin.coupon.coupon',compact('coupon'));
    }

//--------enter----------
    public function storeCoupon(Request $request){
        $data=array();
        $data['coupon']=$request->coupon;
        $data['discount']=$request->discount;
        $coupon=DB::table('coupons')->insert($data);

        $notification = array(
            'message'=>'Coupon créé.',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }

//------ delete -------------
    public function deleteCoupon($id){
        DB::table('coupons')->where('id',$id)->delete();

        $notification = array(
            'message'=>'Coupon supprimé.',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }

//--------edit----------------
    public function editCoupon($id){
        $coupon=DB::table('coupons')->where('id',$id)->first();
        return view('admin.coupon.edit_coupon',compact('coupon'));
    }

//-------update------
    public function updateCoupon(Request $request,$id){
        $data=array();
        $data['coupon']=$request->coupon;
        $data['discount']=$request->discount;
        $coupon= DB::table('coupons')->where('id',$id)->update($data);

        $notification = array(
            'message'=>'Coupon mis à jour.',
            'alert-type'=>'success'
        );
        return redirect()->route('coupons')->with($notification);
    }

//---------------//----------End Coupon--------//-----------------//----------------//-------------------//





//-----------------------------------Newsletter--------------------------------------
    public function newsletter(){
        $newsletter=DB::table('newsletters')->get();
        return view('admin.coupon.newsletter',compact('newsletter'));
    }
    //------ delete -------------
    public function deletenewsletter($id){
        DB::table('newsletters')->where('id',$id)->delete();

        $notification = array(
            'message'=>'Suppression effectuée.',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }

//----------------//--------------//--------------//----------------//----------------//----------------//----





//--------------------------User Contact Message----------------------------------
// --ekhane Database onosare "Status" er term gular rules holo :--
//         Status = 0 = New Message
//         Status = 1 = Already Replayed Message

// --ekhane Database onosare "review" er term gular rules holo :--
//         Status = 0 = Dont show(default)
//         Status = 1 = Show as a review
//--------------------------------------------------------------------------------

//----------------User Contact Message//Get_in_Touch--------------------------
    public function contact(){
        $contact=DB::table('contacts')->where('status',0)->get();
        return view('admin.contact.contact',compact('contact'));
    }

//------ delete -------------
    public function deleteContact($id){
        DB::table('contacts')->where('id',$id)->delete();

        $notification = array(
            'message'=>'Message supprimé.',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }

//------------View-------------------
    public function viewContact($id){
        $view=DB::table('contacts')->where('id',$id)->first();
        return view('admin.contact.view',compact('view'));
    }

//---------------All Message(nav)----------------
    public function allContact(){
        $contact=DB::table('contacts')->where('status',1)->get();
        return view('admin.contact.contact',compact('contact'));
    }

//------------Mark as Read----------------------
    public function markAsRead($id){
        DB::table('contacts')->where('id',$id)->update(['status'=> 1]);
        $notification=array(
                'message'=>'Message marqué comme lu.',
                'alert-type'=>'success'
            );
        return Redirect()->back()->with($notification);
    }

//-------------Mark as Unread--------------------
    public function markAsUnRead($id){
        DB::table('contacts')->where('id',$id)->update(['status'=> 0]);
        $notification=array(
                'message'=>'Message marqué comme non lu.',
                'alert-type'=>'success'
            );
        return Redirect()->back()->with($notification);
    }

//------------Show as Review----------------------
    public function showReview($id){
        DB::table('contacts')->where('id',$id)->update(['review'=> 1]);
        $notification=array(
                'message'=>'Avis affiché sur le site.',
                'alert-type'=>'success'
            );
        return Redirect()->back()->with($notification);
    }

//-------------Dont show as a Review--------------------
    public function dontShowReview($id){
        DB::table('contacts')->where('id',$id)->update(['review'=> 0]);
        $notification=array(
                'message'=>'Avis retiré du site.',
                'alert-type'=>'success'
            );
        return Redirect()->back()->with($notification);
    }






}
