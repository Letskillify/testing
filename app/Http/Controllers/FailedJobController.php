<?php

namespace App\Http\Controllers;

use App\Models\FailedJob;
use Illuminate\Http\Request;

class FailedJobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $failedJobs = FailedJob::all();
        return response()->json($failedJobs);
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $failedJob = FailedJob::findOrFail($id);
        return response()->json($failedJob);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $failedJob = FailedJob::findOrFail($id);
        $failedJob->delete();
        return response()->json(['message' => 'Failed job deleted.'], 200);
    }
}
