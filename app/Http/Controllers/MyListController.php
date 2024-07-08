<?php

namespace App\Http\Controllers;

use App\Models\MyList;
use Illuminate\Http\Request;

class MyListController extends Controller
{
    public function index()
    {
        $myListItems = MyList::all();

        return response()->json([
            'success' => true,
            'data' => $myListItems
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string|max:255',
            'activeStatus' => 'required|string|max:225',
        ]);

        $myListItem = MyList::create([
            'description' => $request->description,
            'activeStatus' => $request->activeStatus,
        ]);

        return response()->json([
            'success' => true,
            'data' => $myListItem
        ]);
    }
    public function getDoneItems()
    {
        $doneItems = MyList::where('activeStatus', 'done')->get();

        return response()->json([
            'success' => true,
            'data' => $doneItems
        ]);
    }
    public function getActiveItems()
    {
        $doneItems = MyList::where('activeStatus', 'active')->get();

        return response()->json([
            'success' => true,
            'data' => $doneItems
        ]);
    }
    public function destroy($id)
    {
        $myListItem = MyList::find($id);

        if (!$myListItem) {
            return response()->json([
                'success' => false,
                'message' => 'Item not found'
            ], 404);
        }

        $myListItem->delete();

        return response()->json([
            'success' => true,
            'message' => 'Item deleted successfully'
        ]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'description' => 'sometimes|required|string|max:255',
            'activeStatus' => 'sometimes|required|string|max:225',
        ]);

        $myListItem = MyList::find($id);

        if (!$myListItem) {
            return response()->json([
                'success' => false,
                'message' => 'Item not found'
            ], 404);
        }

        $myListItem->update($request->all());

        return response()->json([
            'success' => true,
            'data' => $myListItem
        ]);
    }
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'activeStatus' => 'sometimes|required|string|max:225',
        ]);

        $myListItem = MyList::find($id);

        if (!$myListItem) {
            return response()->json([
                'success' => false,
                'message' => 'Item not found'
            ], 404);
        }

        $myListItem->update($request->all());

        return response()->json([
            'success' => true,
            'data' => $myListItem
        ]);
    }

    public function getPlaceholder($id)
    {
        $myListItem = MyList::find($id);

        $myListItem = MyList::find($id);

        if (!$myListItem) {
            return response()->json([
                'success' => false,
                'message' => 'Item not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $myListItem
        ]);
    }

    
}
