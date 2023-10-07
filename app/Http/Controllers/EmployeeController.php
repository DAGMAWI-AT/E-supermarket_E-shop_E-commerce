<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Settings;
use App\User;
use App\Rules\MatchOldPassword;
use Hash;
use Carbon\Carbon;
use Spatie\Activitylog\Models\Activity;
use DB;
class EmployeeController extends Controller
{
    public function index() {
        $data = User::select(\DB::raw("COUNT(*) as count"), \DB::raw("DAYNAME(created_at) as day_name"), \DB::raw("DAY(created_at) as day"))
            ->where('created_at', '>', Carbon::today()->subDay(6))
            ->groupBy('day_name', 'day')
            ->orderBy('day')
            ->get();

        $array[] = ['Name', 'Number'];
        foreach($data as $key => $value) {
            $array[++$key] = [$value->day_name, $value->count];
        }
        //  return $data;
        return view('employee.index')->with('users', json_encode($array));
    }

    public function profile()
    {
        $profile = Auth()->user();
        // return $profile;
        return view('employee.users.profile')->with('profile', $profile);
    }

    public function profileUpdate(Request $request, $id)
    {
        // return $request->all();
        $this->validate($request, [
            'name' => 'required|string|max:30',
            'role' => 'required|in:admin,user,employee,salesman,manager',
            'photo' => 'nullable|string',
        ]);
        $user = User::findOrFail($id);
        $data = $request->all();
        $status = $user->fill($data)->save();
        if ($status) {
            request()->session()->flash('success', 'Successfully updated your profile');
        } else {
            request()->session()->flash('error', 'Please try again!');
        }
        return redirect()->back();
    }

    public function settings()
    {
        $data = Settings::first();
        return view('employee.setting')->with('data', $data);
    }

    public function settingsUpdate(Request $request)
    {
        // return $request->all();
        $this->validate($request, [
            'short_des' => 'required|string',
            'description' => 'required|string',
            'photo' => 'required',
            'logo' => 'required',
            'address' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'facebook' => 'string|nullable',
            'instagram' => 'string|nullable',
            'youtube' => 'string|nullable',
            'twitter' => 'string|nullable',
        ]);
        $data = $request->all();
        // return $data;
        $settings = Settings::first();
        // return $settings;
        $status = $settings->fill($data)->save();
        if ($status) {
            request()->session()->flash('success', 'Setting successfully updated');
        } else {
            request()->session()->flash('error', 'Please try again');
        }
        return redirect()->route('admin')->with('success', 'Setting successfully updated');;
    }

    public function changePassword() {
        return view('employee.layouts.changePassword');
    }

    public function changPasswordStore(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' =>[
                'required',
                'min:8',
                'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[^\w\s]).{8,}$/'
            ],
            'new_confirm_password' => ['required','same:new_password'],
        ]);

        User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);

        return redirect()->route('admin')->with('success', 'Password successfully changed');
    }

    // Pie chart
    public function userPieChart(Request $request){
        // dd($request->all());
        $data = User::select(\DB::raw("COUNT(*) as count"), \DB::raw("DAYNAME(created_at) as day_name"), \DB::raw("DAY(created_at) as day"))
            ->where('created_at', '>', Carbon::today()->subDay(6))
            ->groupBy('day_name', 'day')
            ->orderBy('day')
            ->get();

        $array[] = ['Name', 'Number'];
        foreach($data as $key => $value)
        {
            $array[++$key] = [$value->day_name, $value->count];
        }
        //  return $data;
        return view('employee.index')->with('course', json_encode($array));
    }

    // public function activity(){
    //     return Activity::all();
    //     $activity= Activity::all();
    //     return view('employee.layouts.activity')->with('activities',$activity);
    // }
}
