<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\DataTables\UsersDataTable;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class StudentController extends Controller {

    public function index(UsersDataTable $datatable)
    {
        return $datatable->render('admin.student.index');
    }

    public function edit($id) {

    }
    public function destroy($id)
    {
        try 
        {
            DB::beginTransaction();
            $user = User::findOrFail($id);
            $user->availableBookingCounts()->delete();
            $user->coachPayments()->delete();
            $user->eventBookings()->delete();
            $user->payments()->delete();
            $user->userSubscribedPlans()->delete();
            $user->delete();
            DB::commit();
            return response()->json([
                'success' => JsonResponse::HTTP_OK,
                'message' => 'User Deleted successfully'
            ], JsonResponse::HTTP_OK);
        } 
        catch (\Exception $exception) 
        {
            DB::rollBack();
            return response()->json([
                'message' => $exception->getMessage()
            ], JsonResponse::HTTP_INTERNAL_SERVER_ERROR); 
        }
    }

}
