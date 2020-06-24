<?php

namespace App\Http\Controllers;

use Khill\Lavacharts\Lavacharts;

use Illuminate\Http\Request;

class DiagramController extends Controller
{
    public function index(){

        $waiting = \DB::table('appointments')->where('status', '1')->count();
        $Refuse = \DB::table('appointments')->where('status', '2')->count();
        $Accept = \DB::table('appointments')->where('status', '0')->count();

        $reasons = \Lava::DataTable();

        $reasons->addStringColumn('Reasons')
                ->addNumberColumn('Percent')
                ->addRow(['Accepté', $Accept])
                ->addRow(['refusé', $Refuse])
                ->addRow(['En attente', $waiting]);

                \Lava::DonutChart('apointementstates', $reasons, [
            'title' => 'Etat des rendez-vous'
        ]);

        return view("account");
    }
}
