<?php

namespace App\Http\Controllers;

use App\Models\Showroom;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;

class ShowroomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $showrooms = Showroom::all();
        return view('dashboard.showrooms.list' , compact('showrooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('dashboard.showrooms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {    //dd($request);
        try {
            // Validate the incoming request
            $validatedData = $request->validate([
                'ShowroomName' => 'required',
                'ShowroomAddress' => 'nullable',
                'PhoneNumber' => 'nullable',
                'Email' => 'nullable|email',
                'Remarks' => 'nullable',
                'MapAddress' => 'nullable',
                'Area' => 'nullable',
            ]);
    
            // Create a new showroom instance with mass assignment
            $showroom = Showroom::create($validatedData);
    
            // Redirect to the index route with a success message
            return redirect()->route('showrooms.index')->with('success', 'Showroom added successfully');
        } catch (ValidationException $e) {
            // Redirect back with validation errors
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            // Handle other exceptions (e.g., database errors)
            return redirect()->back()->with('error', 'Error adding showroom: ' . $e->getMessage())->withInput();
        }
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $showroom = Showroom::findOrFail($id);
        return view('dashboard.showrooms.edit',compact('showroom'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $showroom = Showroom::findOrFail($id);
       
        $showroom->update([
        $showroom->ShowroomName = $request->showroomname,
        $showroom->ShowroomAddress = $request->showroomaddress,
        $showroom->PhoneNumber = $request->phonenumber,
        $showroom->Email = $request->email,
        $showroom->Remarks = $request->remarks,
        $showroom->MapAddress = $request->mapaddress,
        $showroom->Area = $request->area,
        ]);
         return redirect()->route('showrooms.index')->with('success','updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $showrooms = Showroom::findOrFail($id);
        $showrooms->delete($id);
        return redirect()->route('showrooms.index');
    }

    //api
    public function getShowrooms() {
        $showrooms = Showroom::all();
    
        if ($showrooms->isNotEmpty()) {
            $result = array(
                'status' => true,
                'message' => 'Successfully retrieved Showrooms',
                'data' => $showrooms
            );
            return response()->json($result, 200);
        } else {
            $result = array(
                'status' => false,
                'message' => 'No Showrooms found',
                'data' => []
            );
            return response()->json($result, 404);
        }
    }
    
    public function getShowroomsById($id) {
        try {
            $showroom = Showroom::findOrFail($id);
            $result = array(
                'status' => true,
                'message' => 'Successfully retrieved Showroom',
                'data' => $showroom
            );
            return response()->json($result, 200);
        } catch (ModelNotFoundException $e) {
            $result = array(
                'status' => false,
                'message' => 'Showroom not found',
                'data' => null
            );
            return response()->json($result, 404);
        }
    }

    public function updateShowroom(Request $request, $id) {
        // Validate the request data
        $validatedData = $request->validate([
            'ShowroomName' => 'sometimes|string|max:255',
             'ShowroomAddress' => 'sometimes|string|max:255',
             'PhoneNumber' => 'sometimes|string|max:255',
             'Email' => 'sometimes|string|max:255',
             'Remarks' => 'sometimes|string|max:255',
             'MapAddress' => 'sometimes|string|max:255',
             'Area' => 'sometimes|string|max:255',
        ]);
    
        try {
            // Find the showroom by ID
            $showroom = Showroom::findOrFail($id);
    
           
            // Update the showroom with validated data
            $showroom->update($validatedData);
    
            $result = array(
                'status' => true,
                'message' => 'Showroom updated successfully',
                'data' => $showroom
            );
            return response()->json($result, 200);
        } catch (ModelNotFoundException $e) {
            $result = array(
                'status' => false,
                'message' => 'Showroom not found',
                'data' => null
            );
            return response()->json($result, 404);
        } catch (\Exception $e) {
            $result = array(
                'status' => false,
                'message' => 'Failed to update Showroom',
                'data' => null
            );
            return response()->json($result, 500);
        }
    }
    
    public function deleteShowroom($id) {
        try {
            // Find the showroom by ID
            $showroom = Showroom::findOrFail($id);
    
            // Delete the showroom
            $showroom->delete();
    
            $result = array(
                'status' => true,
                'message' => 'Showroom deleted successfully',
                'data' => null
            );
            return response()->json($result, 200);
        } catch (ModelNotFoundException $e) {
            $result = array(
                'status' => false,
                'message' => 'Showroom not found',
                'data' => null
            );
            return response()->json($result, 404);
        } catch (\Exception $e) {
            $result = array(
                'status' => false,
                'message' => 'Failed to delete Showroom',
                'data' => null
            );
            return response()->json($result, 500);
        }
    }
    

}
