<?php

namespace App\Http\Controllers;

use App\Models\AttributeOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AttributeOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attributeOptions = AttributeOption::all();
        return response()->json($attributeOptions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'attribute_id' => 'required|integer|exists:attributes,id',
            'value' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $attributeOption = AttributeOption::create([
            'attribute_id' => $request->attribute_id,
            'value' => $request->value,
        ]);

        return response()->json($attributeOption, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $attributeOption = AttributeOption::findOrFail($id);
        return response()->json($attributeOption);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $attributeOption = AttributeOption::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'attribute_id' => 'integer|exists:attributes,id',
            'value' => 'string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $attributeOption->attribute_id = $request->attribute_id ?? $attributeOption->attribute_id;
        $attributeOption->value = $request->value ?? $attributeOption->value;
        $attributeOption->save();

        return response()->json($attributeOption);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attributeOption = AttributeOption::findOrFail($id);
        $attributeOption->delete();
        return response()->json(['message' => 'Attribute option deleted successfully']);
    }
}