<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class ApiController extends Controller
{
    public function index()
    {
        return Doctor::all();
    }

    public function show(Doctor $doctor)
    {
        return $doctor;
    }

    public function store(Request $request)
    {
        $article = Doctor::create($request->all());
        return response()->json($article, 201);
    }

    public function update(Request $request, Doctor $doctor)
    {
        $doctor->update($request->all());
        return response()->json($doctor, 200);
    }

    public function delete(Doctor $doctor)
    {
        $doctor->delete();
        return response()->json(null, 204);
    }
}
