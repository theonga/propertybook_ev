<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;
use App\Models\Pricing;

class SectionController extends Controller
{
    public function index()
    {   
        // get section with name Hero
        $hero = Section::where('name', 'Hero')->first();

        // get section with name Story
        $story = Section::where('name', 'Story')->with('subSections')->first();

        // get all pricings
        $pricings = Pricing::all();

        // get Footer section
        $footer = Section::where('name', 'Footer')->first();

        // get section with name Services with sub sections
        $services = Section::where('name', 'Services')->with('subSections')->first();

        return view('welcome', compact('hero','story','pricings','footer', 'services'));
    }

    public function admin()
    {
        $sections = Section::whereNull('parent_id')->with('subSections')->get();
        return view('admin', compact('sections'));
    }

    public function add()
    {
        $sections = Section::whereNull('parent_id')->get();
        return view('add', compact('sections'));
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'parent_id' => 'nullable|exists:sections,id',
        ]);
        $data = $request->all();
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $data['image'] = $imagePath;
        }

        Section::create($data);

        return redirect()->back()->with('success', 'Section created successfully!');
    }

    public function edit($id){
        $section = Section::findOrFail($id);
        $sections = Section::where('id', '!=', $id)->get(); // Exclude current section from parent dropdown

        return view('edit', compact('section', 'sections'));
    }

    public function update(Request $request, $id){
        $section = Section::findOrFail($id);

        $data = $request->all();
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $data['image'] = $imagePath;
        }

        $section->update($data);

        return redirect()->back()->with('success', 'Section updated successfully!');
    }

    public function destroy($id){
        $section = Section::findOrFail($id);

        // Delete the section
        $section->delete();

        return redirect()->back()->with('success', 'Section deleted successfully!');
    }
}
