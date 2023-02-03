<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Webinar;
use Illuminate\Support\Facades\Crypt;
use Intervention\Image\Facades\Image;

class WebinarController extends Controller {

    public function getList() {
        $data = Webinar::getWebinars();
        return view('admin.webinars.webinar-listing', compact('data'));
    }

    public function getWebinarView() {
        return view('admin.webinars.add-webinar');
    }

    public function saveWebinar(Request $request) {
        $image = null;
        if (!empty($request->image)) {
            $uploadImage = self::uploadImage($request->image);
            if ($uploadImage['success'] == false) {
                return redirect()->back()->with('Error occurred while uploading image! please try again');
            }
            $image = $uploadImage['filename'];
        }
        $data = self::prepareData($request, $image);
        $save = Webinar::saveData($data);

        if ($save) {
            return redirect()->route('webinar.list')->with('Saved Successfully!');
        } else {
            return redirect()->back()->with('Error occurred! please try again');
        }
    }

    public function updateWebinar(Request $request) {
        $image = null;
        if (!empty($request->image)) {
            $uploadImage = self::uploadImage($request->image);
            if ($uploadImage['success'] == false) {
                return redirect()->back()->with('Error occurred while uploading image! please try again');
            }
            $image = $uploadImage['filename'];
        }
        $data = self::prepareData($request, $image);
        $data['id'] = $request->id;
        $save = Webinar::updateData($data);
        if ($save) {
            return redirect()->route('webinar.list')->with('Saved Successfully!');
        } else {
            return redirect()->back()->with('Error occurred! please try again');
        }
    }

    public function editWebinar($id) {
        $data = Webinar::getWebinar($id);
        return view('admin.webinars.edit-webinar', compact('data'));
    }

    public static function prepareData($data, $image) {
        $request = $data->toArray();
        $inputs['title'] = $request['title'];
        $inputs['video_url'] = $request['url'];
        $inputs['date'] = $request['date'];
        $inputs['instructor'] = $request['instructor_name'];
        $inputs['type'] = $request['type'];
        $inputs['image'] = (!empty($image)) ? $image : null;

        return $inputs;
    }

    public function deleteWebinar($id) {
        $id = Crypt::decrypt($id);
        $data = ['is_active' => 0];
        $update = Webinar::where('id', $id)->update($data);

        if ($update) {
            return redirect()->route('webinar.list')->with('Deleted Successfully!');
        } else {
            return redirect()->back()->with('Error occurred! please try again');
        }
    }

    public static function uploadImage($image) {
        $allowedfileExtension = ['jpg', 'jpeg', 'png'];
        $filename = $image->getClientOriginalName();
        $extension = $image->getClientOriginalExtension();
        $check = in_array($extension, $allowedfileExtension);
        if ($check) {
            $image->move(public_path('assets/img'), $filename);

//            $filename = $image->store('public/photos');
            return ['success' => true, 'filename' => $filename];
        } else {
            return ['success' => false];
        }
    }

}
