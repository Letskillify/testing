<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attributes = Attribute::with('options')->get();
        return response()->json($attributes);
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
            'name' => 'required|string|max:255',
            'options' => 'array',
            'options.*.value' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $attribute = Attribute::create(['name' => $request->name]);

        if ($request->has('options')) {
            foreach ($request->input('options') as $optionData) {
                $attribute->options()->create($optionData);
            }
        }

        $attribute->load('options'); // Load the relationship to return it in the response
        return response()->json($attribute, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $attribute = Attribute::with('options')->findOrFail($id);
        return response()->json($attribute);
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
        $attribute = Attribute::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'string|max:255',
            'options' => 'array',
            'options.*.id' => 'integer|exists:attribute_options,id',
            'options.*.value' => 'string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $attribute->name = $request->name ?? $attribute->name;
        $attribute->save();

        // Update or create attribute options
        if ($request->has('options')) {
            foreach ($request->input('options') as $optionData) {
                if (isset($optionData['id'])) {
                    $option = $attribute->options()->findOrFail($optionData['id']);
                    $option->value = $optionData['value'];
                    $option->save();
                } else {
                    $attribute->options()->create(['value' => $optionData['value']]);
                }
            }
        }
        $attribute->load('options');
        return response()->json($attribute);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attribute = Attribute::findOrFail($id);
        $attribute->delete();
        return response()->json(['message' => 'Attribute deleted successfully']);
    }
}