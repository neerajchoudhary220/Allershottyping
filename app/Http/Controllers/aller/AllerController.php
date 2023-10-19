<?php

namespace App\Http\Controllers\aller;

use App\Http\Controllers\Controller;
use App\Models\CommandList;
use App\Models\Technique;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class AllerController extends Controller
{


    public function  index()
    {
        $activePage = "commands";
        return view('aller.commands.index', compact('activePage'));
    }

    public function createTechnique(Request $request)
    {
        if ($request->ajax()) {

            $create = Technique::create([
                'name' => $request->name,
                'description' => $request->description,
            ]);
            if ($create) {
                return response()->json([
                    'msg' => 'Created Successfully'
                ]);
            }


            return response()->json([
                'msg' => 'Something is wrong'
            ]);
        }
    }

    public function updateTechnique(Request $request, $id)
    {
        if ($request->ajax()) {
            $update = Technique::where('id', $id)->update([
                'name' => $request->name
            ]);

            if ($update) {
                return response()->json([
                    'msg' => "Updated successsfully ",
                    "status" => $update,
                ]);
            }

            return response()->json([
                'msg' => 'Something is wrong',
                'status' => 0
            ]);
        }
    }

    public function techniquelist(Request $request)
    {

        $_order = request('order');
        $_columns = request('columns');
        $order_by = $_columns[$_order[0]['column']]['name'];
        $order_dir = $_order[0]['dir'];
        $search = request('search');
        $skip = request('start');
        $take = request('length');
        $query = Technique::query();


        $recordsTotal = $recordsFiltered =  $query->count();
        if (isset($search['value'])) {
            $query->Where(function ($q) use ($search) {
                $q->whereRaw("name LIKE '%" . $search['value'] . "%' ");
            });
        }
        $data = $query->orderBy($order_by, $order_dir)->skip($skip)->take($take)->get();
        $i = 1;
        foreach ($data as $d) {
            $d->name = $d->name;
            $d->indx = $i;
            $view = route('aller.technique.list.view', $d->id);
            $updateUrl = route('aller.update', $d->id);
            $edtBtn = "<button class='btn btn-success btn-sm px-3 EdtBtn' url='$updateUrl'>Edit</button>";
            $d->action = '<a href="' . $view . '"><button class="btn btn-info btn-sm px-3 mr-3">View</button></a>' . $edtBtn;
            $i++;
        }

        return [
            "draw" => request('draw'),
            "recordsTotal" => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            "data" => $data,
        ];
    }

    public function commandView(Request $request, Technique $technique)
    {
        $command = $technique->name;
        $id = $technique->id;
        $activePage = "commands";
        return view('aller.commands.view', compact('command', 'activePage', 'id'));
    }

    public function commandlist($id)
    {

        $_order = request('order');
        $_columns = request('columns');
        $order_by = $_columns[$_order[0]['column']]['name'];
        $order_dir = $_order[0]['dir'];
        $search = request('search');
        $skip = request('start');
        $take = request('length');
        $query = CommandList::query();

        $recordsTotal = $recordsFiltered =  $query->where('technique_id', $id)->count();

        if (isset($search['value'])) {
            $query->Where(function ($q) use ($search) {
                $q->whereRaw("name LIKE '%" . $search['value'] . "%' ");
            });
        }
        $data = $query->orderBy($order_by, $order_dir)->skip($skip)->take($take)->get();
        // dd($data);
        $i = 1;
        foreach ($data as $d) {
            $d->name = $d->name;
            $d->indx = $i;
            $command = '<div><div class="commands d-none">' . $d->command . '</div>' . Str::limit($d->command, 25, '<b class="text-danger next role-btn modalBtn" title="' . $d->name . '">...</b>') . '</div>';
            $d->command = $command;
            $updateUrl = route('aller.comandlist.update',$d->id);
            $deleteBtn = '<a href=""><button class="btn btn-danger btn-sm px-3">Delete</button></a>';
            $EditBtn = '<button class="btn btn-success btn-sm px-3 ml-3 EdtBtn" url="'.$updateUrl.'" value="' . $d->id . '" title="' . $d->name . '">Edit</button>';
            $d->action = $deleteBtn . $EditBtn;
            $i++;
        }

        return [
            "draw" => request('draw'),
            "recordsTotal" => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            "data" => $data,
        ];
    }

    public function updateCommandlist(Request $request, $id)
    {
        if ($request->ajax()) {
            // dd($request->all());

            $update = CommandList::where('id', $id)->update($request->all());

            if ($update) {
                return response()->json([
                    'msg' => "Data has been updated",
                    'status' => $update,
                ]);
            }
            return response()->json([
                'msg' => "Something is wrong",
                'status' => 0,
            ]);
        }
    }

    public function createCommand(Request $request)
    {
        if ($request->ajax()) {
            try {
                DB::beginTransaction();

                $create = CommandList::create($request->all());
                if($create){
                    return response()->json([
                        'msg'=>"New command created successfully ",
                        'status'=>1
                    ]);
                }

                DB::commit();
            } catch (\Throwable $th) {
                dd($th);
                DB::rollBack();
            }

        }
    }
}
