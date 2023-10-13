<?php

namespace App\Http\Controllers\aller;

use App\Http\Controllers\Controller;
use App\Models\CommandList;
use App\Models\Technique;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AllerController extends Controller
{


    public function  index()
    {
        $activePage = "commands";
        return view('aller.commands.index', compact('activePage'));
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
            $d->action = '<a href="' . $view . '"><button class="btn btn-info btn-sm px-3">View</button></a>';
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
            $deleteBtn = '<a href=""><button class="btn btn-danger btn-sm px-3">Delete</button></a>';
            $EditBtn = '<button class="btn btn-success btn-sm px-3 ml-3 EdtBtn" value="' . $d->id . '" title="' . $d->name . '">Edit</button>';
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

    public function updateCommandlist(Request $request, CommandList $commandList)
    {
        if ($request->ajax()) {
            $data = $request->only(['name','command']);
            // dd(->first());
            // $commandList->update($data);

            $chck= CommandList::where('id',$commandList)->update($data);

            return response()->json([
                'msg'=>"Data has been updated",
                'status'=>$chck,
            ]);

        }
    }
}
